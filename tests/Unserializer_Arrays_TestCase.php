<?php
/**
 * Testcase for unserializing XML to arrays
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Unserializer_Arrays_TestCase extends PHPUnit_TestCase
{
    function Serializer_Scalars_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test unserializing a simple array
    */
    function testAssoc()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_COMPLEXTYPE, 'array');
        $xml = '<xml><foo>bar</foo></xml>';
        $u->unserialize($xml);
        $this->assertEquals(array('foo' => 'bar'), $u->getUnserializedData());
    }

   /**
    * Test unserializing an indexed array
    */
    function testIndexed()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_COMPLEXTYPE, 'array');
        $xml = '<xml><foo>bar</foo><foo>tomato</foo></xml>';
        $u->unserialize($xml);
        $this->assertEquals(array('foo' => array('bar', 'tomato')), $u->getUnserializedData());
    }
}