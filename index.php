<?php
//connecting to the database
include('config/db_connect.php');

//construct/write the query for all Pizzas
$sql = "SELECT  type, ingredients, id FROM pizza ORDER BY created_at"; //select from the pizza table which is in the Ninja-Pizza folder;

//make query & get result
$result = mysqli_query($conn, $sql); // store the mysqli query via the $conn connection so we know where we are connecting to the database, and data we need to get 

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); //fetch all the data on requested rows as an array.

//freeing result from memory because we don't need that anymore i.e $result. 
mysqli_free_result($result);

//closing connection
mysqli_close($conn);

//  print_r($pizzas);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("templates/header.php")?>
    <!-- Template for outputing the pizza data using html -->
    <h4 class="center grey-text">Pizzas</h4>
        <div class="container">
            <div class="row">
                <?php foreach($pizzas as $pizza): ?> 
                   <div class="col s6 md3">
                        <div class="card z-depth-0">
                            <div class="card-content center">
                                <h6><?php echo htmlspecialchars($pizza['type']);?></h6>
                                <ul>
                                    <!-- explode, explodes into an array and cycle through the array  -->
                                    <?php foreach(explode(',', $pizza['ingredients']) as $ingredient):?>
                                        <li><?php echo htmlspecialchars($ingredient)?></li>
                                     <?php endforeach?>
                                </ul>
                            </div>
                            <div class="card-action right-align">
                                <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">more info</a>
                            </div>
                        </div>
                   </div>
                <?php endforeach ?>
              
            </div>
        </div>

<?php include("templates/footer.php")?>


</html>