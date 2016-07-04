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
class XML_Unserializer_Option_GuessTypes_TestCase extends PHPUnit_Framework_TestCase {
   /**
    * Test unserializing a boolean
    */
    public function testBoolean()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_GUESS_TYPES, true);
        $xml = '<xml>true</xml>';
        $u->unserialize($xml);
        $this->assertEquals(true, $u->getUnserializedData());
        $xml = '<xml>false</xml>';
        $u->unserialize($xml);
        $this->assertEquals(false, $u->getUnserializedData());
    }

   /**
    * Test unserializing an integer
    */
    public function testInteger()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_GUESS_TYPES, true);
        $xml = '<xml>453</xml>';
        $u->unserialize($xml);
        $this->assertEquals(453, $u->getUnserializedData());
        $xml = '<xml>-1</xml>';
        $u->unserialize($xml);
        $this->assertEquals(-1, $u->getUnserializedData());
    }

   /**
    * Test unserializing a float
    */
    public function testFloat()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_GUESS_TYPES, true);
        $xml = '<xml>453.54553</xml>';
        $u->unserialize($xml);
        $this->assertEquals(453.54553, $u->getUnserializedData());
        $xml = '<xml>-1.47</xml>';
        $u->unserialize($xml);
        $this->assertEquals(-1.47, $u->getUnserializedData());
    }

}
?>
