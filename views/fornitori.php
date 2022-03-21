<?php
/*FUNZIONE PER CREARE LE VISTE DEI FORNITORI*/
function render_fornitore(string $codice, string $descrizione, string $note,$mail){
  return ("<div class='list-group'>
          <a class='list-group-item list-group-item-action'>
		  <button type='button' class='btn btn-light' onclick='deleteFornitore(".'"'."$codice".'"'.")'>
		  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  		  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
 		  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
		  </svg>
		  </button>
          <div class='d-flex w-100 justify-content-between'>
		  <h5 class='mb-1'>".$descrizione."</h5>
          <small>".$codice."</small>
          </div>
		  <p class='mb-1'>".$mail.".</p>
          <p class='mb-1'>".$note.".</p>
		  <button type='button' class='btn btn-secondary' onclick='viewOrdini(".'"'."$codice".'"'.")'>Visualizza Ordini</button>
          </a>
          </div><br>"); 
}
?>

<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	    <style>
		  <?php 
			  echo (require_once("../css/style.css"));
		  ?>
	    </style>
	    <style>
		    .list-group-item{
			    background-color:rgba(52,69,180,0.1);
		    }
			.btn-light{
				display: none;
			}
			.btn-secondary{
				background-color:rgba(52,69,180,0.9);
			}
			#dialog-form{
				visibility: hidden;
			}
	    </style> 
    </head>
    <body>
      <div class="wrapper d-flex align-items-stretch" height="100%">
		  	<?php
			  	require_once "../components/sidebar.php";
		  	?>
        <div id="content" class="p-4 p-md-5 pt-5">
			<h2>Fornitori</h2>
		    <?php
            	foreach ($fornitori as &$fornitore){
              		echo (render_fornitore($fornitore['codice'], $fornitore['descrizione'], $fornitore['note'], $fornitore['mail']));
           		}
          	?>
			<button type="button" class="btn btn-danger" onclick="mostraCheck()">Delete</button>
			<button type="button" class="btn btn-success" onclick="addFornitore()">Aggiungi</button>
        </div>
      </div>
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
		<script>
			<?php
			  echo (require_once("../js/fornitori.js"));
			?>
		</script>
  </body>
</html>


