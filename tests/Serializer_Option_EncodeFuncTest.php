<?php
/**
 * Unit Tests for serializing arrays
 *
 * @package    XML_Serializer
 * @subpackage tests
 * @author     Stephan Schmidt <schst@php-tools.net>
 * @author     Chuck Burgess <ashnazg@php.net>
 */

require_once 'XML/Serializer.php';

/**
 * Unit Tests for serializing arrays
 *
 * @package    XML_Serializer
 * @subpackage tests
 * @author     Stephan Schmidt <schst@php-tools.net>
 * @author     Chuck Burgess <ashnazg@php.net>
 */
class XML_Serializer_Option_EncodeFunc_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT               => '',
        XML_SERIALIZER_OPTION_LINEBREAKS           => '',
        XML_SERIALIZER_OPTION_SCALAR_AS_ATTRIBUTES => true,
        XML_SERIALIZER_OPTION_ENCODE_FUNC          => 'strtoupper'
    );

   /**
    * Test encode function with cdata
    */
    public function testCData()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('a string');
        $this->assertEquals('<string>A STRING</string>', $s->getSerializedData());
    }

   /**
    * Test encode function with attributes
    */
    public function testAttributes()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array foo="BAR" />', $s->getSerializedData());
    }

   /**
    * Test encode function with cdata
    */
    public function testMixed()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar', 'tomato'));
        $this->assertEquals('<array foo="BAR"><XML_Serializer_Tag>TOMATO</XML_Serializer_Tag></array>', $s->getSerializedData());
    }

}
?>
