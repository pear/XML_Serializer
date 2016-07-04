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
class XML_Serializer_Scalars_TestCase extends PHPUnit_Framework_TestCase {

   /**
    * Test serializing a string
    */
    public function testString()
    {
        $s = new XML_Serializer();
        $s->serialize('a string');
        $this->assertEquals('<string>a string</string>', $s->getSerializedData());
        $s->serialize('');
        $this->assertEquals('<string />', $s->getSerializedData());
    }

   /**
    * Test serializing a integer
    */
    public function testInteger()
    {
        $s = new XML_Serializer();
        $s->serialize(456223);
        $this->assertEquals('<integer>456223</integer>', $s->getSerializedData());
        $s->serialize(-34);
        $this->assertEquals('<integer>-34</integer>', $s->getSerializedData());
        $s->serialize(0);
        $this->assertEquals('<integer>0</integer>', $s->getSerializedData());
    }

   /**
    * Test serializing a float
    */
    public function testDouble()
    {
        $s = new XML_Serializer();
        $s->serialize(455.65);
        $this->assertEquals('<double>455.65</double>', $s->getSerializedData());
        $s->serialize(-1.65451);
        $this->assertEquals('<double>-1.65451</double>', $s->getSerializedData());
    }

   /**
    * Test serializing a boolean
    */
    public function testBoolean()
    {
        $s = new XML_Serializer();
        $s->serialize(true);
        $this->assertEquals('<boolean>1</boolean>', $s->getSerializedData());
        $s->serialize(false);
        $this->assertEquals('<boolean />', $s->getSerializedData());
    }

   /**
    * Test serializing a null value
    */
    public function testNull()
    {
        $s = new XML_Serializer();
        $s->serialize(null);
        $this->assertEquals('<NULL />', $s->getSerializedData());
    }

   /**
    * Test serializing a resource
    */
    public function testResource()
    {
        $s = new XML_Serializer();
        $s->serialize(fopen(__FILE__, 'r'));
        $this->assertRegExp('/<resource>Resource id #[0-9]+<\/resource>/', $s->getSerializedData());
    }

}
?>
