<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #368983;
            background-image: url(../asset/login.jpeg);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
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
    color :white
    }

    .popup button {
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
       }

        .login-container h2 {
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

        .form-group input {
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
    <div class="login-container">
        <?php
        if(isset($_SESSION["loginFailed"]) && $_SESSION["loginFailed"] ===true){

            echo "<div class='overlay'>
                    <div class='popup'>
                        <p>Wrong  password or Username! Please try again.</p>
                        <button onclick='closePopupun()'>OK</button>
                    </div>
                </div>";
            

            unset($_SESSION["loginFailed"]);
}

        ?>
        <h2>Login</h2>
        <form id="loginForm" action="../action/login_user.php" method="post" name="loginForm">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" 
                       pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                       title="Enter a valid email address" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <button type="submit" id="signInBtn" name="signInBtn">Sign In</button>
            </div>
        </form>
        <p>Don't have an account? <a href="../login/register.php">Register</a></p>
    </div>

    <script>

          function closePopupun() {
                window.location.href = "/choreProject/login/login.php";
                $(".overlay").remove();
                


            }

    </script>
</body>
</html>




  
