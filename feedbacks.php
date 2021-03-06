<?php
session_start();

include 'connectuser.php';
include 'notification.php';
include 'nav_bar.php';

$tags=array("Mess","Transport","Academics","Sports","Medical","Hostel","Others");
$category=array('reply','question','feedback');
?>
<html>
	<head>
		<!-- required bootstrap framework -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	    <title>Feedbacks!!</title>
	    <link href="question_display.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <style>
			.sidenav li {
				font-family: tangerine;
				font-size: 20px;
			}

			html {
				margin-left: 0;
				margin-top: 70px;
			}

			.sidenav {
			  margin-right: 2px;
		      padding-top: 20px;
		      background-color: #f1f1f1;		 
		      height: 100%;
		    }

		    @media screen and (max-width: 641px) {
		    	.sidenav {
		    		position: relative;
		    		padding-top: 10px;
		    	}
		    }
	    </style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row content">
				<div class="col-md-3">
					<div class="col-md-3 affix sidenav">
						<h4 class="helpblock" style="font-size: 22px; font-family: tangerine;">Categories:</h4>
						<ul class="nav nav-pills nav-stacked">						
							    <li class="active"><a href="feedbacks.php">All feedback</a></li>
								<li><a href="feedback_option.php?tag_id=1">Mess</a></li>
								<li><a href="feedback_option.php?tag_id=2">Transport</a></li>
								<li><a href="feedback_option.php?tag_id=3">Medical</a></li>
								<li><a href="feedback_option.php?tag_id=4">Academics</a></li>
								<li><a href="feedback_option.php?tag_id=5">Sports</a></li>
								<li><a href="feedback_option.php?tag_id=6">Hostel</a></li>
								<li><a href="feedback_option.php?tag_id=7">Others</a></li>
								
						</ul>
					</div>
				</div>


				<div class="col-md-8" bgcolor="#eee" style="margin-left: 1">
				    <?php
				    store_score_question();
				    
				    for($i=1;$i<=6;$i++)
				    {
				    	$counter=$tags[$i-1];
				    	$query="SELECT * FROM feedback 
                         WHERE tags='$counter'
						 ORDER BY reg_time DESC
						 LIMIT 0,4
						 ";
				         $result=mysqli_query($conn,$query);
				    	$color_var = 1;
				    	?>
				    	<h1><?php echo "<a href='feedback_option.php?tag_id=". 
						    $i."'>".$tags[$i-1]."</a>";?></h1>
						    <?php
				    	while($row=mysqli_fetch_array($result))
					{
						$get_user_id = $row['user_id'];
						 if($color_var != 4) $color_var++;
								else $color_var = 1;
						?>	
						<div class="container-fluid">				
								   
					   		<div class="container-fluid">
					   			<div id="card-<?php echo $color_var ;?>">
						   			
								   	<h3 id="question_heading"><strong><?php
							       	$name=get_user2($row[1]);
								   	echo "<a href=user_profile.php?userId=".$get_user_id.">".$name."</a>";
								   	?></strong></h3>
									<p>
						   			<blockquote><?php echo $row[2];?></blockquote>
									</p>
							       	
    							</div>					
					   		</div>
                         </div>
                     
				    
					<?php
					
						$astring1 =  "like-".$row[0];	
						$astring2 = "dislike-".$row[0];					
						if($_SERVER["REQUEST_METHOD"] == "POST") {
							if(isset($_POST[$astring1])) {
								$feedback_id = $row[0];
								$my_id=$_SESSION['user_id'];
								$user_id=$row[1];
								$likess = $row[3];
								$likess++;
								$query3 = "UPDATE feedback SET upvotes='$likess' WHERE feedback_id = '$feedback_id' ";
								if(!mysqli_query($conn, $query3))
								{
									echo "failed to post";
								}
								else
								{
									send_notification_like($my_id,$user_id,$category[2],$feedback_id);
								}
							}
							if(isset($_POST[$astring2])) {
								$feedback_id = $row[0];
								$dislikess = $row[4];
								$dislikess++;
								$query3 = "UPDATE feedback SET downvotes='$dislikess' WHERE feedback_id = '$feedback_id' ";
								if(!mysqli_query($conn, $query3))
									echo "failed to post";
							}
							
						}
					}
				}
						?>
				</div> <!-- end col-md-7 -->
			</div> <!-- end row -->
		</div> <!-- end container --> 
	<!-- Modal Window -->
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>	