<?php

// $con = mysqli_connect("bravoit.philander-totalis.my.id","u624506210_bravo","Bravoit@123","u624506210_bravoit");
$con = mysqli_connect("bravoit.philander-totalis.my.id","u624506210_bravo","Bravoit@123","u624506210_bravoit");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} else {
  echo "sukses";
}
?>