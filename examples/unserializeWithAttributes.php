<?PHP
    error_reporting(E_ALL);
    require_once '../Unserializer.php';

    $options = array(
                        "parseAttributes"   =>  true,
                        "attributesArray"   =>  "_attributes"
//                        "prependAttributes" =>  "att_"
                    );
    
    //  be careful to always use the ampersand in front of the new operator 
    $unserializer = &new XML_Unserializer($options);

    // userialize the document
    $status = $unserializer->unserialize("example.xml", true);    

    echo	"<pre>";
    print_r($status);
    echo	"</pre>";
    
    if (PEAR::isError($status)) {
        echo    "Error: " . $status->getMessage();
    } else {
        $data = $unserializer->getUnserializedData();

        echo	"<pre>";
        print_r( $data );
        echo	"</pre>";
    }
?>