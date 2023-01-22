<?php  
 include('connection.php');  
//  $connect = mysqli_connect("localhost", "root", "", "sams");  
 
 $sql = "SELECT * FROM att  WHERE DATE(record_time) = CURDATE() ORDER BY At_id DESC ";  
 
 $result = mysqli_query($con, $sql);  
 ?>  

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>sams</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align=""> Student those who scan</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>id</th>  
                               <th>Student_id</th>  
                               <th>out_or_in</th>
                               <th>Date</th>
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["At_id"];?></td>  
                               <td><?php echo $row["id"];?></td>
                               <td><?php echo $row["out_or_in"];?>
                               <td><?php echo $row["record_date"]; ?></td>  
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html> 