<?php


function PersonSearch($ID) {
  if($ID == '') {
    return '';
  }

  $dblink1 =  mysqli_connect("localhost" , "root" ,"", "pdb");
  $query1 = "SELECT * FROM `ptable` WHERE `National ID`=$ID";
  $result1 = mysqli_query($dblink1 , $query1) or die (mysqli_error($dblink1));
  $Row1 = mysqli_fetch_array($result1);
  $x = mysqli_affected_rows($dblink1);
  mysqli_close($dblink1);

  if($x){
      $userInfo =  "<tr>
                      <td>National ID : ".$Row1[0]."</td>
                      <td>First Name : ".$Row1[1]."</td>
                      <td>Last Name : ".$Row1[2]."</td>
                    </tr>
                    <tr>
                      <td>Age : ".$Row1[3]."</td>
                      <td>Address : ".$Row1[4]."</td>
                      <td>Mobile : ".$Row1[5]."</td>
                    </tr>";

                  return $userInfo;
  }

  return "This National ID Does Not Exist ptable";
  
}

echo PersonSearch($_REQUEST['ID']);


?>