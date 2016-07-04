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
class XML_Serializer_Option_CDataSections_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT         => '',
        XML_SERIALIZER_OPTION_LINEBREAKS     => '',
        XML_SERIALIZER_OPTION_CDATA_SECTIONS => true
    );

   /**
    * Test a simple string
    */
    public function testString()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('a string');
        $this->assertEquals(
            '<string><![CDATA[a string]]></string>'
            , $s->getSerializedData()
        );
    }

   /**
    * Test a string with entities
    */
    public function testEntities()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('& < > "');
        $this->assertEquals(
            '<string><![CDATA[& < > "]]></string>'
            , $s->getSerializedData()
        );
    }

}
?>
