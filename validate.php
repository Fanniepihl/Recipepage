<?php 
//$myusername = "ellinor";
//$myuserpass = "db63cdafaa98b689f15a84df7b00a230730682ed"  = "ellinor" 

    if(isset($_POST['remember'])){ 
        setcookie('username',$uname, time()+60*60*7);   #om remeber me är i bockad så ska en cookie starta. 
        
        }
    session_start();                    #session startas när användarnamnet är rätt. 
    $_SESSION['username'] = $uname;
    header("location: welcome.php");      #användaren skickas till welcome.php. 
    
}
?>