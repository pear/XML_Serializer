<?PHP
    require_once 'XML/Serializer.php';

    $options = array(
                        "indent"         => "    ",
                        "linebreak"      => "\n",
                        "defaultTagName" => "unnamedItem",
						"scalarAsAttributes" => true
                    );
    
    // this is just to get a nested object
    $pearError = PEAR::raiseError('This is just an error object',123);
	
	$value	=	array(
						"foo"	=>	array(
											"argh" => "bar"
										),
						"err"   => $pearError
					);
    
    $serializer = new XML_Serializer($options);
    
    $result = $serializer->serialize($value);
    
    if( $result === true ) {
		$xml = $serializer->getSerializedData();

	    echo	"<pre>";
	    print_r( htmlspecialchars($xml) );
	    echo	"</pre>";
    } else {
		echo	"<pre>";
		print_r($result);
		echo	"</pre>";
	}

?>