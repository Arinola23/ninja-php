<?php 
    session_start(); // session keeps track of variables as the user moves from one page to another on the website. And this variables are stored on the server

    if( isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] =='noname'){
        //to delete session if it doesn't exist
        //to unset/delete a single variable
        unset($_SESSION['name']);
        // session_unset();
    } 
       $name = $_SESSION['name'] ?? 'Guest'; // null coalescing is like if condition, if the query string is equal to noname, echo name as Guest.
       $gender = $_COOKIE['gender'] ?? 'non-binary';
?>

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
    select{
        color:black !important; 
    }

    /* .card-content{
        margin-bottom: 150px;
    } */
</style>
</head>
        <!-- creating content using materialize -->
<body class="grey lighten-3">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="/index.php" class="brand-logo brand-text"> Ninja Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="black-text"> Hello <?php echo htmlspecialchars($name); ?></li>
                <li class="black-text"> (<?php echo htmlspecialchars($gender);?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    </nav>
     