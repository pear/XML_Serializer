<?php
/**
 * Testcase for encoding settings
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tests
 */
class Unserializer_Option_Encodings_TestCase extends PHPUnit_TestCase
{
    function Serializer_Scalars_TestCase($name)
    {
        $this->PHPUnit_TestCase($name);
    }

   /**
    * Test unserializing from UTF-8 to ISO-8859-1
    */
    function testUtf8ToIso()
    {
        $u = new XML_Unserializer();
        $u->setOption(XML_UNSERIALIZER_OPTION_ENCODING_SOURCE, 'UTF-8');
        $u->setOption(XML_UNSERIALIZER_OPTION_ENCODING_TARGET, 'ISO-8859-1');
        $xml = '<xml>'.utf8_encode('A string containing ü ä Ö ê').'</xml>';
        $u->unserialize($xml);
        $this->assertEquals('A string containing ü ä Ö ê', $u->getUnserializedData());
    }
}
?>