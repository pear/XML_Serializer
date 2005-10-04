<?php
/**
 * Testcase for serializing arrays
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Objects_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT     => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS => '',
                   );
    
    function Serializer_Objects_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test serializing an object without any properties
    */
    function testEmptyObject()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(new stdClass());
        $this->assertEquals('<stdClass />', $s->getSerializedData());
    }

   /**
    * Test serializing a simple object
    */
    function testSimpleObject()
    {
        $obj = new stdClass();
        $obj->foo = 'bar';
        $s = new XML_Serializer($this->options);
        $s->serialize($obj);
        $this->assertEquals('<stdClass><foo>bar</foo></stdClass>', $s->getSerializedData());
    }

   /**
    * Test serializing a nested object
    */
    function testNestedObject()
    {
        $obj = new stdClass();
        $obj->foo = new stdClass();
        $obj->foo->bar = 'nested';
        $s = new XML_Serializer($this->options);
        $s->serialize($obj);
        $this->assertEquals('<stdClass><foo><bar>nested</bar></foo></stdClass>', $s->getSerializedData());
    }
}