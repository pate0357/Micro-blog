<?PHP
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
	{
		 login();
	}else if (isset($_REQUEST['btnSignOut']))
	{
        
		logout();
	}else if (isset($_REQUEST['Post'])){
     
		postdata();
	}else if (isset($_REQUEST['btnSignUp'])){
		header('Location:signup1.php');
	}


/*******Login******/
function login()
{

require('dbconfig.php');
        
if (isset($_POST['username']) and isset($_POST['password']))
{
    if( !empty($_POST['username']) && !empty($_POST['password']) )
    {
    
//Assigning posted values to variables.

$username = addslashes($_POST['username']);

$password = addslashes($_POST['password']);
    
//Authenticate password with using md5 
 $password = md5($password);


    
$query = "SELECT * FROM `users` WHERE user_name='$username' and user_hash='$password'";


$result = $conn->query($query);

    
if ($result->num_rows > 0) 
    {
    // output data of each rows
    while($row = $result->fetch_assoc()) {
                $userId=$row['user_id'];				
				$_SESSION['user_id']=$userId;
				$_SESSION['login_user']=$username;
                   }
    } 
    else 
    {
    $error="Username or password is invalid.";
    echo $error;
    } 
    }
    else
 {
    $error='<p class="errorP">Enter username and password</p>';
		echo $error;      
 }
 }
}

/*****logout*****/
function logout()
{
    unset($_SESSION['login_user']);
	unset($_SESSION['user_id']);
	
	//destroy current session
	if(session_id() != '' || isset($_SESSION)) {
    	// session destroy
		session_destroy();
	}
	
	header("Location:index.php");
}

/**********Post Msg ******/

function postdata()
{
    $userId="";
    require('dbconfig.php');
    if (isset($_POST['txt_post']) and isset($_SESSION['user_id']))
    {
        
     if( !empty($_POST['txt_post']) && !empty($_SESSION['user_id']) )
    {


$userpost = addslashes($_POST['txt_post']);
$userId= $_SESSION['user_id'];
    
        
$query = "INSERT INTO messages (message_text,user_id,time_stamp)
VALUES
('$userpost','$userId',CURRENT_TIMESTAMP)";

  
if ($conn->query($query) === TRUE) 
{
 } 

}else {
    echo "Enter message to post";
}
    }
}
/*********Fetch messages********/
function post()
{
    require('dbconfig.php');
$msg="";
$query = "SELECT messages.message_text,messages.time_stamp,users.user_name FROM messages INNER JOIN users ON messages.user_id=users.user_id ORDER BY message_id DESC ";

  
$result = $conn->query($query);

// output data of each row
    
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
   $msg_txt= $row["message_text"];
    $msg_time= $row["time_stamp"];
    $user_name=$row["user_name"];    


        $msg=$msg.'<div id="post_div">
                  <lable id="post_lable">' .$user_name.'</lable>
                   <p id="post_ptxt">' .$msg_txt.'</p>
                   <p id="post_ptime">' .$msg_time.'</p>
                   
                   </div><hr width="50%">';
    
    
    }
     echo $msg;
    } 
    }

?>

