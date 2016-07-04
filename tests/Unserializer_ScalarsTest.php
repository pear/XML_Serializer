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
class XML_Unserializer_Scalars_TestCase extends PHPUnit_Framework_TestCase {

   /**
    * Test unserializing simple data
    */
    public function testData()
    {
        $u = new XML_Unserializer();
        $xml = '<xml>data</xml>';
        $u->unserialize($xml);
        $this->assertEquals('data', $u->getUnserializedData());
    }

   /**
    * Test extracting the root name
    */
    public function testRootName()
    {
        $u = new XML_Unserializer();
        $xml = '<xml>data</xml>';
        $u->unserialize($xml);
        $this->assertEquals('xml', $u->getRootName());
    }

}
?>
