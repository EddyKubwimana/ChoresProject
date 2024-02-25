<?php

function isAdmin($userRole) {

  if($userRole=="admin") {


  }else{



  }


}


function isLogIn(){
    session_start();
    if (isset($_SESSION["userId"]) && $_SESSION["userId"]) {


        
    }

    else{

        header("Location:/choreProject/login/login.php");
        exit();
    }

}


function isnotLogin(){

  session_start();
    if (isset($_SESSION["userId"]) && $_SESSION["userId"]) {

      header("Location:/choreProject/views/home.php");
      exit();

        
    }

    else{

       
    }


}




?>