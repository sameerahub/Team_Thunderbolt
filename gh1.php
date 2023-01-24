<?php session_start(); ?>
<html>
    <head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  

    </head>
    <body>
          
            <div class="container">
            <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="#">websitename</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" date-toggle-"dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a></li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="gh1.php">Page 2</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                </ul>
            </div>
            </nav>

       	        <div class="raw">
       	        	<div class="col-md-6">
       	        		<video id-"preview" width="100%"></video>
                    <?php
                            if(isset($_SESSION['error'])){
                              echo"
                                   <div class='alert alert-danger'>
                                   <h4>Error!</h4>
                                   ".$_SESSION['error']."
                                   </div>
                              ";   

                            }

                            if(isset($_SESSION['success'])){
                              echo"
                                   <div class='alert alert-success' style='background:blue;color:white;'>
                                   <h4>success!</h4>
                                   ".$_SESSION['success']."
                                   </div>
                              ";  
                          }  
                             
                    ?>

                  </div>  
       	        		
       	  	        <div class="col-md-6">
       	  	        
                         <label>SCAN QR CODE</label>
       	  	    	      <input type="text" name="text" id="text" readonly="" placeholder="scan qrcode" class="form-control">
                         <video id="preview" width="100%"></video>
                         <form action="insert.php" method="post" class="form-horizontal">
                 <hr></hr>
       	  	        </form>
       	  	          <table class="table table-borderd">
       	  	          	<thead>
       	  	          		 <tr>
       	  	          			  <td>id</td>
       	  	          			  <td>sindex</td>
       	  	          			  <td>time in</td>
                               <td>time out</td>
                               <td>Date</td>
       	  	          		</tr>
       	  	          	</thead>
       	  	          	<tbody>
       	  	          		<?php
                            $server= "localhost";
                            $username= "root";
                            $password= "";
                            $dbname= "sameera";

                            
                            $conn = new mysqli($server,$username, $password, $dbname);
                            $con = mysql_connect("localhost","root","","sameera");

                            if(isset($_GET['scan']))
                            {
                              $filtervalue = $_GET['scan'];
                              $query = "SELECT * FROM student WHERE CONCAT(timeout) LIKE '%$filtervalue%' ";
                              $query_run = mysql_query($con, $query);

                              if(mysqli_num_rows($query_run) > 0)
                              {
                                  foreach ($query_run as $items)
                                  {}

                                     ?>
                                     <tr>
                                           <td><?=  ?>$item['timeout'];  ?></td>
                                      </tr> 
                                     <?php
                                  }   
                              }
                              else
                              {
                                  ?>
                                  
                                      <tr>
                                           <td colspan="4">NO Record Found</td>
                                      </tr>

                                  <?php
                              }  
                            }

                            {
                              $this->foo = $foo;
                            }

                            if($conn ->connect_error){
                            	die("Connection failed" .$conn ->connect_error);
                            }
                               $sql ="SELECT id,sindex,time_in,time_out,LOGDATE FROM student";
                               $query = $conn ->query($sql);
                               while($row = $query ->fetch_assoc()){

                            ?>
                               <tr>
                                 <td><?php echo $row['id'];?></td>
                                 <td><?php echo $row['sindex'];?></td>
                                 <td><?php echo $row['time_in'];?></td>
                                 <td><?php echo $row['time_out'];?></td>
                                 <td><?php echo $row['LOGDATE'];?></td>
                                 
                              </tr>
                            <?php
                            }
                            ?>
       	  	          	</tbody>
       	  	        </div>
       	        
       	        </div>    
       	    </div>
            
            <Script>
            	let scanner = now Instascan,scanner({ video: document.getlement8yId('priview')});
            	Instascan,Camera.getcameras().then(function(cameras){
            		if(cameras.length > 0 ){
            			scanner.start(cameras[0]);
            		}else{
            		    alert('No cameras found');
            		}
            		    
            	}).catch(function(e) {
            		console.error(e);
                });
                
                scanner.addListener('scan',function(c){
                    document.getlement8yId('text').value=c;
                    document.forms[0].submit();
                }); 
             </Script>

    </body>
</html>