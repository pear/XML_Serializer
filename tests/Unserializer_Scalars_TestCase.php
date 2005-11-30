<?php
/**
 * Testcase for unserializing scalar data
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Unserializer_Scalars_TestCase extends PHPUnit_TestCase
{
    function Serializer_Scalars_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test unserializing simple data
    */
    function testData()
    {
        $u = new XML_Unserializer();
        $xml = '<xml>data</xml>';
        $u->unserialize($xml);
        $this->assertEquals('data', $u->getUnserializedData());
    }

   /**
    * Test extracting the root name
    */
    function testRootName()
    {
        $u = new XML_Unserializer();
        $xml = '<xml>data</xml>';
        $u->unserialize($xml);
        $this->assertEquals('xml', $u->getRootName());
    }
}