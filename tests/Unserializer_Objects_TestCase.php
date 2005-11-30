<?php
/**
 * Testcase for unserializing XML to objects
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Unserializer_Objects_TestCase extends PHPUnit_TestCase
{
    function Serializer_Scalars_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test unserializing to a stdClass object
    */
    function testStdClass()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_COMPLEXTYPE, 'object');
        $xml = '<xml><foo>bar</foo></xml>';
        $u->unserialize($xml);
        $result = new stdClass();
        $result->foo = 'bar';
        $this->assertEquals($result, $u->getUnserializedData());
    }

   /**
    * Test unserializing to a custom class
    */
    function testDefaultClass()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_COMPLEXTYPE, 'object');
        $u->setOption(XML_UNSERIALIZER_OPTION_DEFAULT_CLASS, 'Foo');
        $xml = '<xml><foo>bar</foo></xml>';
        $u->unserialize($xml);
        $result = new Foo();
        $result->foo = 'bar';
        $this->assertEquals($result, $u->getUnserializedData());
    }

   /**
    * Test unserializing to a class based on the tag name
    */
    function testTagnameAsClass()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_COMPLEXTYPE, 'object');
        $u->setOption(XML_UNSERIALIZER_OPTION_DEFAULT_CLASS, 'Foo');
        $xml = '<foo><bar><boo>tomato</boo></bar></foo>';
        $u->unserialize($xml);
        $result = new Foo();
        $result->bar = new Bar();
        $result->bar->boo = 'tomato';
        $this->assertEquals($result, $u->getUnserializedData());
    }

   /**
    * Test unserializing with a setter method
    */
    function testSetterMethod()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_COMPLEXTYPE, 'object');
        $u->setOption(XML_UNSERIALIZER_OPTION_DEFAULT_CLASS, 'Foo');
        $xml = '<SetterExample><foo>tomato</foo></SetterExample>';
        $u->unserialize($xml);
        $result = new SetterExample();
        $result->setFoo('tomato');
        $this->assertEquals($result, $u->getUnserializedData());
    }
}

class Foo
{
}

class Bar
{
}

class SetterExample {
    var $_hidden = null;
    
    function setFoo($foo)
    {
        $this->_hidden = $foo;
    }
}
?>