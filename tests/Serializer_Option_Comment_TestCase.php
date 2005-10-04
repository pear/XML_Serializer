<?php
/**
 * Testcase for using the comment feature
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Serializer_Option_Comment_TestCase extends PHPUnit_TestCase
{
    var $options = array(
                    XML_SERIALIZER_OPTION_LINEBREAKS           => '',
                    XML_SERIALIZER_OPTION_INDENT               => '',
                    XML_SERIALIZER_OPTION_COMMENT_KEY          => 'comment'
                   );

    
    function Serializer_Option_Comment_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test comment
    */
    function testComment()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('test' => array('comment' => 'This is a test', 'foo' => 'bar')));
        $this->assertEquals('<array><!-- This is a test --><test><foo>bar</foo></test></array>', $s->getSerializedData());
    }
}