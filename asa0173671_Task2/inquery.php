





<html>

<header>

    <meta charset="UTF-8">
    <title>Grade System</title>
    <link rel="stylesheet" type="text/css" href="inquery.css">

    <script type="text/javascript">


        var http1 = new XMLHttpRequest();
        var http2 = new XMLHttpRequest();

        function getInformation(user){

            PersonSearch (user);
            GradeSearch(user);

        }


        function PersonSearch (user) {
           
            http1.onreadystatechange=function() {
                if(http1.readyState == 4 && http1.status == 200) {
                    document.getElementById('informations1').innerHTML = http1.responseText;
                }
            } 
            http1.open("GET", "PersonSearch.php?ID=" + user, true);  
            http1.send(null);
        }

        function GradeSearch(user) {
           
            http2.onreadystatechange=function() {
                if(http2.readyState == 4 && http2.status == 200) {
                document.getElementById('informations2').innerHTML = http2.responseText;
                }
            }
            http2.open("GET", "GradeSearch.php?ID=" + user, true);
            http2.send(null);
        }
    </script>

</header>

<body>

        <div class="container">

            

                <p>Enter National ID to Get Information : </p>

                <input type="text" name="ID" placeholder="National ID" onkeyup="getInformation(this.value)">
                
            

        </div>

        <table id="informations1"></table>
        <table id="informations2"></table>
    

</body>

</html>