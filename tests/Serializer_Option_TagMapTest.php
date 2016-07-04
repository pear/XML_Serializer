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
class XML_Serializer_Option_TagMap_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT     => '',
        XML_SERIALIZER_OPTION_LINEBREAKS => '',
        XML_SERIALIZER_OPTION_TAGMAP     => array('foo' => 'bar')
    );

   /**
    * Test array
    */
    public function testArray()
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
    public function testObject()
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
    public function testNumberedObjects()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_CLASSNAME_AS_TAGNAME, true);
        $s->setOption(XML_SERIALIZER_OPTION_TAGMAP, array('stdClass' => 'foo'));
        $s->serialize(array(new stdClass(), new stdClass()));

        $this->assertEquals('<array><foo /><foo /></array>', strtolower($s->getSerializedData()));
    }

}
?>
