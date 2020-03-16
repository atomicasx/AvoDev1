<?php 

require_once('include/MVC/View/views/view.list.php');

class fyn_Stock_InViewList extends ViewList {
	
	function fyn_Stock_InViewList(){
		parent::ViewList();
	}
	/**
     * @see ViewList::preDisplay()
     */
	public function preDisplay(){
		
        parent::preDisplay();
		$this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItem();

    }
	protected function buildMyMenuItem(){
        global $app_strings;
    
        return <<<EOHTML
		<a class="menuItem" style="width: 150px;" href="#" onmouseover='hiliteItem(this,"yes");' 
        onmouseout='unhiliteItem(this);' 
        onclick="sugarListView.get_checks();
        if(sugarListView.get_checks_count() &lt; 1) {
            alert('{$app_strings['LBL_LISTVIEW_NO_SELECTED']}');
            return false;
        }
        document.MassUpdate.action.value='PrintQRBoxes';
        document.MassUpdate.submit();">Print QR Boxes</a>
EOHTML;
	}
}

?>