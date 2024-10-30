<?php 
    if(isset($_POST['submit'])){
            //cookie are stored on the users computer and not on the server like sesssion but session is saver to use than cookie.
            //the cookie popup essentially ask for permission to store data on your computer in form of cookies and that data is meant to enhance expirence on website.It monitors users activity and give them something similar whenever they browse.
        setcookie('gender', $_POST['gender'], time() + 86400); //set the cookie to expire in a day 86400
    
        session_start();
        $_SESSION['name'] = $_POST['name']; 
                header('Location: index.php');
                // echo $_SESSION['name'];   

    }

    $file = 'qoutes.txt';
?>

<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
<head>
    <title>Ninja</title>
      <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style type="text/css">
    .brand{
        background: #cbb09c !important; 
    }
    .brand-text{
        color: #cbb09c !important;
    }
    form{
        max-width:400px;
        margin: 20px auto 0 auto;
        padding: 20px;
    }
    .pizza-title{
        margin-top: 50px;
    }
    footer{
        margin-top: 150px;
    }
    
    select {
            display: block;
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            background-color: white;
            color: black;
            border: 1px solid #cbb09c;
            margin-top: 10px;
        }

        /* Option styling */
        option {
            color: #333;
            background-color: #f8f8f8;
            padding: 5px;
        }

        /* Option text color */
        .black-text {
            color: #333;
        }

    /* .card-content{
        margin-bottom: 150px;
    } */
</style>
</head>
<body class="grey lighten-3">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="" class="brand-logo brand-text"> Ninja Pizza</a>
        </div>
    </nav>
        <div>
            <p><?php echo readfile($file)?></p>
        </div>
    <form action= <?php echo $_SERVER['PHP_SELF']?> method='POST'>
    <input type="text" name="name"placeholder="Enter name" >
    <select name="gender" id="" >
        <option value="male" class="black-text">male</option>
        <option value="female" class="black-text">female</option>
    </select>
    <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0 ">
    </form>
    
    <footer class="white section">
    <div class="center grey-text">
        <p class="footer"> Copyright 2024 Ninja Pizza</p>
    </div>
</footer>
</body>
</html>


