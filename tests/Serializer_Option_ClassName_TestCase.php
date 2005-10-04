<?php
/**
 * Testcase for setting the default tag
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_ClassName_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT     => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS => '',
                    XML_SERIALIZER_OPTION_CLASSNAME_AS_TAGNAME => true
                   );

    
    function Serializer_Option_ClassName_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test setting a global default tag
    */
    function testSimple()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array(new stdClass(), new stdClass()));
        $this->assertEquals('<array><stdclass /><stdclass /></array>', strtolower($s->getSerializedData()));
    }
}