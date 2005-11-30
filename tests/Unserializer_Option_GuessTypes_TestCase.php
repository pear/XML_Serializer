<?php
/**
 * Testcase for guessing values
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Unserializer_Option_GuessTypes_TestCase extends PHPUnit_TestCase
{
    function Serializer_Scalars_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test unserializing a boolean
    */
    function testBoolean()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_GUESS_TYPES, true);
        $xml = '<xml>true</xml>';
        $u->unserialize($xml);
        $this->assertEquals(true, $u->getUnserializedData());
        $xml = '<xml>false</xml>';
        $u->unserialize($xml);
        $this->assertEquals(false, $u->getUnserializedData());
    }

   /**
    * Test unserializing an integer
    */
    function testInteger()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_GUESS_TYPES, true);
        $xml = '<xml>453</xml>';
        $u->unserialize($xml);
        $this->assertEquals(453, $u->getUnserializedData());
        $xml = '<xml>-1</xml>';
        $u->unserialize($xml);
        $this->assertEquals(-1, $u->getUnserializedData());
    }

   /**
    * Test unserializing a float
    */
    function testFloat()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_GUESS_TYPES, true);
        $xml = '<xml>453.54553</xml>';
        $u->unserialize($xml);
        $this->assertEquals(453.54553, $u->getUnserializedData());
        $xml = '<xml>-1.47</xml>';
        $u->unserialize($xml);
        $this->assertEquals(-1.47, $u->getUnserializedData());
    }
}