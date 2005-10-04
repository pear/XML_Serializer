<?php
/**
 * Testcase for serializing cdata sections
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_Linebreaks_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS           => "\n",
                   );

    
    function Serializer_Option_Linebreaks_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test a simple string
    */
    function testUnixLinebreak()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array>
<foo>bar</foo>
</array>', $s->getSerializedData());
    }
}