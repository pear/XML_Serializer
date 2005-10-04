<?php
/**
 * Testcase for ignoring null values
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_IgnoreNull_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_IGNORE_NULL          => true
                   );

    
    function Serializer_Option_IgnoreNull_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Array with null value
    */
    function testArray()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar', 'null' => null));
        $this->assertEquals('<array><foo>bar</foo></array>', $s->getSerializedData());
    }

   /**
    * Object with null value
    */
    function testObject()
    {
        $obj = new stdClass();
        $obj->foo = 'bar';
        $obj->null = null;
        $s = new XML_Serializer($this->options);
        $s->serialize($obj);
        $this->assertEquals('<stdClass><foo>bar</foo></stdClass>', $s->getSerializedData());
    }
}