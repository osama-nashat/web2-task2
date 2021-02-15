<?php


function GradeSearch($ID) {
  if($ID == '') {
    return '';
  }

  $dblink2 =  mysqli_connect("localhost" , "root" ,"", "gdb");
  $query2 = "SELECT * FROM `gtable` WHERE `National ID`=$ID";
  $result2 = mysqli_query($dblink2 , $query2);
  
  $y = mysqli_affected_rows($dblink2);

  
  $userInfo='<tr><th colspan="2">Grades</th></tr>';

  if($y){

    while($Row2 = mysqli_fetch_array($result2)){

      $userInfo = $userInfo . "<tr><td>".$Row2[1]."</td><td>".$Row2[2]."</td></tr>";
    }




    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
          $ip = $_SERVER['REMOTE_ADDR'];
    }

    $userInfo = $userInfo . '<tr><td colspan="2">The user requested the service from IP adress : '.$ip.'</td></tr>';
     

    mysqli_close($dblink2);
    return $userInfo;
  }

  mysqli_close($dblink2);
  return "This National ID Does Not Exist in gtable";
  
}

echo GradeSearch($_REQUEST['ID']);


?>