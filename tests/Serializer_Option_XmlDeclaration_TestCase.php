<?php
/**
 * Testcase for adding an XML declaration
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_XmlDeclaration_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                   );

    
    function Serializer_Option_XmlDeclaration_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Declaration
    */
    function testDeclaration()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_XML_DECL_ENABLED, true);
        $s->serialize('string');
        $this->assertEquals('<?xml version="1.0"?><string>string</string>', $s->getSerializedData());
    }

   /**
    * Add encoding
    */
    function testEncoding()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_XML_DECL_ENABLED, true);
        $s->setOption(XML_SERIALIZER_OPTION_XML_ENCODING, 'ISO-8859-1');
        $s->serialize('string');
        $this->assertEquals('<?xml version="1.0" encoding="ISO-8859-1"?><string>string</string>', $s->getSerializedData());
    }
}