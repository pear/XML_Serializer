<?php
/**
 * Testcase for serializing and directly returning the result
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_ReturnResult_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_RETURN_RESULT        => true
                   );

    
    function Serializer_Option_ReturnResult_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }
    
   /**
    * Test encode function with cdata
    */
    function testReturnResult()
    {
        $s = new XML_Serializer($this->options);
        $this->assertEquals('<string>a string</string>', $s->serialize('a string'));
    }
}