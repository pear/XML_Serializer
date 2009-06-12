--TEST--
XML_Serializer - Req #13564:  bool(false) is converted to empty string
--FILE--
<?php
require 'XML/Serializer.php';

// defaulted to XML_SERIALIZER_OPTION_FALSE_AS_STRING = false
echo 'Default (original) behavior:' . PHP_EOL;
$serializer = new XML_Serializer();
$serializer->setOption('rootName', 'BooleanTest');
if ($serializer->serialize(false)) {
    var_dump($serializer->getSerializedData());
}
if ($serializer->serialize(true)) {
    var_dump($serializer->getSerializedData());
}
echo PHP_EOL;

// modified to XML_SERIALIZER_OPTION_FALSE_AS_STRING = true
echo 'New behavior when enabled:' . PHP_EOL;
$serializer = new XML_Serializer();
$serializer->setOption(XML_SERIALIZER_OPTION_FALSE_AS_STRING, true);
$serializer->setOption('rootName', 'BooleanTest');
if ($serializer->serialize(false)) {
    var_dump($serializer->getSerializedData());
}
if ($serializer->serialize(true)) {
    var_dump($serializer->getSerializedData());
}
?>
--EXPECT--
Default (original) behavior:
string(15) "<BooleanTest />"
string(28) "<BooleanTest>1</BooleanTest>"

New behavior when enabled:
string(28) "<BooleanTest>0</BooleanTest>"
string(28) "<BooleanTest>1</BooleanTest>"
