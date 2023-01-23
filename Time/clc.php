
<?php
include('dbcon.php');

$query = "SELECT * FROM `student` WHERE 1";
#$query = "SELECT * FROM `student` WHERE index='result' ";
$prepared = $con->prepare($query);
$prepared->execute();
$result = $prepared->get_result();
?>
<table border="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>name</th>
    <th>age</th>
    <th>index</th>
    <th>batch</th>
 
  </tr>
<?php
if ($result->num_rows > 0) {
  $sn=1;
  while($data = $result->fetch_assoc()) {
 ?>
 <tr>
   <td><?php echo $data['name']; ?> </td>
   <td><?php echo $data['age']; ?> </td>
   <td><?php echo $data['index']; ?> </td>
   <td><?php echo $data['batch']; ?> </td>
 <tr>
 <?php
  $sn++;}
} else { 
  ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
 </table