<?php
/**
 * Testcase for using the comment feature
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_AttributesContent_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_ATTRIBUTES_KEY       => 'atts',
                    XML_SERIALIZER_OPTION_CONTENT_KEY          => 'content'
                   );

    
    function Serializer_Option_AttributesContent_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test attributes
    */
    function testAttribs()
    {
        $s = new XML_Serializer($this->options);
        $data = array(
                  'foo' => array(
                              'atts' => array('one' => 1),
                              'bar'  => 'bar'
                           )
                );
        $s->serialize($data);
        $this->assertEquals('<array><foo one="1"><bar>bar</bar></foo></array>', $s->getSerializedData());
    }

   /**
    * Test content
    */
    function testContent()
    {
        $s = new XML_Serializer($this->options);
        $data = array(
                  'foo' => array(
                              'atts'    => array('one' => 1),
                              'content' => 'some data',
                           )
                );
        $s->serialize($data);
        $this->assertEquals('<array><foo one="1">some data</foo></array>', $s->getSerializedData());
    }

   /**
    * Test both
    */
    function testMixed()
    {
        $s = new XML_Serializer($this->options);
        $data = array(
                  'foo' => array(
                              'atts'    => array('one' => 1),
                              'content' => 'some data',
                              'bar'     => 'bar'
                           )
                );
        $s->serialize($data);
        $this->assertEquals('<array><foo one="1">some data<bar>bar</bar></foo></array>', $s->getSerializedData());
    }

   /**
    * Test indexed
    */
    function testNumbered()
    {
        $s = new XML_Serializer($this->options);
        $data = array(
                  'foo' => array(
                              'atts'    => array('one' => 1),
                              'content' => 'some data',
                              'bar', 'foo'
                           )
                );
        $s->serialize($data);
        $this->assertEquals('<array><foo one="1">some data<XML_Serializer_Tag>bar</XML_Serializer_Tag><XML_Serializer_Tag>foo</XML_Serializer_Tag></foo></array>', $s->getSerializedData());
    }
}