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
class XML_Serializer_Option_Namespace_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT     => '',
        XML_SERIALIZER_OPTION_LINEBREAKS => '',
    );

   /**
    * Simple namespace
    */
    public function testSimple()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_NAMESPACE, 'foo');
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<foo:array><foo:foo>bar</foo:foo></foo:array>', $s->getSerializedData());
    }

   /**
    * Simple namespace
    */
    public function testUri()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_NAMESPACE, array('foo', 'http://pear.php.net/XML_Serializer/foo'));
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<foo:array xmlns:foo="http://pear.php.net/XML_Serializer/foo"><foo:foo>bar</foo:foo></foo:array>', $s->getSerializedData());
    }

}
?>
