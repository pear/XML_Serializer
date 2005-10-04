<?php
/**
 * Testcase for serializing cdata sections
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_CDataSections_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_CDATA_SECTIONS       => true
                   );

    
    function Serializer_Option_CDataSections_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test a simple string
    */
    function testString()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('a string');
        $this->assertEquals('<string><![CDATA[a string]]></string>', $s->getSerializedData());
    }

   /**
    * Test a string with entities
    */
    function testEntities()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('& < > "');
        $this->assertEquals('<string><![CDATA[& < > "]]></string>', $s->getSerializedData());
    }
}