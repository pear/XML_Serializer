<?PHP
    error_reporting(E_ALL);
    require_once '../Unserializer.php';

   /**
    * class that is used for a channel in the RSS file
    *
    * you could implement whatever you like in this class,
    * properties will be set from the XML document
    */
    class channel
    {
        var $items = array();

        function getTitle()
        {
            return  $this->title;
        }

        function getItems($amount)
        {
            return array_splice($this->item,0,$amount);
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
                     "complexType" => "object"
                    );
    
    //  be careful to always use the ampersand in front of the new operator 
    $unserializer = &new XML_Unserializer($options);

    $status = $unserializer->unserialize("http://pear.php.net/rss.php",true);    

    if (PEAR::isError($status)) {
        echo    "Error: " . $status->getMessage();
    } else {
        $rss = $unserializer->getUnserializedData();

        echo "Root Tagname: ".$unserializer->getRootName()."<br>";
        
        echo "Title of the channel: ".$rss->channel->getTitle()."<br>";

        $items = $rss->channel->getItems(3);
        
        echo	"<pre>";
        print_r( $items );
        echo	"</pre>";
        foreach ($items as $item) {
            echo    "Title : ".$item->getTitle()."<br>";
        }
    }
?>