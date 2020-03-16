<html>
  <head>
       <?php 
global $current_user;
global $db;
	
	$Last30Days = array(
		'Total Invoices' => 0,
		'Total Sales Amount' => 0.00,
		'Total Collected Amount' => 0.00,
		'Total Uncollected Amount' => 0.00,
	);
	$sql_i = "SELECT count(*) total_invoices,FORMAT(SUM(IFNULL(total_amount,0)),2) total_sale_amount 
				FROM aos_invoices WHERE deleted=0 AND  invoice_date >= DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND invoice_date <= CURDATE() HAVING count(*) > 0";
	$result_i = $db->query($sql_i);
	// $row_i = $db->fetchByAssoc($result_i);
	if($result_i->num_rows > 0){
		$row_i = $db->fetchByAssoc($result_i);
		$Last30Days['Total Invoices'] = $row_i['total_invoices'];
		$Last30Days['Total Sales Amount'] = $row_i['total_sale_amount'];
	}
	$sql_p = "SELECT SUM(amount_received) Collected, SUM(amount-amount_received) Uncollected  
				FROM kms_invoice_payments WHERE deleted=0 AND  date_recieved >= DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND date_recieved<=CURDATE()
				HAVING count(*) > 0";
	$result_p = $db->query($sql_p);

	if($result_p->num_rows > 0){
		$row_p = $db->fetchByAssoc($result_p);
		$Last30Days['Total Collected Amount'] = $row_p['Collected'];
		$Last30Days['Total Uncollected Amount'] = $row_p['Uncollected'];
	}

	
  $TotalInvoices=$Last30Days['Total Invoices'];
  $TotalSalesAmount=$Last30Days['Total Sales Amount'];
  $TotalCollectedAmount=$Last30Days['Total Collected Amount'];
  $TotalUncollectedAmount=$Last30Days['Total Uncollected Amount'];

?>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', '$');
        data.addRows([
          // ['Total Invoices', <?php echo $TotalInvoices ?>],
          ['Total Sales Amount', <?php echo $TotalSalesAmount ?>],
          ['Total Collected Amount', <?php echo $TotalCollectedAmount ?>],
          ['Total Uncollected Amount', <?php echo $TotalUncollectedAmount ?>],
            
        ]);
        
        var title = 'Last 30 Days Outcome: Total Invoices : '+<?php echo $TotalInvoices ?>;
        var barchart_options = {title:title,
                       width:520,
                       height:270,
					   colors: [getColor()],
                       legend: 'none'};
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data, barchart_options);
      }
	  function getColor(){
		  var colours = ['#40a832','#a86b32','#32a8a8','#326ba8','#f0f035','#e0440e','#db23de', '#1D7603', '#334CFF','#00ff00'];
		  return colours[Math.floor(Math.random() * 10)];
	  }
   </script>
<body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <td><div id="barchart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>