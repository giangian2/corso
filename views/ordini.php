<?php
function render_riga_ordine(string $codice_riga,string $codice,string $codice_int,string $descrizione,string $quatita){
    return(
        "<tr><th scope='row'>".$codice_riga."</th><td>".$codice."</td><td>".$codice_int."</td><td>".$descrizione."</td><td>".$quatita."</td><td><button class='btn btn-danger' id ='deleteRow' onclick='deleteRiga(".'"'.$codice_riga.'"'.")'><i class='fa fa-trash'></i></button></td></tr>"
    );
}
?>

<html>
<head>
    <style>
    
        <?php 
			echo (require_once("../css/style.css"));
		?>
    </style>
	
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="wrapper d-flex align-items-stretch" height="100%">
    <?php
		require_once "../components/sidebar.php";
	?>
    <!--  For demo purpose -->
    
    <div id="content" class="p-4 p-md-5 pt-5">
    <?php
        if(!isset($righe)){
            echo "<div class='alert alert-danger' role='alert'>Il fornitore selezionato non ha al momento ordini attivi</div>";
            require_once("../components/create_order.php");
            echo "<button type='button' class='btn btn-success' onclick='CreateOrder()'>Crea Ordine</button>";
        }else{
            echo "<h1 id='order_code'>".$ordini->getCodice()."</h1>";
            require_once("../components/tabella_righe.php");
        }
    ?>
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
        function CreateOrder(){
            var new_order_code=document.getElementById("new_order_code");
            var dateObj = new Date();
            var mese_pub = dateObj.getUTCMonth() + 1; //months from 1-12
            var giorno_pub = dateObj.getUTCDate();
            var anno_pub = dateObj.getUTCFullYear();
            var cod_fornitore="";

            var url=window.location.href;
            const tmp_array=url.split("/");
            var length=tmp_array.length;
            cod_fornitore=tmp_array[length-1];
            
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/corso/ordini/create/', true);
        
            //Send the proper header information along with the request
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
            xhr.onreadystatechange = function () { // Call a function when the state changes.
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    alert(this.responseText);
                }
            }
            xhr.send("codice="+cod_fornitore+"&giorno_pub="+giorno_pub+"&mese_pub="+mese_pub+"&anno_pub="+anno_pub+"&cod_fornitore="+cod_fornitore+"");
            location.reload();
        }
    </script>
    <script>
        var codice_ordine=document.getElementById("new_order_code");
        var flag=document.getElementById("basic-addon1");

        codice_ordine.addEventListener("input",function(e){
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/corso/ordini/check-cod/', true);
        
                 //Send the proper header information along with the request
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
            xhr.onreadystatechange = function () { // Call a function when the state changes.
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    if(this.responseText==0){
                        flag.style.color="green";
                        flag.innerHTML="Valid";
                    }else{
                        flag.style.color="red";
                        flag.innerHTML="Invalid (already used)";
                    }
                }
            }
            xhr.send("codice_ordine="+e.target.value);
        });

        function addRiga(){
            let cod_prodotto=document.getElementById("new_cod_prodotto").value;
            let cod_prodotto_int=document.getElementById("new_cod_prodotto_int").value;
            let descrizione=document.getElementById("new_descrizione").value;
            let quantita=document.getElementById("new_quantita").value;
            let codice_ordine=document.getElementById("order_code").innerHTML;

            alert(cod_prodotto);

            if(cod_prodotto=="" || cod_prodotto_int=="" || descrizione=="" || quantita==""){
                alert("Compilare tutti i campi per poter inserire una nuova riga!");
            }else{
                let parsed_quantita=parseInt(quantita);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '/corso/ordini/riga/add/', true);
        
                 //Send the proper header information along with the request
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
                xhr.onreadystatechange = function () { // Call a function when the state changes.
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        alert("Aggiunto!");
                    }
                }
                xhr.send("cod_prodotto="+cod_prodotto+"&cod_prodotto_int="+cod_prodotto_int+"&descrizione="+descrizione+"&quantita="+parsed_quantita+"&codice_ordine="+codice_ordine);
                location.reload();
            } 
        }

    

        function deleteRiga(codice) {
            if(confirm("Sicuro di voler eliminare la riga selezionata?")==true){
                var xhr = new XMLHttpRequest();
                xhr.open("GET", '/corso/ordini/riga/delete/'+codice+'', true);
        
                //Send the proper header information along with the request
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
                xhr.onreadystatechange = function () { // Call a function when the state changes.
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        alert("Eliminato!");
                    }
                }
                xhr.send();
                location.reload();
            }
        }
    </script>
    <script type="text/javascript">
        $(function () {

            // Start counting from the third row
            var counter = 3;
            var add_row_clicked=false; 

            $("#insertRow").on("click", function (event) {
                event.preventDefault();
                
                if(!add_row_clicked){
                    var newRow = $("<tr>");
                    var cols = '';

                     // Table columns
                    cols += '<th scrope="row">' + counter + '</th>';
                    cols += '<td><input class="form-control rounded-0" type="text" placeholder="codice prodotto" id="new_cod_prodotto"></td>';
                    cols += '<td><input class="form-control rounded-0" type="text" placeholder="codice prodotto interno" id="new_cod_prodotto_int"></td>';
                    cols += '<td><input class="form-control rounded-0" type="text" placeholder="descrizione" id="new_descrizione"></td>';
                    cols += '<td><input class="form-control rounded-0" type="text" placeholder="quantita" id="new_quantita"></td>';
                    cols += '<td><button class="btn btn-success" onclick="addRiga()"><i class="fa fa-check-circle-o"></i></button</td>';

                    // Insert the columns inside a row
                    newRow.append(cols);

                    // Insert the row inside a table
                    $("table").append(newRow);

                    // Increase counter after each row insertion
                    counter++;
                    add_row_clicked=true;
                }else{
                    alert("Compila le caselle vuote con i rispettivi dati per creare una nuova riga!");
                }
            });
        });
    </script>
</body>
</html>