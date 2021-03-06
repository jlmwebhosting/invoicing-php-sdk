<?php
require_once 'PHPUnit/Framework.php';

require_once 'services\Invoice\Invoice.php';

/**
 * Test class for ResponseEnvelope.
 * 
 */
class ResponseEnvelopeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ResponseEnvelope
     */
    protected $object;
	protected $map;
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
     
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
    /**
	 * @test
	 */
    public function ResponseEnvelopeTest()
    {
    	 $this->map = array(
    		'responseEnvelope.ack' => 'Success',
'responseEnvelope.timestamp' => '2011-05-29T23%3A58%3A46.879-07%3A00',
'responseEnvelope.correlationId' =>  '2eba4859262a9',
'responseEnvelope.build' =>  '1917403',
);

		$this->object = new ResponseEnvelope($this->map ,'responseEnvelope.' );

		$this->assertEquals('Success', $this->object->ack);
		$this->assertEquals('1917403', $this->object->build);
		$this->assertEquals('2eba4859262a9', $this->object->correlationId);
		$this->assertEquals('2011-05-29T23%3A58%3A46.879-07%3A00', $this->object->timestamp);
    	
    }
}
?>
