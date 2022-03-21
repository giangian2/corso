<html>
<head>
    <style>
    #container{
        width: 960px;
        margin: 0 auto;
    }
    #razzo{
        width: 180px;
        height: 120px;
        position:absolute; top:500px; left:50%; margin: 0px 0 0 -90px;

    }
    </style>
</head>
<body>
    <div id="container">
        <img id="razzo" src="./Imgs/razzo.png">
        <button type="button" onclick="End()">Stop</button>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            


        });

        var myVar = setInterval(myTimer, 1000);
        var razzo=document.getElementById("razzo");

        function myTimer() {
            if(razzo.style.top<510){
                razzo.style.top+=1;
            }
        }

        function End() {
            clearInterval(myVar);
        }
    </script>
</body>
</html>