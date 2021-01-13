<?php
    /*
    if(invalidUid($username )!==false){
        header("location: ..signup.php?error=invaliduid");
        exit();
        
    }
    
    if(invalidEmail($email )!==false){
        header("location: ..signup.php?error=invalidemail");
        exit();
        
    }
    
    if( passwordMatch($password , $passwordRepeat )!==false){
        header("location: ..signup.php?error=pwddontmatch");
        exit();
        
    }
    
    if (uidExists($conn,$username)!==false    ){
        header("location: ..signup.php?error=usernametaken");
        exit();
    }
    
    createUser($conn , $firstname , $email, $lastname,$password ,$userType ,$afm ,$username);
    */
    function  emptyInputSignup($userType,$firstname ,$lastname ,$username ,$afm ,$email,$password ,$passwordRepeat){
        $result;
        if(empty($userType) || empty($userType)||empty($userType) || empty($userType)||empty($userType) || empty($userType)||empty($userType) || empty($userType)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
        
    }
