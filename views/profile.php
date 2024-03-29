<?php

include("../setting/core.php");
isLogIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            background-image: url(../asset/login.jpeg);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .profile-container {
            margin-top: 500px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 800px;
            text-align: center;
            margin: 20px;
            position: relative;
            overflow: hidden;
        }

        .profile-picture {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        h2 {
            color: #368983;
            margin-bottom: 20px;
        }

        form {
            padding-top:200px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #368983;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: #368983;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2c6e6e;
        }
    </style>
</head>
<body> 
    <div class="profile-container">
        <img class="profile-picture" src="https://agent-connect-files.s3.us-east-2.amazonaws.com/updated_photos/images/Olivier+Bigirimana.jpg" alt="Profile Picture">
      
        <hr>
        
        <form id="userProfileForm" action="#" method="POST" name="userProfileForm">
        
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="Enter first name" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" placeholder="Enter last name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" required>

           

            <button type="submit" id="updateProfileBtn" name="updateProfileBtn">Update Profile</button>
        </form>
    </div>
</body>
</html>
