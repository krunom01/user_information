<a href="logout.php" >logout</a>
</br>
 <?php
require('oop.php');
$conn = new PDO("mysql:host=localhost;dbname=user","edunova","edunova");
$sql =$conn->prepare("SELECT * FROM user");
$sql->execute();
$sql=$sql->fetchall(PDO::FETCH_OBJ);

$brojDolazaka=$conn->prepare("SELECT DISTINCT(ip) as ip, count(ip) AS count 
FROM user
GROUP BY ip 
HAVING count > 1");
$brojDolazaka->execute();
$brojDolazaka=$brojDolazaka->fetchall(PDO::FETCH_OBJ);

?>
Popis svih IP adresa s ukupnim brojem dolazaka
</br></br>
<table style="width:40%">
  <tr>
    <th>IP adress</th>
    <th>broj dolazaka</th>  
  </tr>
  <?php foreach($brojDolazaka as $dolasci): ?>
  <tr>
    <td><?php echo $dolasci->ip; ?></td>
    <td><?php echo $dolasci->count;?></td> 
  </tr>
<?php endforeach;?>
</table>
</br></br>
Popis svih IP adresa i vrijeme dolaska
</br></br>
<table style="width:40%">
  <tr>
    <th>IP adress</th>
    <th>vrijeme dolaska</th>  
  </tr>
  <?php foreach($sql as $tablica): ?>
  <tr>
    <td><?php echo $tablica->ip; ?></td>
    <!--lokalno se vrijeme pokazuje dobro, a na byethost je -6 -->
    <td><?php echo date('H:i:s', $tablica->time_);?></td> 
  </tr>
<?php endforeach;?>
</table>