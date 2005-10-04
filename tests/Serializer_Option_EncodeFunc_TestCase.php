<?php
/**
 * Testcase for serializing arrays
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_EncodeFunc_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_SCALAR_AS_ATTRIBUTES => true,
                    XML_SERIALIZER_OPTION_ENCODE_FUNC          => 'strtoupper'
                   );

    
    function Serializer_Option_EncodeFunc_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test encode function with cdata
    */
    function testCData()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('a string');
        $this->assertEquals('<string>A STRING</string>', $s->getSerializedData());
    }

   /**
    * Test encode function with attributes
    */
    function testAttributes()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array foo="BAR" />', $s->getSerializedData());
    }

   /**
    * Test encode function with cdata
    */
    function testMixed()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar', 'tomato'));
        $this->assertEquals('<array foo="BAR"><XML_Serializer_Tag>TOMATO</XML_Serializer_Tag></array>', $s->getSerializedData());
    }
}