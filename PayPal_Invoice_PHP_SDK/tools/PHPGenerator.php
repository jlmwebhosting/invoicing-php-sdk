<?php
class PHPGenerator {
	
    /**
     * Array of classes and members representing the WSDL message types
     * @var array
     * @access private
     */
    private $_classmap = array();
    
    /**
     * Directory where output PHP files must be written to
     * @var string
     */
    private $_outputDirectory;

    /**
     * Copy of the transformed WSDL dom
     * 
     * Holding a reference to the heavy dom object since the 
     * generator will internally update the dom object to suit PHP's needs. 
     * We don't want to mess with the original DOM object.
     *  
     * @var DOMDocument
     */
    private $_dom;
    
    /**
     *     
     * @var DOMXPath 
     */
    private $_xpath;
    
    public function __construct($outputDir) {
    	$this->_outputDirectory = $outputDir;    	
    }    
    
    public function setDom($dom) {
    	$this->_dom = $dom;
    	$this->_xpath = new DOMXPath($this->_dom);
    }
    
    public function saveService($classPrefix) {
    	
		$services = $this->_dom->getElementsByTagName("service");		
        if (sizeof($services) == 0) {
            throw new WSDLInterpreterException("No services loaded");
        }
        
		foreach ($services as $service) {        	
			$service->setAttribute("validatedName", 
					$classPrefix.$this->_validateClassName($service->getAttribute("name")));                
            $functions = $service->getElementsByTagName("function");
            foreach ($functions as $function) {
								$function->setAttribute("validatedName", 
									$this->_validateNamingConvention($function->getAttribute("name")));                    
                $parameters = $function->getElementsByTagName("parameters");
                if ($parameters->length > 0) {
                    $parameterList = $parameters->item(0)->getElementsByTagName("variable");
                    
                    foreach ($parameterList as $variable) {                    	
                        $variable->setAttribute("validatedName", 
                        		$this->_validateNamingConvention($variable->getAttribute("name")));
                        $variable->setAttribute("type", 
                        		$this->_validateType($variable->getAttribute("type")));
                    }
                }
            }
		}
                
        $outputFiles = array();
        foreach ($services as $serviceIdx => $serviceDefintion) {
        	$serviceName = $serviceDefintion->getAttribute("validatedName");
        	$serviceCode = $this->_generateService($serviceDefintion);
            $filename = $this->_outputDirectory . "/" . $serviceName."Service.php";
            if (file_put_contents($filename, 
                    "<?php\n\n require('PPBaseService.php');\n\n" . $serviceCode."\n\n?>")) {
                $outputFiles[] = $filename;
            }
        }
        if (sizeof($outputFiles) == 0) {
            throw new WSDLInterpreterException("Error writing PHP source files.");
        }
        return $outputFiles;    	
    }
    
    public function saveModel($classPrefix) {
    	
		$classes = $this->_dom->getElementsByTagName("class");
		
        foreach ($classes as $class) {
            $class->setAttribute("validatedName", 
            	$classPrefix.$this->_validateClassName($class->getAttribute("name")));
            $extends = $class->getElementsByTagName("extends");
            if ($extends->length > 0) {
                $extends->item(0)->nodeValue = $extends->item(0)->nodeValue;
            }
            $properties = $class->getElementsByTagName("property");
            foreach ($properties as $property) {
                $property->setAttribute("validatedName", 
                	$this->_validateNamingConvention($property->getAttribute("name")));
                $property->setAttribute("type",  
                	$this->_validateType($property->getAttribute("type")));
            }
        }    	
    	
    	$outputFiles = array();
		$classCode = "<?php\n";    	
    	//TODO: Move to one file per class. Deferring for now due to tricky PHP require rules    	
    	foreach($classes as $c) {   	
			$classCode .= $this->_generateClass($c);
    	}
    	$classCode .= "?>";
    	
    	//TODO: Get filename dynamically.
    	$fileName = $this->_outputDirectory."/Invoice.php";	    	
	    if (file_put_contents($fileName, $classCode."\n\n") ) {
			$outputFiles[] = $fileName;    		
		}
    	
    	return $outputFiles;
    }
    
    

	private function _generateService($service)
	{
		$className = $service->getAttribute("validatedName") . "Service";
		$return = "require_once('PPUtils.php');\n";
		$return .= 'if (!class_exists("'.$className.'")) {'."\n";
		$return .= '/**'."\n";		
		$return .= ' * '.$service->getAttribute("validatedName")."\n";
		$return .= ' * @author WSDLInterpreter'."\n";
		$return .= ' */'."\n";
		$return .= "class ".$className." extends PPBaseService {\n";

		if (sizeof($this->_classmap) > 0) {
			$return .= "\t".'/**'."\n";
			$return .= "\t".' * Default class map for wsdl=>php'."\n";
			$return .= "\t".' * @access private'."\n";
			$return .= "\t".' * @var array'."\n";
			$return .= "\t".' */'."\n";
			$return .= "\t".'private static $classmap = array('."\n";
			foreach ($this->_classmap as $className => $validClassName)    {
				$return .= "\t\t".'"'.$className.'" => "'.$validClassName.'",'."\n";
			}
			$return .= "\t);\n\n";
		}

		$return .= "\t".'/**'."\n";
		$return .= "\t".' * No arg constructor'."\n";
		$return .= "\t".' * @param string $wsdl WSDL location for this service'."\n";
		$return .= "\t".' */'."\n";
		$return .= "\t".'public function __construct() {'."\n";

		$return .= "\t\tparent::__construct('" . $service->getAttribute("name") . "');\n";
		$return .= "\t}\n\n";

		$functionMap = array();
		$functions = $service->getElementsByTagName("function");
		foreach ($functions as $function) {
			if (!isset($functionMap[$function->getAttribute("validatedName")])) {
				$functionMap[$function->getAttribute("validatedName")] = array();
			}
			$functionMap[$function->getAttribute("validatedName")][] = $function;
		}
		foreach ($functionMap as $functionName => $functionNodeList) {
			$return .= $this->_generateServiceFunction($functionName, $functionNodeList)."\n\n";
		}

		$return .= "}}";
		return $return;
	}

	/**
	 * Generates the PHP code for a WSDL service operation function representation
	 *
	 * The function code that is generated examines the arguments that are passed and
	 * performs strict type checking against valid argument combinations for the given
	 * function name, to allow for overloading.
	 *
	 * @param string $functionName the php function name
	 * @param array $functionNodeList array of DOMElement interpreted WSDL function nodes
	 * @return string the php source code for the function
	 *
	 * @access private
	 * @todo Include any applicable annotation from WSDL
	 */
	private function _generateServiceFunction($functionName, $functionNodeList)
	{
		$return = "";
		$return .= "\t".'/**'."\n";
		$return .= "\t".' * Service Call: '.$functionName."\n";
		
		$parameterComments = array();
		$variableTypeOptions = array();
		$returnOptions = array();
		foreach ($functionNodeList as $functionNode) {
			$docNode = $functionNode->getElementsByTagName("documentation");
			if($docNode && $docNode->length > 0)
				$return .= "\n\t * " . $this->_normalizeDoc($docNode->item(0)->textContent) . "\n";
			
			$parameters = $functionNode->getElementsByTagName("parameters");				
			$paramList = array();
			
			if ($parameters->length > 0) {
				$parameters = $parameters->item(0)->getElementsByTagName("variable");				
				foreach ($parameters as $parameter) {
					$return .= "\t * ". '@param ';
					if (substr($parameter->getAttribute("type"), 0, -2) == "[]") {
						$parameterTypes = "array";
					} else {
						$parameterTypes = $parameter->getAttribute("type");
					}
					$return .= $parameter->getAttribute("type"). " " . $parameter->getAttribute("validatedName");
					$return .= "\n";
					$paramList[] = '$'. $this->lcFirst($parameter->getAttribute("validatedName"));
				}
			}
			$returns = $functionNode->getElementsByTagName("returns");
			if ($returns->length > 0) {
				$returns = $returns->item(0)->getElementsByTagName("variable");
				if ($returns->length > 0) {
					$returnOptions[] = $returns->item(0)->getAttribute("type");
				}
			}
		}
		
		
		$return .= "\t".' * @return '.join("|", array_unique($returnOptions))."\n";
		$return .= "\t".' * @throws APIException'."\n";
		$return .= "\t".' */'."\n";
		
		$return .= "\t".'public function '.$functionName .'(';
		$return .= implode(",", $paramList);
		$return .= ') {'."\n";
		$return .= "\t\t".'return new '. $returnOptions[0] . '( PPUtils::nvpToMap( $this->call("'.
		$functionNodeList[0]->getAttribute("name") . '"';
		
		if(count($paramList) > 0)
			$return .= ", " . implode(", ", $paramList);
		$return .= ")));\n\t" .'}' . "\n";

		return $return;
	}

	private function isComplexType($typeName) {		
		$expr = "*/class[@name='$typeName']";

		$elements = $this->_xpath->query($expr);
		if (!is_null($elements) && $elements->length > 0) {
			return true;
		}		
		
		return false;
	}

	/**
	 * Generates the PHP code for a WSDL message type class representation
	 *
	 * This gets a little bit fancy as the magic methods __get and __set in
	 * the generated classes are used for properties that are not named
	 * according to PHP naming conventions (e.g., "MY-VARIABLE").  
	 * and could normally be retrieved by $myClass->{"MY-VARIABLE"}.  For
	 * convenience, however, this will be available as $myClass->MYVARIABLE.
	 *
	 * @param DOMElement $class the interpreted WSDL message type node
	 * @return string the php source code for the message type class
	 *
	 * @access private
	 * @todo Include any applicable annotation from WSDL
	 */
	public function _generateClass($class)
	{
		$return = "";
		$return .= 'if (!class_exists("'.$class->getAttribute("validatedName").'")) {'."\n";
		$return .= '/**'."\n";
		
		$return .= ' * '.$class->getAttribute("validatedName")."\n";
		$doc = $class->getElementsByTagName("documentation");
		if($doc && $doc->length > 0)
			$return .= " * " .  $this->_normalizeDoc($doc->item(0)->textContent);		
		$return .= ' */'."\n";
		$return .= "class ".$class->getAttribute("validatedName");
		$extends = $class->getElementsByTagName("extends");
		if ($extends->length > 0) {
			$return .= " extends ".$extends->item(0)->nodeValue;
		}
		$return .= " {\n";

		
		$nvpSerializeCode = "\t\t\$delim = '';\n";
		$nvpDeserializeCode = "\n\tpublic function __construct(\$map = null, \$prefix='') {\n\t\tif(\$map != null) {\n";
		
		$properties = $class->getElementsByTagName("property");
		foreach ($properties as $property) {
			$return .= "\t/**\n";
			if(strcmp($property->getAttribute("max"), "unbounded") == 0) {
		        	$return .= "\t * array\n";	
			}	
			$return .= "\t * @access public\n"
			. "\t * @var ".$property->getAttribute("type")."\n"
			. "\t */\n"
			. "\t".'public $'.$property->getAttribute("validatedName").";\n";
			
			
			
			
			if(strcmp($property->getAttribute("max"), "unbounded") == 0 || $property->getAttribute("max") > 1) {
				// handle collection type
				$nvpSerializeCode .= "\t\t" . 'for($i=0; $i<count($this->'. $property->getAttribute("validatedName") .');$i++) {'. "\n";
				if($this->isComplexType($property->getAttribute("type"))) {
					$nvpSerializeCode .= "\t\t\t". '$newPrefix = $prefix . "' . $property->getAttribute('name') . '($i).";' . "\n\t\t\t\$str .= ";
					$nvpSerializeCode .=  "\$delim . call_user_func(array(\$this->".$property->getAttribute("validatedName") . ", 'toNVPString'), \$newPrefix);\n";					
				} else {
					$nvpSerializeCode .= "\t\t\t". '$str .= $delim .  $prefix ."' . $property->getAttribute("name") . '($i)=" .  urlencode($this->' . $property->getAttribute("validatedName") . '[$i]);' . "\n";	
				}				
				$nvpSerializeCode .= "\t\t }\n";
			
			} else {
				$nvpSerializeCode .= "\t\tif( \$this->" . $property->getAttribute("validatedName") . " != null ) {\n";								
				if($this->isComplexType($property->getAttribute("type"))) {				
					// nested complex type
					$nvpSerializeCode .= "\t\t\t\$newPrefix = \$prefix . '" . $property->getAttribute('name') . ".';\n\t\t\t\$str .= ";
					$nvpSerializeCode .=  "\$delim . call_user_func(array(\$this->".$property->getAttribute("validatedName") . ", 'toNVPString'), \$newPrefix);\n";
					$nvpDeserializeCode .= "\t\t\t". '$newPrefix = $prefix ."' . $property->getAttribute('name') . '.";'. "\n";
					$nvpDeserializeCode .= "\t\t\t\$this->" . $property->getAttribute("validatedName") . ' = new ' . $property->getAttribute('type') . '($map, $newPrefix);' . "\n";				
				} else {
					$nvpDeserializeCode .= "\t\t\t\$mapKeyName =  \$prefix . '" . $property->getAttribute("name"). "';\n";
					$nvpSerializeCode .= "\t\t\t\$str .= \$delim .  \$prefix . '" . $property->getAttribute("name") ."=' . urlencode(\$this->".$property->getAttribute("validatedName") .");\n";
					$nvpDeserializeCode .= "\t\t\tif(\$map != null && array_key_exists(\$mapKeyName, \$map)) {\n\t\t\t\t";
					$nvpDeserializeCode .= "\$this->".$property->getAttribute("validatedName") . ' = $map[$mapKeyName];';
					$nvpDeserializeCode .= "\n\t\t\t}\n";				
				}			
				$nvpSerializeCode .= "\t\t\t\$delim = '&';\n\t\t}\n";				
			}														
		}
		$nvpDeserializeCode .= "\t\t}\n\t}\n";

		$extraParams = false;
		$paramMapReturn = "\t".'private $_parameterMap = array ('."\n";
		$properties = $class->getElementsByTagName("property");
		foreach ($properties as $property) {
			if ($property->getAttribute("name") != $property->getAttribute("validatedName")) {
				$extraParams = true;
				$paramMapReturn .= "\t\t".'"'.$property->getAttribute("name").
                    '" => "'.$property->getAttribute("validatedName").'",'."\n";
			}
		}
		$paramMapReturn .= "\t".');'."\n";
		$paramMapReturn .= "\t".'/**'."\n";
		$paramMapReturn .= "\t".' * Provided for setting non-php-standard named variables'."\n";
		$paramMapReturn .= "\t".' * @param $var Variable name to set'."\n";
		$paramMapReturn .= "\t".' * @param $value Value to set'."\n";
		$paramMapReturn .= "\t".' */'."\n";
		$paramMapReturn .= "\t".'public function __set($var, $value) '.
            '{ $this->{$this->_parameterMap[$var]} = $value; }'."\n";
		$paramMapReturn .= "\t".'/**'."\n";
		$paramMapReturn .= "\t".' * Provided for getting non-php-standard named variables'."\n";
		$paramMapReturn .= "\t".' * @param $var Variable name to get'."\n";
		$paramMapReturn .= "\t".' * @return mixed Variable value'."\n";
		$paramMapReturn .= "\t".' */'."\n";
		$paramMapReturn .= "\t".'public function __get($var) '.
            '{ return $this->{$this->_parameterMap[$var]}; }'."\n";

		if ($extraParams) {
			$return .= $paramMapReturn;
		}

		$return .= $nvpDeserializeCode;
		$return .= "\n\tpublic function toNVPString(\$prefix='') { \n";
		$return .= "\t\t\$str = '';\n$nvpSerializeCode\n";
		$return .= "\t\treturn \$str;\n\t}\n\n";
		
		$return .= "}}\n\n";
		return $return;
	}
	
    /**
     * Validates a name against standard PHP naming conventions
     * 
     * @param string $name the name to validate
     * 
     * @return string the validated version of the submitted name
     * 
     * @access private
     */
    private function _validateNamingConvention($name) 
    {
        return preg_replace('#[^a-zA-Z0-9_\x7f-\xff]*#', '',
            preg_replace('#^[^a-zA-Z_\x7f-\xff]*#', '', $name));
    }
    
    /**
     * Validates a class name against PHP naming conventions and already defined
     * classes, and optionally stores the class as a member of the interpreted classmap.
     * 
     * @param string $className the name of the class to test
     * @param boolean $addToClassMap whether to add this class name to the classmap
     * 
     * @return string the validated version of the submitted class name
     * 
     * @access private
     * @todo Add reserved keyword checks
     */
    private function _validateClassName($className, $addToClassMap = true) 
    {
        $validClassName = $this->_validateNamingConvention($className);
        
        if (class_exists($validClassName)) {
            throw new Exception("Class ".$validClassName." already defined.".
                " Cannot redefine class with class loaded.");
        }
        
        if ($addToClassMap) {
            $this->_classmap[$className] = $validClassName;
        }
        
        return $validClassName;
    }

    
    /**
     * Validates a wsdl type against known PHP primitive types, or otherwise
     * validates the namespace of the type to PHP naming conventions
     * 
     * @param string $type the type to test
     * 
     * @return string the validated version of the submitted type
     * 
     * @access private
     * @todo Extend type handling to gracefully manage extendability of wsdl definitions, add reserved keyword checking
     */    
    private function _validateType($type) 
    {
        $array = false;
        if (substr($type, -2) == "[]") {
            $array = true;
            $type = substr($type, 0, -2);
        }
        switch (strtolower($type)) {
        case "int": case "integer": case "long": case "byte": case "short":
        case "negativeInteger": case "nonNegativeInteger": 
        case "nonPositiveInteger": case "positiveInteger":
        case "unsignedByte": case "unsignedInt": case "unsignedLong": case "unsignedShort":
            $validType = "integer";
            break;
            
        case "float": case "long": case "double": case "decimal":
            $validType = "double";
            break;
            
        case "string": case "token": case "normalizedString": case "hexBinary":
            $validType = "string";
            break;
            
        default:
            $validType = $this->_validateNamingConvention($type);
            break;
        }
        if ($array) {
            $validType .= "[]";
        }
        return $validType;
    }
    
    private function lcFirst($string) {    	
    	$string{0} = strtolower($string{0});
    	return $string;    	
    }

    private function _normalizeDoc($docString) {
    	$docString = preg_replace('/^\s+$/m', " *", $docString);    	    	
    	$docString = preg_replace('/^\t\t+/m', " * ", $docString);
    	    	
    	return $docString . "\n";
    }
}
?>
