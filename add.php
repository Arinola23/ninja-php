<?php

  //connecting the add file to the database
  include('config/db_connect.php');

    // checks whether a certain variable or value has been sent.
    //this checks if a get method has been sent. $the dollar sign is a global array in php. The data will be stored in the get variable.
    //htmlspecial char ensures that the information/data inputed in the form is not malicious, if it is, it prevents it from sending it to the server or having access to change the original code there by triggering virus on the website.
    
    //this is to prevent errors from displaying on the screen on first hand landing on the form page. The form is set to an empty string
    $email = $type = $ingredients = '';
    //creating error message properly
    $errors = array("email" => "", "type"=> "", "ingredients" => "");
    
    if(isset($_POST['submit'])){
        //check email
        if(empty($_POST['email'])){
           $errors["email"] = 'A valid email is required <br/>';
          //proper email validation using filter
        }else{
            //  echo htmlspecialchars($_POST['email']);
            $email = $_POST['email'];
            //inbuit email, validation
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $errors["email"] = "email must be a valid email address <br/>";
            }
        }  
        //check type
        if(empty($_POST['type'])){
            $errors["type"] ='Your prefered pizza is required <br/>';
             //proper type validation using regex(regular expression)
        }else{
              $type = $_POST['type'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $type)){
                $errors["type"] = "Pizza type must be letters and spaces only <br/>";
            }
        }
        //check ingredents
        if(empty($_POST['ingredients'])){
            $errors["ingredients"] = 'Atleast one ingredient is required <br/>';
             //proper type validation using regex(regular expression)
        }else{
            // echo htmlspecialchars($_POST['ingredients']);
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors["ingredients"] = 'Ingredients must be a comma separated list <br/>';
			}
        }

        //to redirect to the home page after filling the form correctly.
        //check the the array error set to see if there are any errors, if yes, echo "All sections must be filled" else redirect to the home page.
      if(array_filter($errors)){
        echo "All sections must be filled";
      } else {
        //this is a function that escapes any kind of malicious SQL character and prevents people from injecting certain harmful code into the database 
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
       $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

       //create the sqli string needed to save data from the php file to the sql database.
       $sql = "INSERT INTO pizza (type, email, ingredients) VALUES ('$type','$email','$ingredients')";
      
      //save to the database and check
      if(mysqli_query($conn, $sql)){
        //if the form is filled correctly and saved successfully tot eh database, route to the home page.
        header("Location:index.php");
      } else{
          echo "query error:" .mysqli_error($conn);
      }
    }
   } //this is the end of the post check
?>

<!DOCTYPE html>
<html lang="en">
<?php include("templates/header.php")?>
<section class="container grey-text">
    <h4 class="center pizza-title">Add a pizza</h4>
     <form class="white" action=<?php echo $_SERVER['PHP_SELF']?> method="POST">
        <label for="">Your Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors["email"]; ?></div>

        <label for="">Pizza type:</label>
        <input type="text" name="type" value="<?php echo htmlspecialchars($type) ?>">
        <div class="red-text"><?php echo $errors["type"]; ?></div>

        <label for="">Ingredients (coma seperated):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors["ingredients"]; ?></div>

        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
     </form>
</section>

<?php include("templates/footer.php")?>


</html>