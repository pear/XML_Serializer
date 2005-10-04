<?php
/**
 * Testcase for using the comment feature
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_TagMap_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_TAGMAP               => array('foo' => 'bar')
                   );

    
    function Serializer_Option_TagMap_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test array
    */
    function testArray()
    {
        $s = new XML_Serializer($this->options);
        $data = array(
                  'foo' => 'test'
                );
        $s->serialize($data);
        $this->assertEquals('<array><bar>test</bar></array>', $s->getSerializedData());
    }

   /**
    * Test object
    */
    function testObject()
    {
        $s = new XML_Serializer($this->options);
        $obj = new stdClass();
        $obj->foo = 'test';
        $s->serialize($obj);
        $this->assertEquals('<stdclass><bar>test</bar></stdclass>', strtolower($s->getSerializedData()));
    }

   /**
    * Test object
    */
    function testNumberedObjects()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_CLASSNAME_AS_TAGNAME, true);
        $s->setOption(XML_SERIALIZER_OPTION_TAGMAP, array('stdClass' => 'foo'));
        $s->serialize(array(new stdClass(), new stdClass()));
        
        $this->assertEquals('<array><foo /><foo /></array>', strtolower($s->getSerializedData()));
    }
}