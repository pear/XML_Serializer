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
class XML_Serializer_Option_RootAttributes_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT       => '',
        XML_SERIALIZER_OPTION_LINEBREAKS   => '',
        XML_SERIALIZER_OPTION_ROOT_ATTRIBS => array('foo' => 'bar')
    );

   /**
    * Array
    */
    public function testString()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize('string');
        $this->assertEquals('<string foo="bar">string</string>', $s->getSerializedData());
    }

   /**
    * Array
    */
    public function testArray()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array foo="bar"><foo>bar</foo></array>', $s->getSerializedData());
    }

}
?>
