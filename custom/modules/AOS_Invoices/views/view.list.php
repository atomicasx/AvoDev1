<?php
    require_once('include/MVC/View/views/view.list.php');
    class AOS_InvoicesViewList extends ViewList {
        //public $type ='list';
        public function listViewProcess() {
            global $current_user;
            //echo "Sagar Munot";
            //$this->params['custom_where'] = ' AND module_name.name = "test" ';
            //print_r($_SESSION['zipCodes']);
			 
            if(empty($_REQUEST['orderBy'])) {
 
              $_REQUEST['orderBy'] = strtoupper('date_modified');
              $this->params['overrideOrder'] = true;
              $_REQUEST['sortOrder'] = 'DESC'; 
            } 
            parent::listViewProcess();
    }

    public function preDisplay()
    {
        parent::preDisplay();

        $this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItemForPrintOverdueInvoice();

        $this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItemForPrintInvoice();
    }
    function display()
    {
        //echo "I am Here...";
        //parent::display();
        //
        if (!$this->bean || !$this->bean->ACLAccess('list')) {
            ACLController::displayNoAccess();
        }else {
            if(empty($_REQUEST['orderBy'])) {
 
				$_REQUEST['orderBy'] = strtoupper('date_modified');
				$this->params['overrideOrder'] = true;
				$_REQUEST['sortOrder'] = 'DESC';
			}
            $this->listViewPrepare();
            $this->listViewProcess();
            

        }
          //$backtrace = debug_backtrace();
          //echo "";
          //var_dump($backtrace);exit;
        ?>
        <form id="popupForm" action="index.php?entryPoint=generatePdf_For_Route" method="post">
 				
                 <input type="hidden" name="task" value="pdf">
                 <input type="hidden" name="module" value="AOS_Invoices">
                 <input type="hidden" id = "uid" name="uid" value="">
                 <input type="hidden" name="invoiceIds" id = "invoiceIds" value="">
                 <input type="hidden" name="countInvoice" id="countInvoice" value="">
                 <input type="hidden" name="templateID" value="4242ece9-f4ea-0929-c821-5c04dd0cc760">
                 
    </form>
            <script>
                $(document).ready(function(){
                    $("#printInvoice").on("click", function(){
                        var boxes = $('input[type="checkbox"]:checked');
                        if(boxes.length > 0){
                            //alert(boxes.length);
                            var invoices = [];
                            $.each($('input[type="checkbox"]:checked'), function(){
                                invoices.push($(this).val());
                                console.log(invoices);
                            });
                            var commaInvoce = invoices.join(",");
                            $("#invoiceIds").val(commaInvoce);
                            $("#countInvoice").val(invoices.length);
                            //$('form').attr('action','popup.php?beanid='+routeId).attr('target', '_blank').appendTo('body').submit();
                            
                        } else {
                            alert("Please select Invoice to Print..");
                            return false;
                        }
                        $('#popupForm').submit();

                    });
                });
            </script>
        <?php

    }
    protected function buildMyMenuItemForPrintInvoice()
    {
        return <<<EOHTML
<a class="menuItem" id="printInvoice" style="width: 150px;" href="#" onmouseover='hiliteItem(this,"yes");'
        onmouseout='unhiliteItem(this);'>Print Invoices</a>
EOHTML;
    
    }
    /**
     * @return string HTML
     */
    protected function buildMyMenuItemForPrintOverdueInvoice()
    {
        global $app_strings;
    
        return <<<EOHTML
<a class="menuItem" style="width: 150px;" href="#" onmouseover='hiliteItem(this,"yes");' 
        onmouseout='unhiliteItem(this);' 
        onclick="sugarListView.get_checks();
        if(sugarListView.get_checks_count() &lt; 1) {
            alert('{$app_strings['LBL_LISTVIEW_NO_SELECTED']}');
            return false;
        }
        document.MassUpdate.action.value='PrintOverdueInvoice';
        document.MassUpdate.submit();">Print Overdue Invoices</a>
EOHTML;
    }

}
?>