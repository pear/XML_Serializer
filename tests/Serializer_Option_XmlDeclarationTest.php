<?php
/**
 * Unit Tests for serializing arrays
 *
 * @package    XML_Serializer
 * @subpackage tests
 * @author     Stephan Schmidt <schst@php-tools.net>
 * @author     Chuck Burgess <ashnazg@php.net>
 */

require_once 'XML/Serializer.php';

/**
 * Unit Tests for serializing arrays
 *
 * @package    XML_Serializer
 * @subpackage tests
 * @author     Stephan Schmidt <schst@php-tools.net>
 * @author     Chuck Burgess <ashnazg@php.net>
 */
class XML_Serializer_Option_XmlDeclaration_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT     => '',
        XML_SERIALIZER_OPTION_LINEBREAKS => '',
    );

   /**
    * Declaration
    */
    public function testDeclaration()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_XML_DECL_ENABLED, true);
        $s->serialize('string');
        $this->assertEquals('<?xml version="1.0"?><string>string</string>', $s->getSerializedData());
    }

   /**
    * Add encoding
    */
    public function testEncoding()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_XML_DECL_ENABLED, true);
        $s->setOption(XML_SERIALIZER_OPTION_XML_ENCODING, 'ISO-8859-1');
        $s->serialize('string');
        $this->assertEquals('<?xml version="1.0" encoding="ISO-8859-1"?><string>string</string>', $s->getSerializedData());
    }

}
?>
