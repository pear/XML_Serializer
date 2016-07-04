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
class XML_Serializer_Option_Indent_TestCase extends PHPUnit_Framework_TestCase {

    private $options = array(
        XML_SERIALIZER_OPTION_LINEBREAKS => "\n",
    );

   /**
    * Indent with spaces
    */
    public function testSpaces()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_INDENT, '    ');
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array>
    <foo>bar</foo>
</array>', $s->getSerializedData());
    }

   /**
    * Indent with tabs
    */
    public function testTabs()
    {
        $s = new XML_Serializer($this->options);
        $s->setOption(XML_SERIALIZER_OPTION_INDENT, "\t");
        $s->serialize(array('foo' => 'bar'));
        $this->assertEquals('<array>
	<foo>bar</foo>
</array>', $s->getSerializedData());
    }

}
?>
