<?php
/**
 * Testcase for serializing cdata sections
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_Indent_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => "\n",
                   );

    
    function Serializer_Option_Indent_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Indent with spaces
    */
    function testSpaces()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_INDENT, '    ');
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array>
    <foo>bar</foo>
</array>', $s->getSerializedData());
    }

   /**
    * Indent with tabs
    */
    function testTabs()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_INDENT, "\t");
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array>
	<foo>bar</foo>
</array>', $s->getSerializedData());
    }
}