<?php
include "./session.php";
include "./database.php";
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./Css/Home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <style>
            .cent2{width: 960px;margin: 0 auto;}
            #header{align-items:"center";width:100%;padding:5px;background:rgba(230,230,230,0.9);font-size:30px;}
            #header h1{color:#00394a;font-size: 80px;}
            #logo{width:100px; height:100px;transition: all 500ms linear}
            #user{width:50px;height:50px;}
            #nav{width:100%;background:#232c33;align-items:"center"; position:relative;}
            #nav a{color:#fff; padding:15px 20px;display:inline-block; text-decoration:none; text-transform:uppercase;}
            #nav a:hover{background:black;}
            #toggle-btn{position:absolute;border:round;padding-left: 10px;padding-top:10px;}
            #toggle-btn span{display: block;width: 30px;height: 5px;background:rgba(230,230,230,0.9);margin: 5px 0px;}
            #sidebar{position:fixed;width:300px;height:100%;background:#232c33;left:-300px;transition: all 500ms linear;z-index: 5;}
            #sidebar.active{left:0px;}
            #sidebar ul li{width:200px;color:rgba(230,230,230,0.9);background:#232c33;list-style:none;display: block;padding: 15px 10px;border-bottom: 1px solid rgba(100,100,100,0.3);transition: width 1s;}
            #sidebar a{text-decoration: none;}
            #sidebar ul li:hover{width:400px;}
            #container{background-image: url('./Imgs/CoverPic.gif');width: 100%; height:100%;}
            #centerButton{width: 150px; height: 70px; position:absolute; top:50%; left:50%; margin: 0px 0 0 -75px;}
        </style>
    </head>
    <body>
        <!-- Pagina COmpleta -->
        <div class="container-xxl">

            <!-- Parte di header -->
            <div id="header">
                <div>
                    <table class="cent2">
                        <tr>
                            <td><img id="logo" src="./Imgs/volante.png"/></td>
                            <td><h1 id="scritta">{CarPool}</h1></td>
                            <td><a href="#" ><img class="" id="user" src="./Imgs/profile.png"/></a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- Menu di navigazione -->
            <div id="nav">
                <!-- Bottone per attivare la sidebar, sta dentro al menu di navigazione -->
                <div id="ToggleBtn">
                    <div id="toggle-btn" onclick="toggleSidebar()">
                        <span></span>
                        <span></span>
               	        <span></span>
                    </div>
                </div>

                <div class="cent2" id="navbar">
                    <a href="#" class="action">Home</a>
                </div>

            </div>

            <div id="sidebar">
                <ul>
                    <a href="#" class="action"><li class="action">Home</li></a>
                </ul>
            </div>

            <div id="container">

                    <a href="index.php"><button id="centerButton" type="button" class="btn btn-dark">ENJOY</button></a>
                    <!-- img id="back" src="./Imgs/CoverPic.gif"-->
            
            </div>
        </div>

   
 

    
    <script>
        var profile=document.getElementById("user");
        var scritta=document.getElementById("scritta");
        var logo=document.getElementById("logo");


        profile.addEventListener("mouseover", function(){
            profile.style.width="55px";
            profile.style.height="55px";
        });

        profile.addEventListener("mouseout", function(){
            profile.style.width="50px";
            profile.style.height="50px";
        });
        scritta.addEventListener("mouseover", function(){
            scritta.style.color="black";
        });

        scritta.addEventListener("mouseout", function(){
            scritta.style.color="#00394a";
        });
        logo.addEventListener("mouseover", function(){
            logo.style.transform="rotate(360deg)";
        });

        logo.addEventListener("mouseout", function(){
            logo.style.transform="rotate(0deg)";
        });
        

        function toggleSidebar(){
            document.getElementById("sidebar").classList.toggle('active');
        }
    </script>
    </body>
</html>