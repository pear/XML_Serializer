<?php
/**
 * Testcase for serializing arrays
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Arrays_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT     => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS => '',
                   );

    
    function Serializer_Arrays_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test serializing a numbered array
    */
    function testNumberedArray()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('one', 'two', 'three'));
        $this->assertEquals('<array><XML_Serializer_Tag>one</XML_Serializer_Tag><XML_Serializer_Tag>two</XML_Serializer_Tag><XML_Serializer_Tag>three</XML_Serializer_Tag></array>', $s->getSerializedData());
    }

   /**
    * Test serializing an assoc array
    */
    function testAssocArray()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('one' => 'foo', 'two' => 'bar'));
        $this->assertEquals('<array><one>foo</one><two>bar</two></array>', $s->getSerializedData());
    }

   /**
    * Test serializing an mixed array
    */
    function testMixedArray()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('one' => 'foo', 'two' => 'bar', 'three'));
        $this->assertEquals('<array><one>foo</one><two>bar</two><XML_Serializer_Tag>three</XML_Serializer_Tag></array>', $s->getSerializedData());
    }
}