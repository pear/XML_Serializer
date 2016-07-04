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
class XML_Serializer_Option_Comment_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT      => '',
        XML_SERIALIZER_OPTION_LINEBREAKS  => '',
        XML_SERIALIZER_OPTION_COMMENT_KEY => 'comment'
    );

   /**
    * Test comment
    */
    public function testComment()
    {
        $s = new XML_Serializer($this->options);
        $s->serialize(array('test' => array('comment' => 'This is a test', 'foo' => 'bar')));
        $this->assertEquals(
            '<array><!-- This is a test --><test><foo>bar</foo></test></array>'
            , $s->getSerializedData()
        );
    }

}
?>
