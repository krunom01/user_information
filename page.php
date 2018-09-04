<?php
 require('oop.php');
?>
<p>Admin login</p>
<form method="post" action="autorizacija.php" style=" margin: 0 auto;">
  <label>Ime 
    <input type="text" name="user" id="user" placeholder="admin"> </br>
  </label>
  <label>Lozinka
    <input type="text" name="password" placeholder="a"> </br>
  </label>
  </br>

  <?php
  if(isset($_GET["greska"])){
    switch($_GET["greska"]){
      case "1": 
      echo "<p class=logingreska>*upiši ime i lozinku</p>";
      break;
      case "2": 
      echo "<p class=logingreska>*upiši ime</p>";
      break;
      case "3": 
      echo "<p class=logingreska>*upiši lozinku</p>";
      break;
      case "4": 
      echo "<p class=logingreska>*upiši ispravno ime i lozinku</p>";
      break;
    } 

  }
 
  ?>

<p><input type="submit" name="login" value="Log in"></input></p>
<?php $noviIp = new userIP; ?>

<?php 
$servername = "localhost";
$username = "edunova";
$password = "edunova";
$dbname = "user";
$valueIP = $noviIp->get_ip();
$valueTime = $noviIp->get_time();

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO user (ip, time_)
VALUES ('$valueIP','$valueTime')";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
