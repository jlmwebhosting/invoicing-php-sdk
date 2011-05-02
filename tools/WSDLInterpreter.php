<?php
/**
 * Interprets WSDL documents for the purposes of PHP 5 object creation
 * 
 * The WSDLInterpreter package is used for the interpretation of a WSDL 
 * document into PHP classes that represent the messages using inheritance
 * and typing as defined by the WSDL rather than SoapClient's limited
 * interpretation.  PHP classes are also created for each service that
 * represent the methods with any appropriate overloading and strict
 * variable type checking as defined by the WSDL.
 *
 * PHP version 5 
 * 
 * LICENSE: This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category    WebServices 
 * @package     WSDLInterpreter  
 * @author      Kevin Vaughan kevin@kevinvaughan.com
 * @copyright   2007 Kevin Vaughan
 * @license     http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * 
 */

/**
 * A lightweight wrapper of Exception to provide basic package specific 
 * unrecoverable program states.
 * 
 * @category WebServices
 * @package WSDLInterpreter
 */
class WSDLInterpreterException extends Exception { } 

/**
 * The main class for handling WSDL interpretation
 * 
 * The WSDLInterpreter is utilized for the parsing of a WSDL document for rapid
 * and flexible use within the context of PHP 5 scripts.
 * 
 * Example Usage:
 * <code>
 * require_once 'WSDLInterpreter.php';
 * $myWSDLlocation = 'http://www.example.com/ExampleService?wsdl';
 * $wsdlInterpreter = new WSDLInterpreter($myWSDLlocation);
 * $wsdlInterpreter->addGenerator(new PHPGenerator());
 * $wsdlInterpreter->save('/example/output/directory/');
 * </code>
 * 
 * @version 1.0.0a3
 * @category WebServices
 * @package WSDLInterpreter
 */
class WSDLInterpreter 
{
    /**
     * The WSDL document's URI
     * @var string
     * @access private
     */
    private $_wsdl = null;
  
    /**
     * DOM document representation of the wsdl and its translation
     * @var DOMDocument
     * @access private
     */
    private $_dom = null;
    
    /**
     * Array of sources for WSDL message classes
     * @var array
     * @access private
     */
    private $_classSources = array();
    
    /**
     * Array of sources for WSDL services
     * @var array
     * @access private
     */
    private $_serviceSources = array();
    
    /**
     * Array of generators for different language bindings
     * @var array
     * @access private
     */    
    private $_generators = array();
    
    
    /**
     * Parses the target wsdl and loads the interpretation into object members
     * 
     * @param string $wsdl  the URI of the wsdl to interpret
     * @throws WSDLInterpreterException Container for all WSDL interpretation problems
     * @todo Create plug in model to handle extendability of WSDL files
     */
    public function __construct($wsdl) 
    {
    	$this->_wsdl = $wsdl;
    	$this->_dom = new DOMDocument();
    	
        try {
            $this->_dom->load($wsdl);
        } catch (Exception $e) {
            throw new WSDLInterpreterException("Error loading WSDL document (".$e->getMessage().")");
        }  

    }
    
    /**
     * Transforms WSDL file into an intermediate xsl 
     * for easier parsing
     * 
     * @param string $xslFile
     * @throws WSDLInterpreterException
     */
    private function _transformWSDL($xslFile, $debug=FALSE) {
		try {
            $xsl = new XSLTProcessor();
            $xslDom = new DOMDocument();
            $xslDom->load($xslFile);
            $xsl->importStyleSheet($xslDom);              
            if($debug) {
            	var_dump($xsl->transformToXml($this->_dom));	
            } else {       
            	$this->_dom = $xsl->transformToDoc($this->_dom);
            }
            $this->_dom->formatOutput = true;
        } catch (Exception $e) {
            throw new WSDLInterpreterException("Error interpreting WSDL document (".$e->getMessage().")");
        }    	
    }
    
    /**
     * Setter for adding new generator
     * 
     * @param IGenerator $generator
     */
    public function addGenerator($generator) {
    	$this->_generators[] = $generator;
    }     
    
     
	/**
     * Saves the source code that has been loaded to a target directory.
     * The actual task of generating source code in different languages
     * is handled by the generator classes
     *  
     * Services will be saved by their validated name, and classes will be included
     * with each service file so that they can be utilized independently.
     * 
     * @param string $outputDirectory the destination directory for the source code
     * @return array array of source code files that were written out
     * @throws WSDLInterpreterException problem in writing out service sources
     * @access public
     * @todo Add split file options for more efficient output
     */    
    public function generate($classPrefix = "") {
    	
    	//$this->_transformWSDL(dirname(__FILE__)."/wsdl2php.xsl", TRUE);		
    	$this->_transformWSDL(dirname(__FILE__)."/wsdl2php.xsl");		
			foreach($this->_generators as $generator) {
				$generator->setDom($this->_dom);				
				$generator->saveService($classPrefix);
				$generator->saveModel($classPrefix);			
			}            
    }       

}

?>
