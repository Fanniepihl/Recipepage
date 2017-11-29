<?php
//Denna sida är till för användaren så att den kan ladda upp egna filer på hemsidan när den är inloggad. 
//After the user uploads the file, we basically run a few checks:

//['tmp_name'][] kan skrivas efter uplod också om man vill söka efter ett namn.

if (isset($_FILES['upload'])){
    
    #let's first make a whitelist of allowed extensions        strpos? ist? Vad som är tillåtet för användaren att ladda upp. 
    $allowedextensions = array('jpg', 'jpeg', 'gif', 'png');
    $extension = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));
    //Betydelse för strtolower och strpos   
    #The strtolower() function converts a string to lowercase.      #The strrpos() function finds the position of the last occurrence of a string                                                                      inside another string.The strrpos() function is case-sensitive. 


    #test by echoing out what you upload
    echo "Your file extension is: ".$extension;
    
    #we create an array called 'error' to store all our errors, so we can later use them. Sparas i en string. 
    $error = array ();
    
    if(in_array($extension, $allowedextensions) === false){ 
        
        #add a new array entry
        $error[] = 'This is not an image, upload is only for images.'; #Om filen inte är tillåtet så hamnar det i error och echo "This is not an image, upload is only for images".    
    }
    
    #it is also good to think about the size of the file you want to accept.
    #this is for images, so how big of an image would you like to accept?
    #this is in bytes, and 1000000 is actually 1 mb which is now our limit
    if($_FILES['upload']['size'] > 1000000){
        
        $error[]='The file exceeded the upload limit'; #Om formatet/storleken på bilden inte är tillåtet så hamnar det i error och echo "The file exceeded the upload limit".
    }
    
    
    #now you do the 'final check' to see if there are no errors in the array.
    #if they array is empty = no errors have been written in it.
    #if there is something in the array 'errors' that means an error has occured and we should not upload
    
    if(empty($error)){
        
        #this is our starding point, in order to upload we need to move the file (uploaded file)
        #all the way to the location we want to store it.
        #But, before we do so it will be good to do all of the ABOVE written first
        #We check for errors that might disturb our code, and try to avoid them
        #if there are no errrors move the file to the desired file location
        move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$_FILES['upload']['name']}");     
    }
    
}


?>

<html>
	<head>
		<title>Security - Upload</title>
	</head>
	<body>
		
			 <div>
                   <?php 
                   
                   #Now we want to either upload the file or type an error
                   #what we do is basically  check if there's an array named 'error'
                   #and we check if it's empty. If it's empty that means no errors we found
                   #we should proceed with the upload.
                   if (isset($error)){
                       if (empty($error)){
                           
                           #here we give the user the chance to check the file right away. 
                           #this is just for testing purposes so we can see the file is there
                           #when the user clicks, it will open the folder "uploadedfiles" and look for filename
                           echo '<a href="uploadedfiles/' . $_FILES['upload']['name'] . '">Check file';
                           
                       } else {
                           #else, if there was an error, then it simply goes through the error array
                           #it prints out ALL errors in the array.
                           #you can have one or more errors. 
                           #e.g. File too big, AND not supported!
                           foreach ($error as $err){
                               echo $err;
                           }
                           
                       }
                   }
                   
                   ?>
               </div>
               
               <!-- This is our form, important to use "enctype="multipart/form-data"
               
               -->
               <div>
                   
                   <form action="" method="POST" enctype="multipart/form-data">
                       <input type="file" name="upload" /></br>
                       <input  type="submit" value="submit" />
                   </form>                   
               </div>
	</body>
</html>