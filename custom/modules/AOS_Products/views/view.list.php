<?php
    require_once('include/MVC/View/views/view.list.php');
    class AOS_ProductsViewList extends ViewList {
        //public $type ='list';
    public function display() {
        if (!$this->bean || !$this->bean->ACLAccess('list')) {
            ACLController::displayNoAccess();
        } else {
            
            if(empty($_REQUEST['orderBy'])) {
 
              $_REQUEST['orderBy'] = strtoupper('sort_order_c');            
              // $_REQUEST['orderBy'] = strtoupper('name');            
              $_REQUEST['sortOrder'] = 'ASC'; 
            } 
           $this->listViewPrepare();
            $this->listViewProcess();
        }
    }
}
?>