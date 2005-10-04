<?php
/**
 * Testcase for serializing scalar values
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Scalars_TestCase extends PHPUnit_TestCase
{
    function Serializer_Scalars_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test serializing a string
    */
    function testString()
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
    function testInteger()
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
    function testDouble()
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
    function testBoolean()
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
    function testNull()
    {
        $s = new XML_Serializer();
        $s->serialize(null);
        $this->assertEquals('<NULL />', $s->getSerializedData());
    }

   /**
    * Test serializing a resource
    */
    function testResource()
    {
        $s = new XML_Serializer();
        $s->serialize(fopen(__FILE__, 'r'));
        $this->assertRegExp('/<resource>Resource id #[0-9]+<\/resource>/', $s->getSerializedData());
    }
}