<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
       body{
        background-image: url(images.jpg);
        background-size: cover;
        background-position: center;
        justify-content: center;
        /* display:flex; */
        align-items: center;
        }
    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      width: 700px;
      margin: auto;
      margin-top: 70px;
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
    include("loginpage.php");
    ?>
    <div class="Admin">
    <a href="adminlogin.php" target="_blank" class="btn" class="profile"><button>Admin login</button></a>
  </div>
    
    <div class="container">
      
        <center class="center"><h1>USER LOGIN </h1></center>
        <form id="tourForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Name :</label>
            <input type="text" id="name" name="username" placeholder="username" required>
          
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="ex: abcd@email.com" required>
          
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" placeholder="ex: asd@s.123" required>
            
            <br>
          
            <button type="submit" name="submit">Login</button>
            <br>
            <br><hr><br>
    
            <center><li><p>Not yet a user?</P><u><a href="signup.php">Sign up here<u></a></li></center>
        </form>
    </div>
    
</body>
</html>