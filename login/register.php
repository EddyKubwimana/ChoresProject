<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-image:  url(../asset/niceBackground.jpeg);
    margin: 0;
    padding: 0;
}

.register-container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
select,
button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="radio"] {
    margin-right: 5px;
}

button {
    background-color: #4caf50;
    color: #ffffff;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

a {
    text-decoration: none;
    color: #3498db;
}

a:hover {
    color: #1e87f0;
}
    .overlay {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .popup {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    background-color: #368983;
    }

    .popup button {
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
       }

        
    </style>
</head>
<body>



    <div class="register-container">

    <?php
    session_start();

    // Check if the email is not duplicated
    if(isset($_SESSION['duplicatedEmail']) && $_SESSION['duplicatedEmail'] === true) {
        echo "<div class='overlay'>
                <div class='popup'>
                    <p>The user already exist. Please login !</p>
                    <button onclick='closePopupun()'>OK</button>
                </div>
              </div>";

        unset($_SESSION["duplicatedEmail"]);
    }


   
    if(isset($_SESSION['registration']) && $_SESSION['registration'] === true) {
        echo "<div class='overlay'>
                <div class='popup'>
                    <p>Registration successful! Please click the button to go to the login page.</p>
                    <button onclick='closePopupun()'>OK</button>
                </div>
              </div>";

        unset($_SESSION["registration"]);
    }

    if(isset($_SESSION['registration']) && $_SESSION['registration'] === false){
        echo "<div class='overlay'>
                <div class='popup'>
                    <p>Registration failed! Please try again.</p>
                    <button onclick='closePopupdeux()'>OK</button>
                </div>
              </div>";

        unset($_SESSION["registration"]);
    }
?>
        

        <h2>Register</h2>
        <form id="registerForm" action="../action/register_user.php" method="post" name="registerForm">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="fname" placeholder="Enter your first name" pattern="[A-Za-z]+" title="Only letters allowed" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lname" placeholder="Enter your last name" pattern="[A-Za-z]+" title="Only letters allowed" required>
            </div>
            
            <div class="form-group">
                <label for="gender">Gender:</label>
                <label><input type="radio" name="gender" id="male" value="0"> Male</label>
                <label><input type="radio" name="gender" id="female" value="1"> Female</label>
            </div>
            <div class="form-group">
                <label for="familyRole">Family Role:</label>
                <select id="familyRole" name="fid" required>
                    <option value="0">Select</option>

                    <?php
                        require_once "../setting/connection.php";
                        $sql = "SELECT fid, fam_name FROM Family_name";
                        $result = $conn->query($sql);
            
                        while ($row = $result->fetch_assoc()) {
                                    $roleId = $row['fid'];
                                    $roleName = $row['fam_name'];
                                    echo "<option value='$roleId'>$roleName</option>";
                        }
                    ?>

                
                    
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" placeholder="Select your date of birth" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="tel" placeholder="Enter your phone number" pattern="[0-9]{10,}" title="Enter a valid 10-digit phone number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" onchange="isValidEmail()" required>
            </div>
            <div class="form-group" >
                <label for="password">Password:</label>
                <input type="password" id="password" name="passwd" placeholder="Enter your password" onchange="isStrongPassword()">
            </div>
            <div class="form-group" id ="passwordform">
                <label id = "info"></label>
                <label for="confirmPassword">Retype Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Retype your password" onchange="checkSimilarity()" required>
            </div>
            <div class="form-group">
                <button type="submit" id="registerBtn" name="registerBtn">Register</button>
            </div>
        </form>
        <p>Already have an account? <a href="/choreProject/login/login.php">Login</a></p>
    </div>

    <script>




        function redirectToLogin() {
            window.location.href = "/choreProject/login/login.php";
        }

        function checkSimilarity(){


            var password = document.getElementById("password")

            var confirmPassword = document.getElementById("confirmPassword")

            var p = password.value
            var c = confirmPassword.value

            if(p===c){

               var form = document.getElementById("passwordform")

               var label = form.querySelector("#info")

               confirmPassword.style.color = "black"

               form.removeChild(label)

            } else{

                var label = document.getElementById("info")
                label.innerHTML = "<p> The password do not match</p>"
                label.style.color = "red"

                confirmPassword.style.color = "red"


            }
        
        }


        function isValidEmail() {
    
                var regex = /@ashesi\.edu\.gh$/;

                var password = document.getElementById("email")

                if (regex.test(password.value)){

                    
                    password.style.color = "black"

                } else{


       

                password.style.color = "red"

                password.value = "The email is not valid"


            };
}


    function isStrongPassword(password) {
        
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        var password = document.getElementById("password")

        if (regex.test(password.value)){

            password.style.color = "black"

            

            
        }

        else{

            password.style.color = "red"
            password.value =""
            password.defaultValue = "The password is weak"


        }
                }

                function closePopupun() {
                window.location.href = "/choreProject/login/login.php";
                $(".overlay").remove();
                


            }

            function closePopupdeux() {
                window.location.href = "/choreProject/login/register.php";
                $(".overlay").remove();
                
                

            }
    </script>


</body>
</html>

<?php

$conn->close();

?>



