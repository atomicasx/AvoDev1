<?php

    global $db;
    global $sugar_config;

    //print_r($_POST);

    $selectInvoices = $_REQUEST['selectInvoice'];

    $routeId = $_REQUEST['routeId'];

    $numInvoices = count($selectInvoices);

    if($numInvoices > 0) {
        foreach($selectInvoices as $selectInvoice ) {
            //echo $selectInvoice;exit;

            $Routes = new fyn_routes();
            $Routes->retrieve($routeId);

            $rel_name = 'fyn_routes_aos_invoices_1';
            $Routes->load_relationship($rel_name);

            //$orouteId = BeanFactory::getBean('Routes', $routeId);
            //$orouteId->load_relationship('Invoices');
            $Routes->fyn_routes_aos_invoices_1->add($selectInvoice);

            /*$fyn_routes_aos_invoices = BeanFactory::getBean('fyn_routes_aos_invoices_1');
            $fyn_routes_aos_invoices->fyn_routes_aos_invoices_1fyn_routes_ida = $routeId;
            $fyn_routes_aos_invoices->fyn_routes_aos_invoices_1aos_invoices_idb = $selectInvoice;
            $fyn_routes_aos_invoices->save();
            */
            $updateInvoice = "update aos_invoices_cstm set approval_status_c = 'OnVehicle' where id_c = '".$selectInvoice."'";
            $db->query($updateInvoice);
        }
    }

    //$sugar_config['site_url']
    ?>
    <script>
                window.opener.location.reload(true);
                window.close();
    </script>