<?PHP
    require_once '../Serializer.php';

    $options = array(
                        "indent"    => "    ",
                        "linebreak" => "\n",
                        "typeHints" => false,
                        "addDecl"   => true,
                        "encoding"  => "UTF-8",
						"tagName"	=> "rdf:RDF",
                        "mode"      => "simplexml"
                    );
    
    $serializer = new XML_Serializer($options);

    
    $rdf    =   array(
						"channel" => array(
											"title" => "Example RDF channel",
											"link"  => "http://www.php-tools.de",
											"image"	=>	array(
																"title"	=> "Example image",
																"url"	=>	"http://www.php-tools.de/image.gif",
																"link"	=>	"http://www.php-tools.de"
															),
                                            "item"   =>  array(
                    											array(
                    												"title"	=> "Example item",
                    												"link"	=> "http://example.com"
                    											),
                    											array(
                    												"title"	=> "Another item",
                    												"link"	=> "http://example.com"
                    											),
                    											array(
                    												"title"	=> "I think you get it...",
                    												"link"	=> "http://example.com"
                    											)
                                                              )
										)
                    );
    
    $result = $serializer->serialize($rdf);
    
    if( $result === true ) {
        echo    "<pre>";
        echo    htmlentities($serializer->getSerializedData());
        echo    "</pre>";
    }
?>