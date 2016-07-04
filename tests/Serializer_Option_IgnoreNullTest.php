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
class XML_Serializer_Option_IgnoreNull_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT      => '',
        XML_SERIALIZER_OPTION_LINEBREAKS  => '',
        XML_SERIALIZER_OPTION_IGNORE_NULL => true
    );

   /**
    * Array with null value
    */
    public function testArray()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('foo' => 'bar', 'null' => null));
        $this->assertEquals('<array><foo>bar</foo></array>', $s->getSerializedData());
    }

   /**
    * Object with null value
    */
    public function testObject()
    {
        $obj = new stdClass();
        $obj->foo = 'bar';
        $obj->null = null;
        $s = new XML_Serializer($this->options);
        $s->serialize($obj);
        $this->assertEquals('<stdClass><foo>bar</foo></stdClass>', $s->getSerializedData());
    }

}
?>
