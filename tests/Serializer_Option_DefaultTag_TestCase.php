<?php
/**
 * Testcase for setting the default tag
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_DefaultTag_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT     => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS => '',
                   );

    
    function Serializer_Option_DefaultTag_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test setting a global default tag
    */
    function testSimple()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_DEFAULT_TAG, 'tag');
        $s->serialize(array('one', 'two', 'three'));
        $this->assertEquals('<array><tag>one</tag><tag>two</tag><tag>three</tag></array>', $s->getSerializedData());
    }

   /**
    * Test setting context sensitive default tags
    */
    function testContext()
    {
        $s = new XML_Serializer($this->options);
        $data = array(
                    'foos' => array(1,2),
                    'bars' => array(1,2),
                    );
        $s->setOption(XML_SERIALIZER_OPTION_DEFAULT_TAG, array('foos' => 'foo', 'bars' => 'bar'));
        $s->serialize($data);
        $this->assertEquals('<array><foos><foo>1</foo><foo>2</foo></foos><bars><bar>1</bar><bar>2</bar></bars></array>', $s->getSerializedData());
    }

   /**
    * Test setting mixed default tags
    */
    function testMixed()
    {
        $s = new XML_Serializer($this->options);
        $data = array(
                    'foos' => array(1,2),
                    'bars' => array(1,2),
                    'test'
                    );
        $s->setOption(XML_SERIALIZER_OPTION_DEFAULT_TAG, array('foos' => 'foo', '#default' => 'tag'));
        $s->serialize($data);
        $this->assertEquals('<array><foos><foo>1</foo><foo>2</foo></foos><bars><tag>1</tag><tag>2</tag></bars><tag>test</tag></array>', $s->getSerializedData());
    }
}