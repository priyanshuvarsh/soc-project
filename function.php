
<?php


?>
<?php
function isloggedin()//to check whether the user is logged in or not
{

  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))//to check whether the session's variable is set and also initialised.This will only happen after logging in.
  {
      return true;
  }
  else
  {
  	return false;
  }
}
function get_username()//this gets the username of the function
{
  include 'connectuser.php';

	if(isloggedin())
	{
    
	  $my_id=$_SESSION['user_id'];
      $query="SELECT * FROM user WHERE user_id='$my_id'";
        
       $result=mysqli_query($conn,$query);
	      $row=mysqli_fetch_array($result);
      return $row[3];	//this gets the username from the database
	}
   
}
function get_name()//this gets the name of the function
{

	if(isloggedin())
	{
    include 'connectuser.php';
	   $my_id=$_SESSION['user_id'];
       $query="SELECT * FROM user WHERE user_id='$my_id'";
       
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
      }
     
       return $name;	//return back the full name
	

}
function get_user2($user_id)
{
  if(isloggedin())
  {
     include 'connectuser.php';
     $query="SELECT * FROM user WHERE user_id='$user_id'";
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
       return $name;  
  }
    
   }
function get_reply($reply_id)
{
  include 'connectuser.php';
  
    $query="SELECT * FROM replies WHERE reply_id='$reply_id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $reply=$row[3];
    return $reply;
}
?>

<?php


?>
<?php
function isloggedin()//to check whether the user is logged in or not
{

  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))//to check whether the session's variable is set and also initialised.This will only happen after logging in.
  {
      return true;
  }
  else
  {
  	return false;
  }
}
function get_username()//this gets the username of the function
{
  include 'connectuser.php';

	if(isloggedin())
	{
    
	  $my_id=$_SESSION['user_id'];
      $query="SELECT * FROM user WHERE user_id='$my_id'";
        
       $result=mysqli_query($conn,$query);
	      $row=mysqli_fetch_array($result);
      return $row[3];	//this gets the username from the database
	}
   
}
function get_name()//this gets the name of the function
{

	if(isloggedin())
	{
    include 'connectuser.php';
	   $my_id=$_SESSION['user_id'];
       $query="SELECT * FROM user WHERE user_id='$my_id'";
       
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
      }
     
       return $name;	//return back the full name
	

}
function get_user2($user_id)
{
  if(isloggedin())
  {
     include 'connectuser.php';
     $query="SELECT * FROM user WHERE user_id='$user_id'";
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
       return $name;  
  }
    
   }
function get_reply($reply_id)
{
  include 'connectuser.php';
  
    $query="SELECT * FROM replies WHERE reply_id='$reply_id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $reply=$row[3];
    return $reply;
}
?>

<?php


?>
<?php
function isloggedin()//to check whether the user is logged in or not
{

  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))//to check whether the session's variable is set and also initialised.This will only happen after logging in.
  {
      return true;
  }
  else
  {
  	return false;
  }
}
function get_username()//this gets the username of the function
{
  include 'connectuser.php';

	if(isloggedin())
	{
    
	  $my_id=$_SESSION['user_id'];
      $query="SELECT * FROM user WHERE user_id='$my_id'";
        
       $result=mysqli_query($conn,$query);
	      $row=mysqli_fetch_array($result);
      return $row[3];	//this gets the username from the database
	}
   
}
function get_name()//this gets the name of the function
{

	if(isloggedin())
	{
    include 'connectuser.php';
	   $my_id=$_SESSION['user_id'];
       $query="SELECT * FROM user WHERE user_id='$my_id'";
       
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
      }
     
       return $name;	//return back the full name
	

}
function get_user2($user_id)
{
  if(isloggedin())
  {
     include 'connectuser.php';
     $query="SELECT * FROM user WHERE user_id='$user_id'";
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       $name=$row[1].' '.$row[2];//this gets the firstname and lastname respectively from the database
       return $name;  
  }
    
   }
function get_reply($reply_id)
{
  include 'connectuser.php';
  
    $query="SELECT * FROM replies WHERE reply_id='$reply_id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $reply=$row[3];
    return $reply;
}
?>
