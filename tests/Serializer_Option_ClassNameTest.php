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
class XML_Serializer_Option_ClassName_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT               => '',
        XML_SERIALIZER_OPTION_LINEBREAKS           => '',
        XML_SERIALIZER_OPTION_CLASSNAME_AS_TAGNAME => true
    );

   /**
    * Test setting a global default tag
    */
    public function testSimple()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array(new stdClass(), new stdClass()));
        $this->assertEquals(
            '<array><stdclass /><stdclass /></array>'
            , strtolower($s->getSerializedData())
        );
    }

}
?>
