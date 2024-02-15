

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #368983;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: #fff;
           margin-top: 700px;
           padding : 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .register-container h2 {
            color: #368983;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            text-align: left;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group button {
            background-color: #368983;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
 
    <div class="register-container">

        <h2>Register</h2>
        <form id="registerForm" action="/labProject/action/register_user.php" method="post" name="registerForm">
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
                set_include_path('/Users/macuser/Sites/localhost/labProject/setting/');

                require_once('connection.php'); 

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
        <p>Already have an account? <a href="login.html">Login</a></p>
    </div>

    <script>

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



    </script>
</body>
</html>

<?php

$conn->close();

?>



