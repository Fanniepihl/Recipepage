<?php 
//$myusername = "ellinor";
//$myuserpass = "db63cdafaa98b689f15a84df7b00a230730682ed"    

//if(isset($_POST['login'])){
//   $uname =$_POST['username']; 
//     $upass =$_POST['userpass'];
     
    #if($uname == $myusername and $upass == $myuserpass )
    if(isset($_POST['remember'])){ 
        setcookie('username',$uname, time()+60*60*7);
        
        }
    session_start();
    $_SESSION['username'] = $uname;
    header("location: welcome.php");
    
}
?>