<?php

class PrintLabelButtons {
	public function add()
	{
		//print_r($GLOBALS['app']->controller->action);
	 	//echo "I am Here...";exit;
		// Based on what action we're in, add some buttons!
		switch ($GLOBALS['app']->controller->action)
		{
			case "DetailView": // Add buttons to Detail View
			$record=$_GET["record"];
			$button_code = $this->getNewActionMenuItem($record);
			echo $button_code;
			break;
		 
		}

	}

	private function getNewActionMenuItem($record){
       
        global $app_strings;

        return <<<EOHTML
<a class="menuItem" style="width: 150px;" href="#" 
        onclick="window.open('index.php?module=fyn_QR_CODE_BOXES&action=index&parent=fyn_Stock_In&parentid=$record', '', 'width=800,height=600');">Print QR Code Label</a>
EOHTML;

    }
}
?>