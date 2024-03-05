<?php

function isSuperAdmin() {
  session_start();
  if(isset($_SESSION["userRole"]) && $_SESSION["userRole"]==1) {

    
    echo "<a href='../admin/chore_control_view.php'> <img src =../asset/create.png>Create Chore</a>";
    echo "<a href ='../admin/assignment_control_view.php'><img src= ../asset/addAssignment.png>Create Assignment</a>";
    echo "<a href = '../admin/assign_chore_view.php'><img src= ../asset/update.png>Assign Chore</a>";

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


function onlyAdmin(){

  session_start();

  if(isset($_SESSION["userRole"]) && $_SESSION["userRole"]==1){


  }

  else{

    header("Location:/choreProject/views/home.php");
    exit();


  }



}




?>