<?php

class Service {
	public $name;
	public $validatedName;
	public $doc;
	public $operations;
	public $dataTypes = array();
}

class Operation {
	public $name;
	public $validatedName;
	public $input = array();
	public $output;
	public $fault;
	public $doc;
}

class Property {
	public $name;
    public $type;
	public $validatedName;
	public $maxOccurs;
	public $minOccurs;
	public $doc;
	public $validation;
}

class DataType {
	public $name;
	public $validatedName;
	public $members = array();
	public $extends;
	public $doc;
	public $isOutputType;
	public $faults = array();
}
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

	private $_services;

	public function __construct($outputDir) {
		$this->_outputDirectory = $outputDir;
	}
	
	/**
	 * recursively discover types that are actually used by the service methods
	 */
	private function discoverTypes($service, $type, $isOutputType ) {		
		
		if( array_key_exists($type->validatedName, $service->dataTypes )) {
			$service->dataTypes[$type->validatedName]->isOutputType  |= $isOutputType;
		} else {			
			$service->dataTypes[$type->validatedName] = $type;		
		
			$expr = "*/class[@name='$type->name']";		
			$elements = $this->_xpath->query($expr);
			if($elements && $elements->length > 0) {			
	
	            $docNode = $elements->item(0)->getElementsByTagName("documentation");
	            if($docNode && $docNode->length > 0)
	                $type->doc = $this->_normalizeDoc($docNode->item(0)->textContent) . "\n";				
	
				foreach ($elements->item(0)->getElementsByTagName('property') as $prop) {				
	                $p = new Property();
	                $p->name = $prop->getAttribute("name");
	                $p->validatedName = $this->_validateNamingConvention($prop->getAttribute("name"));	
	                $p->maxOccurs = $prop->getAttribute("max");
	                $p->minOccurs = $prop->getAttribute("min");
	                $p->class = $prop->getAttribute("type");
	                $docNode = $prop->getElementsByTagName("documentation");
	                if($docNode && $docNode->length > 0)
	                    $p->doc = $this->_normalizeDoc($docNode->item(0)->textContent) . "\n";				
	                $type->members[$p->name] = $p;					
	
					if( $this->isComplexType($prop->getAttribute("type")) && !array_key_exists($prop->getAttribute("type"), $service->dataTypes)) {
	                    $d = new DataType();
	                    $d->name = $prop->getAttribute("type");
	                    $d->validatedName = $this->_validateType($prop->getAttribute("type"));	
	                    $d->isOutputType = $isOutputType;
						$this->discoverTypes($service, $d, $isOutputType);
	                }				
				}			
			}
		}
	}

	public function setDom($dom) {
		$this->_dom = $dom;
		$this->_xpath = new DOMXPath($this->_dom);
			
		foreach ($this->_dom->getElementsByTagName("service") as $service) {
			$s = new Service();
			$s->name = $service->getAttribute("name");
			$s->validatedName = $this->_validateClassName($service->getAttribute("name"));
			$this->_services[] = $s;
			
			foreach ($service->getElementsByTagName("function") as $function) {
				$o = new Operation();
				$s->operations[] = $o;
								
				$o->name = $function->getAttribute("name");
				$o->validatedName = $this->_validateNamingConvention($function->getAttribute("name"));
				$docNode = $function->getElementsByTagName("documentation");
				if($docNode && $docNode->length > 0)
					$o->doc = $this->_normalizeDoc($docNode->item(0)->textContent) . "\n";				
				
				$parameters = $function->getElementsByTagName("parameters");
				if ($parameters->length > 0) {
					$parameterList = $parameters->item(0)->getElementsByTagName("variable");

					foreach ($parameterList as $variable) {
					    // can be a simple type too	
						$p = new DataType();
						$p->name = $variable->getAttribute("type");
						$p->validatedName = $this->_validateType($variable->getAttribute("type"));						
						$p->isOutputType  = false;						
                        $docNode = $variable->getElementsByTagName("documentation");
                        if($docNode && $docNode->length > 0)
                            $p->doc = $this->_normalizeDoc($docNode->item(0)->textContent) . "\n";				
						$o->input[$variable->getAttribute("name")] = $p;
						$this->discoverTypes($s, $p, false);
					}
				}
				
				
				$soapFaults = array();
				$faults = $function->getElementsByTagName("throws");				
				if ($faults->length > 0) {
					$faultList = $faults->item(0)->getElementsByTagName("variable");
					foreach ($faultList as $variable) {
						$faultName = $this->_validateNamingConvention($variable->getAttribute("type"));
						if(array_key_exists($faultName, $s->dataTypes)) {
							$p = $s->dataTypes[$faultName];
						} else {					
							$p = new DataType();
							$p->name = $variable->getAttribute("type");
							
							$p->validatedName = $faultName;						
							$p->type = $this->_validateType($variable->getAttribute("type"));
	                        $docNode = $variable->getElementsByTagName("documentation");
	                        if($docNode && $docNode->length > 0)
	                            $p->doc = $this->_normalizeDoc($docNode->item(0)->textContent) . "\n";				
							$p->isOutputType = true;
							$this->discoverTypes($s, $p, true);
						}
						$o->fault = $p;
						$soapFaults[$p->type] = $p;	
						
					}
				}
				
				$out = $function->getElementsByTagName("returns");
				if ($out->length > 0) {
					$outList = $out->item(0)->getElementsByTagName("variable");
					foreach ($outList as $variable) {
						
						$p = new DataType();
						$p->name = $variable->getAttribute("type");
						$p->validatedName = $this->_validateNamingConvention($variable->getAttribute("type"));						
						$p->isOutputType  = true;						
						$p->faults = array_unique($soapFaults);
						
                        $docNode = $variable->getElementsByTagName("documentation");
                        if($docNode && $docNode->length > 0)
                            $p->doc = $this->_normalizeDoc($docNode->item(0)->textContent) . "\n";				
						$o->output = $p;
						$this->discoverTypes($s, $p, true);
					}
				}				
				
			}			
		}
	}

	public function saveService($classPrefix) {

		
		if (count($this->_services) == 0) {
			throw new WSDLInterpreterException("No services loaded");
		}

		$outputFiles = array();
		foreach ($this->_services as $serviceDefintion) {
			$serviceName = $serviceDefintion->validatedName;
			$serviceCode = $this->_generateService($serviceDefintion);
			$filename = $this->_outputDirectory . "/" . $serviceName."Service.php";
			if (file_put_contents($filename,
                    "<?php\n\nrequire_once('PPBaseService.php');\n" . $serviceCode."\n\n?>")) {
			$outputFiles[] = $filename;
                    }
		}
		if (sizeof($outputFiles) == 0) {
			throw new WSDLInterpreterException("Error writing PHP source files.");
		}
		return $outputFiles;
	}
	
	
	public function saveModel($classPrefix) {

		$outputFiles = array();
		
		foreach($this->_services as $service) {
			
			$classes = $service->dataTypes;			
			$classCode = "<?php\n";
            $classCode .= " /**\n * Stub objects for $service->name \n * Auto generated code \n * \n */\n";
            
			//TODO: Move to one file per class.
			foreach($classes as $c) {				
				$classCode .= $this->_generateClass($c);
			}
			$classCode .= "?>";	

			$fileName = $this->_outputDirectory."/" . $service->name . ".php";
			if (file_put_contents($fileName, $classCode."\n\n") ) {
				$outputFiles[] = $fileName;
			}
		}
		return $outputFiles;
	}



	private function _generateService($service)
	{
		$className = $service->validatedName . "Service";
		
		$return = "require_once('$service->validatedName.php');\nrequire_once('PPUtils.php');\n";		
		$return .= '/**'."\n";
		$return .= ' * '.$service->validatedName ." wrapper class\n";
		$return .= ' * Auto generated code'."\n";
		$return .= ' */'."\n";
		$return .= "class ".$className." extends PPBaseService {\n";
		$return .= "\t".'public function __construct() {'."\n";

		$return .= "\t\tparent::__construct('" . $service->name . "');\n";
		$return .= "\t}\n\n";

		$functionMap = array();
		$functions = $service->operations;
		foreach ($functions as $function) {
			if (!isset($functionMap[$function->validatedName])) {
				$functionMap[$function->validatedName] = array();
			}
			$functionMap[$function->validatedName][] = $function;
		}
		foreach ($functionMap as $functionName => $functionNodeList) {
			$return .= $this->_generateServiceFunction($functionName, $functionNodeList)."\n\n";
		}

		$return .= "}";
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
			
			$docNode = $functionNode->doc;
			if($docNode)
				$return .= "\n\t * " . $functionNode->doc . "\n";
				
			$parameters = $functionNode->input;
			$paramList = array();
				
			if (count($parameters) > 0) {
				
				foreach ($parameters as $name => $type) {
					$return .= "\t * ". '@param ';
					if (substr($type->name, 0, -2) == "[]") {
						$parameterTypes = "array";
					} else {
						$parameterTypes = $type->name;
					}
					$return .= $type->name. " " . $type->validatedName;
					$return .= "\n";
					$paramList[] = '$'. $this->lcFirst($type->validatedName);
				}
			}
			$returns = $functionNode->output;
			if ($returns != null) {				
					$returnOptions[] = $returns->validatedName;
				
			}
		}
		$paramList[] = "\$apiUsername";


		$return .= "\t".' * @return '.join("|", array_unique($returnOptions))."\n";
		$return .= "\t".' * @throws APIException'."\n";
		$return .= "\t".' */'."\n";

		$return .= "\t".'public function '.$functionName .'(';
		$return .= implode(", ", $paramList). "=null";
		$return .= ') {'."\n";
		$return .= "\t\t".'return new '. $returnOptions[0] . '( PPUtils::nvpToMap( $this->call("'.
		$functionNodeList[0]->name . '"';

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
		$return .= '/**'."\n";

		$return .= ' * '.$class->name."\n";
		if($class->doc != null)
			$return .= " * $class->doc \n ";
		$return .=	" */\n";
		
		$return .= "class ".$class->name;
		
		if ($class->extends != null) {
			$return .= " extends ". $class->extends;
		}
		$return .= " {\n";


		$nvpSerializeCode = "\t\t\$delim = '';\n";
		$nvpDeserializeCode = "\n\tpublic function __construct(\$map = null, \$prefix='') {\n\t\tif(\$map != null) {\n";
        $mandatoryParams = array();
        
        // add members from WSDL's fault message to the class
        if( $class->isOutputType && count($class->faults) > 0 ) {
        	foreach( $class->faults as $fault ) {
        		foreach($fault->members as $member) {  			
        			$class->members[$member->name] = $member;
        		}
        	}
        }
        
		foreach ($class->members as $property) {
			$return .= "\t/**\n";
            if($property->doc != null)
                $return .= $property->doc;
            else if($this->isComplexType($property->class)) {
                //TODO: get class's documentation
            }
			if(strcmp($property->maxOccurs, "unbounded") == 0 || $property->maxOccurs > 1) {
				$return .= "\t * array\n";
			}
			$return .= "\t * @access public\n"
			. "\t * @var ".$property->class."\n"
			. "\t */\n"
			. "\t".'public $'.$property->validatedName . ";\n";
				

			if(strcmp($property->maxOccurs, "unbounded") == 0 || $property->maxOccurs > 1) {
				// handle collection type
				$nvpSerializeCode .= "\t\t" . 'for($i=0; $i<count($this->'. $property->validatedName .');$i++) {'. "\n";
				//TODO: assuming there are no more than 10 elements for now
				$nvpDeserializeCode .= "\t\t\t" . 'for($i=0; $i<10;$i++) {'. "\n";
				if($this->isComplexType($property->class)) {		
					$nvpSerializeCode .= "\t\t\t". '$newPrefix = $prefix . "' . $property->name . '($i).";' . "\n\t\t\t\$str .= ";
					$nvpSerializeCode .=  "\$delim . call_user_func(array(\$this->".$property->validatedName . "[\$i], 'toNVPString'), \$newPrefix);\n";
					
					$nvpDeserializeCode .= "\t\t\t\t" . 'if( PPUtils::array_match_key($map, $prefix."'. $property->name. '($i)") ) {'. "\n";
					$nvpDeserializeCode .= "\t\t\t\t\t" . '$newPrefix = $prefix."'. $property->name. '($i).";'."\n\t\t\t\t".'$this->'. $property->validatedName. '[$i] = new ' . $property->class . '($map, $newPrefix);'. "\n\t\t\t\t}\n";
				} else {
					//TODO: nvp deserialize for array of simple types
					$nvpSerializeCode .= "\t\t\t". '$str .= $delim .  $prefix ."' . $property->name . '($i)=" .  urlencode($this->' . $property->validatedName . '[$i]);' . "\n";
										
				}
				$nvpSerializeCode .= "\t\t }\n";
				$nvpDeserializeCode .= "\t\t\t }\n";

			} else {
                if($property->minOccurs == 1) {
                    $mandatoryParams[] = $property->name;
                }
				$nvpSerializeCode .= "\t\tif( \$this->" . $property->validatedName . " != null ) {\n";
				if($this->isComplexType($property->class)) {		
					// nested complex type
					$nvpSerializeCode .= "\t\t\t\$newPrefix = \$prefix . '" . $property->name . ".';\n\t\t\t\$str .= ";
					$nvpSerializeCode .=  "\$delim . call_user_func(array(\$this->".$property->validatedName . ", 'toNVPString'), \$newPrefix);\n";
					$nvpDeserializeCode .= "\t\t\t". '$newPrefix = $prefix ."' . $property->name . '.";'. "\n";
					$nvpDeserializeCode .= "\t\t\t\$this->" . $property->validatedName . ' = new ' . $property->class . '($map, $newPrefix);' . "\n";
				} else {
					
					$nvpDeserializeCode .= "\t\t\t\$mapKeyName =  \$prefix . '" . $property->name. "';\n";
					$nvpSerializeCode .= "\t\t\t\$str .= \$delim .  \$prefix . '" . $property->name ."=' . urlencode(\$this->".$property->validatedName .");\n";
					$nvpDeserializeCode .= "\t\t\tif(\$map != null && array_key_exists(\$mapKeyName, \$map)) {\n\t\t\t\t";
					$nvpDeserializeCode .= "\$this->".$property->validatedName . ' = $map[$mapKeyName];';
					$nvpDeserializeCode .= "\n\t\t\t}\n";
				}
				$nvpSerializeCode .= "\t\t\t\$delim = '&';\n\t\t}\n";
			}
		}
		$nvpDeserializeCode .= "\t\t}\n\t}\n";
		if($class->isOutputType) {
			$return .= $nvpDeserializeCode;
		} else {	
            if(count($mandatoryParams) > 0) {
                $return .= "\n\tpublic function __construct(";
                $args = array();
                foreach($mandatoryParams as $param) {
                    $args[] = "\$$param = null";
                }

                $return .= implode(", ", $args) . ") {\n";
                foreach($mandatoryParams as $param) {
                    $return .= "\t\t\$this->$param  = \$$param;\n";
                }
                $return .= "\t}\n";
            }
            
			$return .= "\n\tpublic function toNVPString(\$prefix='') { \n";
			$return .= "\t\t\$str = '';\n$nvpSerializeCode\n";
			$return .= "\t\treturn \$str;\n\t}\n\n";
		}

		$return .= "}\n\n";
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
		$docString = preg_replace('/^\s+$/m', " ", $docString);
		$docString = preg_replace('/^\t\t+/m', "  ", $docString);

		return $docString;
	}
}
?>
