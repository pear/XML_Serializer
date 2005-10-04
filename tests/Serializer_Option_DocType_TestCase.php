<?php
/**
 * Testcase for adding an doctype declaration
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_DocType_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                   );

    
    function Serializer_Option_DocType_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Declaration
    */
    function testDeclaration()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_DOCTYPE_ENABLED, true);
        $s->serialize('string');
        $this->assertEquals('<!DOCTYPE string><string>string</string>', $s->getSerializedData());
    }

   /**
    * Declaration
    */
    function testSystem()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_DOCTYPE_ENABLED, true);
        $s->setOption(XML_SERIALIZER_OPTION_DOCTYPE, '/path/to/doctype.dtd');
        $s->serialize('string');
        $this->assertEquals('<!DOCTYPE string SYSTEM "/path/to/doctype.dtd"><string>string</string>', $s->getSerializedData());
    }
}