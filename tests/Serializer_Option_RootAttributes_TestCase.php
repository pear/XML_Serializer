<?php
/**
 * Testcase for setting the root attributes
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_RootAttributes_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_ROOT_ATTRIBS         => array('foo' => 'bar')
                   );

    
    function Serializer_Option_RootAttributes_TestCase($name)
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
        $this->assertEquals('<string foo="bar">string</string>', $s->getSerializedData());
    }

   /**
    * Array
    */
    function testArray()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array foo="bar"><foo>bar</foo></array>', $s->getSerializedData());
    }
}