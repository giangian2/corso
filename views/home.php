<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		<?php 
			echo (require_once("../css/style.css"));
		?>
	</style>

	
  </head>
  <body>	
	<div class="wrapper d-flex align-items-stretch">
		<?php
			require_once "../components/sidebar.php";
		?>
        <!-- Page Content  -->
      	<div id="content" class="p-4 p-md-5 pt-5">
			<div id="welcome">
				<?php 
	
					$obj=json_decode($_SESSION['user']);
					$hours=date("H"); 
					if($hours>=3 && $hours<14)
						echo "Buongiorno  ".$obj->u_name;
					elseif($hours>=14)
						echo "Buon pomeriggio  ".$obj->u_name;
					else
						echo "Buona sera  ".$obj->u_name;
				?>
			</div>
        	<h2 class="mb-4">Orders #05</h2>
        	<canvas id="myChart" style="width:100%"></canvas>
      	</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<script>
		<?php 
			echo (require_once("../js/popper.js"));
		?>
	</script>
	<script>
		<?php 
			echo (require_once("../js/bootstrap.min.js"));
		?>
	</script>
	<script>
		<?php 
			echo (require_once("../js/jquery.min.js"));
		?>
	</script>
	<script>
		<?php 
			echo (require_once("../js/main.js"));
		?>
	</script>
	<script type="text/javaScript">
		var xValues = [50,60,70,80,90,100,110,120,130,140,150];
		var yValues = [7,8,8,9,9,9,10,11,14,14,15];

		new Chart("myChart", {
  			type: "line",
  			data: {
    			labels: xValues,
    			datasets: [{
      				backgroundColor: "rgba(52,69,180,0.2)",
      				borderColor: "rgba(0,0,0,0.1)",
      				data: yValues
    			}]
 		 	},
		});
	</script>
  </body>
</html>