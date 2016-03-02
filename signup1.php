<?PHP
ob_start(); 
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}

if(isset($_POST['btn_signup']))
{
   
    signUp();
}
else if(isset($_POST['cancle']))
{
    cancel();
}

function signUp()
{
    require('dbconfig.php');
    if (isset($_POST['txt_name']) and isset($_POST['pwd_pass']))
    {
    
    if( !empty($_POST['txt_name']) && !empty($_POST['pwd_pass']) )
    {
 
// Assigning posted values to variables.

$username = addslashes($_POST['txt_name']);

$password = addslashes($_POST['pwd_pass']);

// Checking the values are existing in the database or not
   
    $password = md5($password);    
    
    $query = "SELECT * FROM `users` WHERE user_name='$username' and user_hash='$password'";

  
$result = $conn->query($query);

    
if ($result->num_rows > 0) {
    
    // output data of each row
    $err="<p class=\"errorP\">Username exist. Please choose another usrename and password.</p>";
   echo $err;
    
    }
 
else 
{
    
    $query = "INSERT INTO users (user_name, user_hash)
VALUES
('".$username."','".$password."')";
    $result = $conn->query($query);
//    echo $query;
   $last_id = $conn->insert_id;
//$_SESSION['user_id']=$last_id;
					$_SESSION['login_user']=$username;
                    $_SESSION['user_id']=$last_id;
					
					header("location:index.php");    
    
}    

    }
        else
	{
		$error='<p class="errorP ">Enter username and password</p>';
		echo $error;
	}
}
 
}
function  cancel(){
	header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>       
        
      <div class="signup_lable">
           <h1 id="signup_lab">Welcome to new world of blog</h1>
           <hr> 
       </div>
        
        <div id="signin">
				<div >
					<form name="form_login" method="post" action="" role="form" class="pure-form pure-form-aligned">
						<fieldset>
                            <div class="pure-control-group signup_username">
							<label  for="name">Username :</label>
							<input name="txt_name"  type="text"  placeholder="Username" id="name" class="pure-input-1-3">
<!--                                //id="username-->
                            </div>
                             <div class="pure-control-group signup_passward">
							<label  for="password">Password :</label>
							<input type="password"  name="pwd_pass" id="password" placeholder="Password" class="pure-input-1-3">
                            </div>
                             <div class="pure-controls">
							<input type="submit" name="btn_signup" value="Sign In"  class="pure-button pure-button-primary" id="signup_submit">
                            <input id="button" type="submit" name="cancle" value="cancle" class="pure-button pure-button-primary" >
                               </div> 
						</fieldset>
					  </form>
				</div>
			</div>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/buttons-min.css">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>        
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>              
    </body>
</html>
