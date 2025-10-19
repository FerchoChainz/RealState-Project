<?php

require '../includes/app.php';

use App\Propertie;
use App\Seller;

isAuth();


// Import DB
$db = DBconn();

// Method to get all properties with activeRecord
$properties = Propertie::all();
$sellers = Seller::all();

// debbuger($properties);


// Show conditional message
$result = $_GET['result'] ?? null;


 if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){

        $type = $_POST['type'];

        if(validateTypeContent($type)){

            // Compare the type that will be deleted
            if($type === 'seller'){
                $seller = Seller::find($id);
                $seller->delete();
            } else if($type === 'propertie'){
                $propertie = Propertie::find($id);
                $propertie->delete();
            }
        } 
    }
 }

// Show template

addTemplate('header');
?>

<main class="container section">
    <h1>Admin RealState</h1>

    <?php 
        $message = showDialogMessage(intval($result));
        if($message['message']){ ?>
            <p class="<?php echo $message['class']; ?> ">
            <?php echo s($message['message']); ?>
            </p>
    <?php } ?>

    <a href="/admin/properties/create.php" class="button green-btn">New Propertie</a>
    <a href="/admin/sellers/create.php" class="button green-btn">New Seller</a>

    <h2>Properties</h2>


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
                <td><?php currency($propertie->price);?></td>
                <td>
                    <form action="" method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propertie->id;?>">
                        <input type="hidden" name="type" value="propertie">

                       <input type="submit" value="Delete" class="red-btn-b">
                    </form>


                    <a href="admin/properties/update.php?id=<?php echo $propertie->id; ?>" class="blue-btn-b">Update</a>
                </td>
            </tr>

            <?php endforeach; ?>
         </tbody>
    </table>

    <h2>Sellers</h2>

    <table class="properties">
         <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last name</th>
                <th>Phone number</th>
                <th>Actions</th>
            </tr>
         </thead>


         <tbody> <!-- Show results -->
            <?php foreach($sellers as $seller): ?>
            <tr>
                <td><?php echo $seller->id;?></td>
                <td><?php echo $seller->name;?></td>
                <td><?php echo $seller->last_name; ?></td>
                <td><?php echo $seller->phone_number;?></td>
                <td>
                    <form action="" method="POST" class="w-100">
                       <input type="submit" value="Delete" class="red-btn-b">
                       <input type="hidden" name="id" value="<?php echo $seller->id;?>">
                       <input type="hidden" name="type" value="seller">
                    </form>


                    <a href="admin/sellers/update.php?id=<?php echo $seller->id; ?>" class="blue-btn-b">Update</a>
                </td>
            </tr>

            <?php endforeach; ?>
         </tbody>
    </table>

</main>

<?php


addTemplate('footer'); ?>