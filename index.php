<?PHP
//start session
ob_start(); 
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
include('login.php');
//if user already logged in than show welcome screen.

if(isset($_SESSION['login_user']))
		{
	$nav='<div id="pageNav" >
							<div id="session_id">
							<form>
							<label id="label_session" for="parameterValue"><h1>Welcome to new world  '.$_SESSION['login_user'].' !</h1></label>
							<input type="submit" class="pure-button pure-button-primary" name="btnSignOut" id="session_btn" value="Sign Out" >
							</form>
                            <hr>
							</div>
							</div>';
}
//show login and signup button
else
{
	$nav='<div id="defaultNav">
                    <h1 id="land_title"> Welcome to new world</h1>
					<div id="landig_btn">
					<form>
					<input type="submit" id="btnSignUp" name="btnSignUp" value="Sign Up" class="pure-button pure-button-primary">
					<span> OR </span>
					<input type="button" id="btnSignIn" name="btnSignIn" value="Log In" class="pure-button pure-button-primary">
					</form>
                    
					</div>
                    <hr>
					</div>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Micro Blog</title>
</head>
<body>
	<!-- Wrap all page content here -->
	<div id="wrapper">
		<div class="container margin-bottom-2">
			<?PHP 
				echo $nav;
			?>	
<!--			show login form-->
			<div id="signinNav" >
				<div >
					<form  class="pure-form" name="form_login" method="post" action="index.php" role="form">
						<fieldset id="login_form">
                            
							<label  for="parameterValue">Username :</label>
							<input name="username"  type="text" id="username" placeholder="Username">
                                
                            
							<label  for="parameterValue" id="login_pass">Password :</label>
							<input type="password"  name="password" id="password" placeholder="Password">
                                
							<input class="pure-button pure-button-primary" type="submit" name="Submit" value="Sign In" id="login_signin" >
						</fieldset>
					  </form>
                    <hr>
				</div>
			</div>
<!--			post your data if session is set-->
            <div>
				<div>
			<?PHP 
		if(isset($_SESSION['login_user']))
		{
			$footer='<div id="footer">
			<div class="container">
			<div id="post_form">
			<form  method="POST" class="pure-form" action="index.php">
			<div id="post">
			<textarea rows="4" cols="60" name="txt_post" id="message" ></textarea>
			</div>
			<input type="submit" id="post_btn"  name="Post" value="Post" class="pure-button pure-button-primary">
			</form>
			</div>
            <hr width="50%">
            </div>
			</div>';
			echo $footer;
		}
	?>
				</div>
			</div>
			

			<div id="post_title">
				<div id="post_title1">
					
					<h1 id="post_text">Here is your thoughts! </h1>
					<hr width="50%">
                    <br>
                </div>
				</div>
			</div>
   
<!--    message view    -->
		<div class="messageview">
			<div >
			<?PHP
				post(); 
			?>
				</div>
		</div>
		</div>	
	


	<div id="err_dialog"></div>

    
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<script src="js/index.js"></script>
	
</body>
</html>