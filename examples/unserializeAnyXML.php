<?PHP
    error_reporting(E_ALL);
    require_once 'XML/Unserializer.php';

    $options = array(
                     "complexType" => "array",
                     "keyAttribute" => "handle"
                    );
    
    $xml = '<users><user handle="schst">Stephan Schmidt</user><user handle="mj">Martin Jansen</user></users>';
    
    //  be careful to always use the ampersand in front of the new operator 
    $unserializer = &new XML_Unserializer($options);

    // userialize the document
    $status = $unserializer->unserialize($xml, false);    

    if (PEAR::isError($status)) {
        echo    "Error: " . $status->getMessage();
    } else {
        $data = $unserializer->getUnserializedData();

        echo	"<pre>";
        print_r( $data );
        echo	"</pre>";
    }

    // unserialize it again and change the complexType option
    // but leave other options untouched
    $status = $unserializer->unserialize($xml, false, array("complexType" => "object"));    

    if (PEAR::isError($status)) {
        echo    "Error: " . $status->getMessage();
    } else {
        $data = $unserializer->getUnserializedData();

        echo	"<pre>";
        print_r( $data );
        echo	"</pre>";
    }


    // unserialize it again and change the complexType option
    // and reset all other options
    $status = $unserializer->unserialize($xml, false, array("overrideOptions" => true, "complexType" => "object"));    

    if (PEAR::isError($status)) {
        echo    "Error: " . $status->getMessage();
    } else {
        $data = $unserializer->getUnserializedData();

        echo	"<pre>";
        print_r( $data );
        echo	"</pre>";
    }

?>