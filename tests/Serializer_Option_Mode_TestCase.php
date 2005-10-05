<?php
/**
 * Testcase for the different modes
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_Mode_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                   );

    var $data = array(
                    'foo' => array(1, 2, 3),
                    'bar' => array(1, 2, 3)
                );
    
    function Serializer_Option_Mode_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Default mode
    */
    function testDefault()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize($this->data);
        $this->assertEquals('<array><foo><XML_Serializer_Tag>1</XML_Serializer_Tag><XML_Serializer_Tag>2</XML_Serializer_Tag><XML_Serializer_Tag>3</XML_Serializer_Tag></foo><bar><XML_Serializer_Tag>1</XML_Serializer_Tag><XML_Serializer_Tag>2</XML_Serializer_Tag><XML_Serializer_Tag>3</XML_Serializer_Tag></bar></array>', $s->getSerializedData());
    }

   /**
    * SimpleXML
    */
    function testSimpleXML()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_MODE, XML_SERIALIZER_MODE_SIMPLEXML);
        $s->serialize($this->data);
        $this->assertEquals('<array><foo>1</foo><foo>2</foo><foo>3</foo><bar>1</bar><bar>2</bar><bar>3</bar></array>', $s->getSerializedData());
    }
}