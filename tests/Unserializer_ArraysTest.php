<?php
/**
 * Unit Tests for serializing arrays
 *
 * @package    XML_Serializer
 * @subpackage tests
 * @author     Stephan Schmidt <schst@php-tools.net>
 * @author     Chuck Burgess <ashnazg@php.net>
 */

require_once 'XML/Unserializer.php';

/**
 * Unit Tests for serializing arrays
 *
 * @package    XML_Serializer
 * @subpackage tests
 * @author     Stephan Schmidt <schst@php-tools.net>
 * @author     Chuck Burgess <ashnazg@php.net>
 */
class XML_Unserializer_Arrays_TestCase extends PHPUnit_Framework_TestCase {

   /**
    * Test unserializing a simple array
    */
    public function testAssoc()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_COMPLEXTYPE, 'array');
        $xml = '<xml><foo>bar</foo></xml>';
        $u->unserialize($xml);
        $this->assertEquals(array('foo' => 'bar'), $u->getUnserializedData());
    }

   /**
    * Test unserializing an indexed array
    */
    public function testIndexed()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_COMPLEXTYPE, 'array');
        $xml = '<xml><foo>bar</foo><foo>tomato</foo></xml>';
        $u->unserialize($xml);
        $this->assertEquals(array('foo' => array('bar', 'tomato')), $u->getUnserializedData());
    }

}
?>
