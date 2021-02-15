<?php



$dblink = mysqli_connect("localhost","root","","gdb") or die ("could not connect to database");


if(isset($_POST['submit'])){

    $id = $_POST['ID'];
    $coursename = $_POST['coursename'];
    $grade = $_POST['grade'];
   
    $query = "INSERT INTO `gtable` (`National ID`, `Course Name`, `Grade`) VALUES ('$id', '$coursename', '$grade')";
    
    


    $valid_id = preg_match("/^[0-9]{3,11}$/",$id);
    $valid_coursename = preg_match("/^[[:alpha:]]+([ ][[:alpha:]]*)*[0-9]{0,4}$/",$coursename);
    $valid_grade = preg_match("/^[[:alpha:]][+-]?$/i",$grade);
    

    if($valid_id && $valid_coursename && $valid_grade){

        $result = mysqli_query($dblink,$query) or die ("query failed : " . mysqli_error($dblink));
    }

    if(!$valid_id){
        echo '<span class="wrong-id">*id must consist of 3-11 numbers only</span>';
    }

    if(!$valid_coursename){
        echo '<span class="wrong-coursename">*course name must consist of two letters at least</span>';
    }

    if(!$valid_grade){
        echo '<span class="wrong-grade">*grade must follow A/A+/A-...</span>';
    }


}

?>







<html>

<header>

    <meta charset="UTF-8">
    <title>Grade System</title>
    <link rel="stylesheet" type="text/css" href="gInsert.css">

    <script type="text/javascript">


        var http = new XMLHttpRequest();


        function GradeSearch(user) {
            http.open("GET", "GradeSearch.php?ID=" + user, true);
            http.onreadystatechange=function() {
                if(http.readyState == 4) {
                document.getElementById('grades').innerHTML = http.responseText;
                }
            }
            http.send(null);
        }
    </script>

</header>



<body>

        <div class="container">

            <form action="gInsert.php" method="post" class="gInsert">

                <h1>Course Information</h1>

                <input type="text" name="ID" placeholder="National ID">

                <input type="text" name="coursename" placeholder="Course Name">

                <input type="text" name="grade" placeholder="Grade">
 
                <input type="submit" name="submit" value="insert">

            </form>

        </div>
    

</body>

</html>
