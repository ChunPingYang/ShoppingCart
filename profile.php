<?php 
                                session_start();
                                    $con=mysqli_connect("localhost","root","","amz");
                                    //$_SESSION['userid']='1000';   //predefine for test;
                                    $userid = $_SESSION['userid'];
                                    
                                    $sql = "SELECT * from users where userid='$userid'";
                                    $result = mysqli_query($con,$sql);
                                    while ($row=$result->fetch_assoc()){
                                        $username = $row['username'];
                                        $email = $row['email'];
                                        $phone =$row['mobile'];
                                        $address=$row['address'];
                                        $state = $row['state'];
                                        $city = $row['city'];
                                        $zip = $row['zip'];
                                    }
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Big store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template| Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
   <script src="js/bootstrap.js"></script>
<!-- //js -->
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<!-- for small icons-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<style>
	
        .profile{
			font-size: 10px;
           padding: 0px 10px;
           border: 1px solid black;
           width: 82%;
            height: 100%;
           float: right;
		}
		.title{		
         padding: 22px 15px 15px 15px;
          margin-bottom: 0;
		}
        .desc{
		    clear:left;
			float:left;
			margin:10px 0px 0px 13px;
		}
		.info{
			
			float:right;
			margin:10px 10px  10px 10px;
			border: 1px solid #ddd !important;
    color: #333 !important;
		}
		.detail{
			border: 1px solid #ddd;

    margin-bottom: 15px;
   
         color:black;
		}
		.normal
		{
			
			float:right;
			margin:10px 10px  10px 10px;
			border: 1px solid #ddd !important;
    color: #333 !important;
    border-radius: 0 !important;
    background-color: transparent !important;
		}
		.change
		{
			vertical-align: baseline!important;
    	display: inline-block!important;
    	padding: 0 10px!important;
    	margin:40px 40px 20px 50px;
    	
    	top: 0!important;
		}
       .cancel{
		vertical-align: baseline!important;
    display: inline-block!important;
    width: auto!important;
    font-size: 13px!important;
    
	margin:40px 40px 20px 50px;
	float:right;
}
</style>

</head>
<body>

	<!-- Loading the header -->
	<header class="header">
	</header>
	<script>
		$(function () {
			$(".header").load("header.html");
		});
	</script>
	<!-- End of header -->

	


	<div class="container">
		<div class="row">
				<!-- left nav bar -->
		<div class="col-sm-3">
		</div>
		<script>
			$(function () {
				$(".col-sm-3").load("nav.html");
			});
		</script>
		<!-- end of nav bar -->

		    
		    <div class="col-sm-6" style="border:1 px solid black">
				<!--use icon-->
					
					<h4><i class="glyphicon glyphicon-user" style="margin-right:10px; size=20px;" ></i> Profile </h4>
				
				
					<div class="detail">
						<div class="row">
							<div class="col-sm-6">
                                <div class = "desc" ><label  for="username"  >Username:</label>
                                    <?php
                                    if ($username){
                                        echo "<p>$username</p>";
                                    }
                                    ?>
                                </div>
                                <div class= "desc" ><label for ="email"> Email</label>
                                    <?php
                                    echo "<p>$email</p>";
                                     ?>
                                </div>
                                <div class= "desc" ><label for ="phone">Phone number</label>
                                <?php
                                echo "<p>$phone</p>";
                                ?></div>
								
                                <div class= "desc" ><label  for ="address">Address:</label>
                                <?php
                                echo "<p>$address</p>";
                                ?></div>
								<div class="desc"><label  for ="state">State:</label>
                                <?php
                                echo "<p>$state</p>";
                                ?>
                                </div>
                                <div class="desc"><label  for ="city">City:</label>
                                <?php
                                echo "<p>$city</p>";
                                ?>
                                </div>
                                <div class="desc"><label  for ="zip">Zip:</label>
                                <?php
                                echo "<p>$zip</p>";
                                ?>
                                <div class ="col-sm-6">
                                    
                                <input type="button" onclick="window.location.href = 'edit_profile.html';" value="Edit"/>
                                </div>
                                </div>
							</div>
							
								
						</div>
						
								
					</div>
						</div>
						</div>
					
						
					</div>
				
				
	
			</div>
			




		</div>
		
	</div>

	
		
        
	




</body>
      