<?php

require '../includes/app.php';

use App\Propertie;

isAuth();


// Import DB
$db = DBconn();

// Method to get all properties with activeRecord
$properties = Propertie::all();



// Show conditional message
$result = $_GET['result'] ?? null;


 if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){

        // delete file
        $query = "SELECT image FROM properties WHERE id = $id";
        $result = mysqli_query($db, $query);
        $propertie = mysqli_fetch_assoc($result);
        var_dump($propertie['image']);

        unlink('../images/' . $propertie['image'] );

        // delete propertie
        $query = "DELETE FROM properties WHERE id = $id";

        $result = mysqli_query($db, $query); 

        if($result){
            header('location: /admin?result=3');
        }
    }
 }

// Show template

addTemplate('header');
?>

<main class="container section">
    <h1>Admin RealState</h1>

    <?php if(intval($result) === 1): ?>
        <p class="alert succes">Ad created successfully</p>
    <?php elseif(intval($result) === 2 ):?>    
        <p class="alert updated">Ad Updated successfully</p>
    <?php elseif(intval($result) === 3 ):?>    
        <p class="alert deleted">Ad deleted successfully</p>
    <?php endif; ?>

    <a href="/admin/properties/create.php" class="button green-btn">New Propertie</a>


    <table class="properties">
         <thead>
            <tr>
                <th>ID</th>
                <th>Tittle</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
         </thead>


         <tbody> <!-- Show results -->
            <?php foreach($properties as $propertie): ?>
            <tr>
                <td><?php echo $propertie->id;?></td>
                <td><?php echo $propertie->tittle;?></td>
                <td><img src="/images/<?php echo $propertie->image; ?>" alt="" class="table-img"></td>
                <td><?php echo $propertie->price;?></td>
                <td>
                    <form action="" method="POST" class="w-100">
                       <input type="submit" value="Delete" class="red-btn-b">
                       <input type="hidden" name="id" value="<?php echo $propertie->id;?>">
                    </form>


                    <a href="admin/properties/update.php?id=<?php echo $propertie->id; ?>" class="blue-btn-b">Update</a>
                </td>
            </tr>

            <?php endforeach; ?>
         </tbody>
    </table>

</main>

<?php

// Close Connection

mysqli_close($db);

addTemplate('footer'); ?>