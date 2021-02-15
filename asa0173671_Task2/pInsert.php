
<?php



$dblink = mysqli_connect("localhost","root","","pdb") or die ("could not connect to database");

    

if(isset($_POST['submit'])){

    $id = $_POST['ID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    $query = "INSERT INTO `ptable` (`National ID`, `First Name`, `Last Name`, `Age`, `Address`, `Mobile`) VALUES ('$id', '$firstname', '$lastname', '$age', '$address', '$mobile')";
    
    


    $valid_id = preg_match("/^[0-9]{3,11}$/",$id);
    $valid_firstname = preg_match("/^[[:alpha:]]+$/",$firstname);
    $valid_lastname = preg_match("/^[[:alpha:]]+$/",$lastname);
    $valid_age = preg_match("/^[0-9]{2,3}$/",$age);
    $valid_address = preg_match("/^[[:alpha:]]+([\/]?[[:alpha:]]+)*$/",$address);
    $valid_mobile = preg_match("/^(07)[789][0-9]{7}$/",$mobile);

    if($valid_id && $valid_firstname && $valid_lastname && $valid_age && $valid_address && $valid_mobile){

        $result = mysqli_query($dblink,$query) or die ("query failed : " . mysqli_error($dblink));
    }

    if(!$valid_id){
        echo '<span class="wrong-id">*id must consist of 3-11 numbers only</span>';
    }

    if(!$valid_firstname){
        echo '<span class="wrong-firstname">*first name must consist of one letter at least and no numbers</span>';
    }

    if(!$valid_lastname){
        echo '<span class="wrong-lastname">*last name must consist of one letter at least and no numbers</span>';
    }

    if(!$valid_age){
        echo '<span class="wrong-age">*age must consist of 2 or 3 numbers only</span>';
    }

    if(!$valid_address){
        echo '<span class="wrong-address">*address must follow aaaa/bbbb/ccc...</span>';
    }

    if(!$valid_mobile){
        echo '<span class="wrong-mobile">*mobile number must follow 07**********</span>';
    }


}

?>



<html>

<header>

    <meta charset="UTF-8">
    <title>Grade System</title>
    <link rel="stylesheet" type="text/css" href="pInsert.css">

</header>

<body>

        <div class="container">

            <form action="pInsert.php" method="post" class="pInsert">

                <h1>Personal Information</h1>

                <input type="text" name="ID" placeholder="National ID">

                <input type="text" name="firstname" placeholder="First Name">

                <input type="text" name="lastname" placeholder="Last Name">

                <input type="text" name="age" placeholder="Your Age">

                <input type="text" name="address" placeholder="Adress">

                <input type="text" name="mobile" placeholder="Mobile Number">
               
                 
                <input type="submit" name="submit" value="insert">

            </form>

        </div>
    

</body>

</html>
