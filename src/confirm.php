<?php
$link = db_connect();
if(isset($_GET['c'])){
$code = $_GET['c'];
$sql = "SELECT id FROM users where reg_code = '".$code."'";
$query = mysqli_query($link, $sql);
if(mysqli_num_rows($query) == 0){
  echo "Neplatný overovací kód!";
}
else{
  $sql = "UPDATE users SET reg_valid = 1 where reg_code = '".$code."'";
  $query = mysqli_query($link,$sql);
  if($query){
    echo "Užívateľ úspešne overený! Budete presmerovaný na hlavnú stránku.";
    header(index.php, 3);
  }
}
}
?>