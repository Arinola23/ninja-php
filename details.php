<?php
  include('config/db_connect.php');
// carrying out the delete function in the database

if(isset($_POST['delete'])){
  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
  $sql = "DELETE FROM pizza WHERE id = $id_to_delete"; 
  // to query in the database using the above sql code
  if(mysqli_query($conn, $sql)){
    //if successful deleted after querying, route to the home page
    header("Location:index.php");
  } else {
    //if failure, echo the error message using 
    echo "Query error:". mysqli_error($conn);
  }
}

  if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM pizza WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($conn);

    // print_r($pizza);
  }
?>

<!DOCTYPE html>
<html>
<?php include("templates/header.php")?>
    <h2>MORE DETAILS</h2>
    <div class="container center grey-text">
        <?php if($pizza):?>
            <h4><?php echo htmlspecialchars($pizza['type']);?></h4>
            <p><?php echo htmlspecialchars($pizza['email']);?></p>
            <p><?php echo date($pizza['created_at']);?></p>
            <h5>Ingredient:</h5> <p><?php echo htmlspecialchars($pizza['ingredients']);?></p>
        
        <!--CODE TO DELETE DETAILS -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">
          <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>
            <?php else: ?>
            <h5>Pizza is unavailable</h5>
        <?php endif?>
    </div>
<?php include("templates/footer.php")?>
</html>