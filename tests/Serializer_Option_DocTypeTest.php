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
class XML_Serializer_Option_DocType_TestCase extends PHPUnit_Framework_TestCase {

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
        $s->setOption(XML_SERIALIZER_OPTION_DOCTYPE_ENABLED, true);
        $s->serialize('string');
        $this->assertEquals(
            '<!DOCTYPE string><string>string</string>'
            , $s->getSerializedData()
        );
    }

   /**
    * Declaration with System reference
    */
    public function testSystem()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_DOCTYPE_ENABLED, true);
        $s->setOption(XML_SERIALIZER_OPTION_DOCTYPE, '/path/to/doctype.dtd');
        $s->serialize('string');
        $this->assertEquals(
            '<!DOCTYPE string SYSTEM "/path/to/doctype.dtd"><string>string</string>'
            , $s->getSerializedData()
        );
    }

   /**
    * Declaration and ID and system reference
    */
    public function testId()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_DOCTYPE_ENABLED, true);
        $s->setOption(
            XML_SERIALIZER_OPTION_DOCTYPE
            , array(
                'uri' => 'http://pear.php.net/dtd/package-1.0',
                'id'  => '-//PHP//PEAR/DTD PACKAGE 1.0'
            )
        );
        $s->serialize('string');
        $this->assertEquals(
            '<!DOCTYPE string PUBLIC "-//PHP//PEAR/DTD PACKAGE 1.0" "http://pear.php.net/dtd/package-1.0"><string>string</string>'
            , $s->getSerializedData()
        );
    }

}
?>
