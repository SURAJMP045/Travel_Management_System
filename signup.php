<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
    body{
        background-image: url(images.jpg);
        background-size: cover;
        background-position: center;
        justify-content: center;
        align-items: center;
        background-attachment: fixed;
        }
    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      width: 700px;
      margin: auto;
      margin-top: 60px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input, select, textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color:rgb(91, 163, 208);
      color: #fff;
      padding: 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 18px;
      width: 100%;
    }

    button:hover {
      background-color: #45a049;
    }
    li{
        list-style: none;
    }
    .center{
        margin-bottom: 50px;
    }
    </style>
    
</head>
<body>
  <?php
    include("sign.php");
    ?>
    <div class="container">
<center class="center"><h1>USER SIGNUP <h1></center>
        <form id="tourForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="firstname">First Name :</label>
            <input type="text" id="name" name="firstname"  placeholder="first name" required>
            
            <label for="lastname">Last Name :</label>
            <input type="text" id="name" name="lastname" placeholder="last name" required>

            <label for="usernameid">username :</label>
            <input type="text" id="name" name="username" placeholder="User name" required>
      
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="ex: abcd@email.com" required>
            
            <label for="tel">Phone number:</label>
            <input type="text" id="tel" name="pnumber" placeholder="Phone number" required>
            
            <label for="password">password :</label>
            <input type="password" id="password" name="password" placeholder="ex: 123!?/*" required>

            <label for="password">confirm password :</label>
            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="confirm password" required>
            <br>
          
            <button type="submit">Sign Up</button>
            <br>
            <br><hr><br>

            <center><li><p>Already registered?</p><u></u><a href="login.php">login here</a></u></li></center>
        </form>
    </div>
     
</body>
</html>
