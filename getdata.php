<?php
$con = mysqli_connect("localhost","root","","u938795262_0jrio");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$data=[];
// Perform query
if(!isset($_POST['q']))
{
    if ($result = mysqli_query($con, "SELECT * FROM wp_tamil_words")) {
     while($row=mysqli_fetch_array($result))
     {
         array_push($data,$row['list']);
     }
     
    }
}
else
{
    $term=$_POST['q'];
    
    if ($result = mysqli_query($con,  "SELECT * FROM wp_tamil_words where list like '".$term."%' order by list asc")) {
     while($row=mysqli_fetch_array($result))
     {
         array_push($data,$row['list']);
     }
     
    }
}
mysqli_close($con);
echo json_encode($data);
?>
