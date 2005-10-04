<?php
/**
 * Testcase for setting the root tag name
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_RootName_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_ROOT_NAME            => 'root'
                   );

    
    function Serializer_Option_RootName_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Array
    */
    function testString()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('string');
        $this->assertEquals('<root>string</root>', $s->getSerializedData());
    }

   /**
    * Array
    */
    function testArray()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<root><foo>bar</foo></root>', $s->getSerializedData());
    }
}