<?PHP
    error_reporting(E_ALL);
    require_once '../Unserializer.php';

   /**
    * class for the RDF docuemnt
    *
    *
    */
    class rdf
    {
        var $channel;
        var $item;

        function getItems($amount)
        {
            return array_splice($this->item,0,$amount);
        }
    }


   /**
    * class that is used for a channel in the RSS file
    *
    * you could implement whatever you like in this class,
    * properties will be set from the XML document
    */
    class channel
    {
        function getTitle()
        {
            return  $this->title;
        }
    }
    
   /**
    * class that is used for an item in the RSS file
    *
    * you could implement whatever you like in this class,
    * properties will be set from the XML document
    */
    class item
    {
        function getTitle()
        {
            return  $this->title;
        }
    }


    $options = array(
                     "complexType" => "object",
                     "tagMap"      => array(
                                                "rdf:RDF"   => "rdf",
                                                "rdf:Seq"   => "Sequence"
                                            )
                    );
    
    //  be careful to always use the ampersand in front of the new operator 
    $unserializer = &new XML_Unserializer($options);

    $status = $unserializer->unserialize("http://pear.php.net/feeds/latest.rss",true);    

    if (PEAR::isError($status)) {
        echo    "Error: " . $status->getMessage();
    } else {
        $rss = $unserializer->getUnserializedData();

        echo "Root Tagname: ".$unserializer->getRootName()."<br>";
        
        echo "Title of the channel: ".$rss->channel->getTitle()."<br>";

        $items = $rss->getItems(3);
        
        foreach ($items as $item) {
            echo    "Title : ".$item->getTitle()."<br>";
        }
    }
?>