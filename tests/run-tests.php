<?php
/**
 * Unit tests for XML_Serializer package
 * 
 * $Id$
 *
 * @package    XML_Serializer
 * @subpackage Tests
 */

require_once 'System.php';
require_once 'PHPUnit.php';
require_once 'XML/Serializer.php';

$testcases = array(
    'Serializer_Scalars_TestCase',
    'Serializer_Arrays_TestCase',
    'Serializer_Objects_TestCase',
    'Serializer_Option_EncodeFunc_TestCase',
    'Serializer_Option_ReturnResult_TestCase',
    'Serializer_Option_CDataSections_TestCase',
    'Serializer_Option_Linebreaks_TestCase',
    'Serializer_Option_Indent_TestCase',
    'Serializer_Option_IgnoreNull_TestCase'
);

$suite =& new PHPUnit_TestSuite();

foreach ($testcases as $testcase) {
    include_once $testcase . '.php';
    $methods = preg_grep('/^test/i', get_class_methods($testcase));
    foreach ($methods as $method) {
        $suite->addTest(new $testcase($method));
    }
}

$result = PHPUnit::run($suite);

echo $result->toString();
?>