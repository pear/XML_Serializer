<?php
/**
 * Testcase for using a namespace
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_Namespace_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                   );

    
    function Serializer_Option_Namespace_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Simple namespace
    */
    function testSimple()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_NAMESPACE, 'foo');
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<foo:array><foo:foo>bar</foo:foo></foo:array>', $s->getSerializedData());
    }

   /**
    * Simple namespace
    */
    function testUri()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_NAMESPACE, array('foo', 'http://pear.php.net/XML_Serializer/foo'));
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<foo:array xmlns:foo="http://pear.php.net/XML_Serializer/foo"><foo:foo>bar</foo:foo></foo:array>', $s->getSerializedData());
    }
}