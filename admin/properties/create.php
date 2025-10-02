<?php

require '../../includes/app.php';

use App\Propertie;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

$auth = isAuth();
$db = DBconn();

// query for sellers
$query = "SELECT * FROM sellers";
$resultSellers = mysqli_query($db, $query);
// array error logs
$errors = Propertie::getErrors();



// Log errors
$tittle = '';
$price = '';
$description = '';
$rooms = '';
$wc = '';
$parking = '';
$seller = '';

// exect after user send form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propertie = new Propertie($_POST);
    
    // This code manage de upload files or images
    $nameImage = md5(uniqid(rand(), true)) . ".jpg";
    if($_FILES['image']['tmp_name']){
        $manager = new Image(Driver::class); 
        $image = $manager->read($_FILES['image']['tmp_name'])->cover(800,600);
        $propertie->setImage($nameImage);

        // debbuger($image);
    }


    $errors = $propertie->validate();

    
    // review if error logs is empty
    if (empty($errors)) {
        
        // make directory
        
        if(!is_dir(DIR_IMAGES)){
            // if not exist, make it
            mkdir(DIR_IMAGES);
        }        


        // Save image in server
        $image->save(DIR_IMAGES . $nameImage);
        
        $result = $propertie->saveData();
        // debbuger($result);
        // if ($result) {
        //     // Redirection
        //     header('location: /admin?result=1');
        // }
    }
}



addTemplate('header');
?>

<main class="container section">
    <h1>Create</h1>

    <a href="/admin" class="button green-btn">Go Back</a>

    <?php foreach ($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">
        <fieldset>
            <legend>General Info</legend>

            <label for="tittle">Tittle:</label>
            <input type="text" id="tittle" name="tittle" placeholder="Propertie tittle" value="<?php echo $tittle; ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Propertie price" value="<?php echo $price; ?>">

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/jpeg, image/png">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $description; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Propertie Info</legend>
            <label for="rooms">Rooms:</label>
            <input type="number" name="rooms" id="rooms" min="1" placeholder="Example: 3" value="<?php echo $rooms; ?>">

            <label for="wc">Bathrooms:</label>
            <input type="number" name="wc" id="wc" min="1" placeholder="Example: 3" value="<?php echo $wc; ?>">

            <label for="parking">Parking Lot:</label>
            <input type="number" name="parking" id="parking" min="1" placeholder="Example: 3" value="<?php echo $parking; ?>">
        </fieldset>

        <fieldset>
            <legend>Seller</legend>

            <select name="sellers_id">
                <option value="">--SELECT--</option>
                <?php while($row = mysqli_fetch_assoc($resultSellers)) :?>
                    <option 
                    <?php echo $seller === $row['id'] ? 'selected' :'' ;?>
                        value="<?php echo $row['id'] ?>">


                    <?php echo $row['name'] . " " . $row['last_name'];?>
                </option>
                <?php endwhile ?>
            </select>
        </fieldset>

        <input type="submit" value="Create Propertie" class="button green-btn">
    </form>
</main>

<?php addTemplate('footer'); ?>