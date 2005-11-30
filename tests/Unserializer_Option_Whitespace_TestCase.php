<?php
/**
 * Testcase for whitespace settings
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Unserializer_Option_Whitespace_TestCase extends PHPUnit_TestCase
{
    var $xml = '<xml>
   <string>
   
    This XML
    document
    contains
    line breaks.

   </string>
 </xml>';
    
    function Serializer_Scalars_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test trim behaviour
    */
    function testTrim()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_WHITESPACE, XML_UNSERIALIZER_WHITESPACE_TRIM);
        $u->unserialize($this->xml);
        $expected = array('string' => 'This XML
    document
    contains
    line breaks.');
        $this->assertEquals($expected, $u->getUnserializedData());
    }

   /**
    * Test normalize behaviour
    */
    function testNormalize()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_WHITESPACE, XML_UNSERIALIZER_WHITESPACE_NORMALIZE);
        $u->unserialize($this->xml);
        $expected = array('string' => 'This XML document contains line breaks.');
        $this->assertEquals($expected, $u->getUnserializedData());
    }

   /**
    * Test keep behaviour
    */
    function testKeep()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_WHITESPACE, XML_UNSERIALIZER_WHITESPACE_KEEP);
        $u->unserialize($this->xml);
        $expected = array('string' => '
   
    This XML
    document
    contains
    line breaks.

   ');
        $this->assertEquals($expected, $u->getUnserializedData());
    }
}
?>