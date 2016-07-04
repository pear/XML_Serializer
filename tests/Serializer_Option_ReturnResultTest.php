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
class XML_Serializer_Option_ReturnResult_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_INDENT        => '',
        XML_SERIALIZER_OPTION_LINEBREAKS    => '',
        XML_SERIALIZER_OPTION_RETURN_RESULT => true
    );

   /**
    * Test encode function with cdata
    */
    public function testReturnResult()
    {
        $s = new XML_Serializer($this->options);
        $this->assertEquals('<string>a string</string>', $s->serialize('a string'));
    }

}
?>
