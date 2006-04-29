<?php
/**
 * script to automate the generation of the
 * package.xml file.
 *
 * $Id$
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     XML_Serializer
 * @subpackage  Tools
 */

/**
 * uses PackageFileManager
 */
require_once 'PEAR/PackageFileManager.php';

/**
 * current version
 */
$version = '1.0.0RC1';

/**
 * current state
 */
$state = 'beta';

/**
 * release notes
 */
$notes = <<<EOT
XML_Serializer:
- fixed bug with doctype declaration (root tag has not been included)
- fixed bug with doctype declaration when using arrays or objects (root tag has not been included)
- fixed bug that prohibited the creation of mixed content tags
- Added unit tests for all features
- Removed obsolete examples and adjusted CS in all remaining examples
- fixed bug #6128 (wrong type in documentation)
XML_Unserializer:
EOT;

/**
 * package description
 */
$description = <<<EOT
XML_Serializer serializes complex data structures like arrays or object as XML documents.
This class helps you generating any XML document you require without the need for DOM.
Furthermore this package can be used as a replacement to serialize() and unserialize() as it comes with a matching XML_Unserializer that is able to create PHP data structures (like arrays and objects) from XML documents, if type hints are available.
If you use the XML_Unserializer on standard XML files, it will try to guess how it has to be unserialized. In most cases it does exactly what you expect it to do.
Try reading a RSS file with XML_Unserializer and you have the whole RSS file in a structured array or even a collection of objects, similar to XML_RSS.

Since version 0.8.0 the package is able to treat XML documents similar to the simplexml extension of PHP 5.
EOT;

$package = new PEAR_PackageFileManager();

$result = $package->setOptions(array(
    'package'           => 'XML_Serializer',
    'summary'           => 'Swiss-army knife for reading and writing XML files. Creates XML files from data structures and vice versa.',
    'description'       => $description,
    'version'           => $version,
    'state'             => $state,
    'license'           => 'PHP License',
    'filelistgenerator' => 'cvs',
    'ignore'            => array('package.php', 'package.xml', 'package2.xml'),
    'notes'             => $notes,
    'simpleoutput'      => true,
    'baseinstalldir'    => 'XML',
    'packagedirectory'  => './',
    'dir_roles'         => array('docs' => 'doc',
                                 'examples' => 'doc',
                                 'tests' => 'test',
                                 )
    ));

if (PEAR::isError($result)) {
    echo $result->getMessage();
    die();
}

$package->addMaintainer('schst', 'lead', 'Stephan Schmidt', 'schst@php-tools.net');
$package->addGlobalReplacement('package-info', '@package_version@', 'version');

//$package->detectDependencies();

$package->addDependency('php', '4.2.0', 'ge', 'php', false);
$package->addDependency('PEAR', '', 'has', 'pkg', false);
$package->addDependency('XML_Parser', '1.2.6', 'ge', 'pkg', false);
$package->addDependency('XML_Util', '1.1.1', 'ge', 'pkg', false);

if (isset($_GET['make']) || (isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == 'make')) {
    $result = $package->writePackageFile();
} else {
    $result = $package->debugPackageFile();
}

if (PEAR::isError($result)) {
    echo $result->getMessage();
    die();
}
?>