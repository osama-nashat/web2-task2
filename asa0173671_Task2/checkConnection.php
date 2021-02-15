<?php


if($_POST['dbuser'] == "person" && $_POST['dbpass'] == "12345" || $_POST['dbuser'] == "grade" && $_POST['dbpass'] == "00000"){

    header('Location:inquery.php');
}else{
    echo '<p class="error">The Username or Password is Wrong</p>';
    echo '<a href="login.php">Back to Login Page</a>';
}


?>



<html>

<header>

    <meta charset="UTF-8">
    <title>Grade System</title>
    <style>

        *{
            padding : 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            background-image:linear-gradient(to bottom right,#81ecec,#ff7979);
            color:#fff;
        }

        .error{
            text-align:center;
            font-size:25px;
            width:500px;
            margin:15px auto;
            padding:10px;
            font-weight:600;
        }

        a[href="login.php"]{
            text-decoration: none;
            color: #fff;
            width: 250px;
            margin: 10px auto;
            display: block;
            font-size: 25px;
            border: 2px solid #fff;
            text-align: center;
            padding: 10px;
            border-radius: 26px
        }
    
    </style>

</header>

<body>

   
    

</body>

</html>