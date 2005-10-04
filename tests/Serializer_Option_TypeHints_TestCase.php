<?php
/**
 * Testcase for type hints
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_TypeHints_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT     => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS => '',
                    XML_SERIALIZER_OPTION_TYPEHINTS  => true
                   );

    
    function Serializer_Option_TypeHints_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test type
    *
    * @todo add more types
    */
    function testType()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('string');
        $this->assertEquals('<string _type="string">string</string>', $s->getSerializedData());
    }

   /**
    * Test original key
    */
    function testKey()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo bar' => 'bar'));
        $this->assertEquals('<array _type="array"><XML_Serializer_Tag _originalKey="foo bar" _type="string">bar</XML_Serializer_Tag></array>', $s->getSerializedData());
    }

   /**
    * Test class
    */
    function testClass()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => new stdClass()));
        $this->assertEquals('<array _type="array"><foo _class="stdclass" _type="object" /></array>', strtolower($s->getSerializedData()));
    }
}