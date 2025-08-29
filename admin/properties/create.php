<?php

require '../../includes/config/database.php';
$db = DBconn();

// query for sellers
$query = "SELECT * FROM sellers";
$result = mysqli_query($db, $query);
// array error logs
$errors = [];

$tittle = '';
$price = '';
$description = '';
$rooms = '';
$wc = '';
$parking = '';
$seller = '';

// exect after user send form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // para imagenes
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

    // Sanitize inputs
    $tittle = mysqli_real_escape_string($db,$_POST['tittle']); 
    $price = mysqli_real_escape_string($db,$_POST['price']); 
    $description = mysqli_real_escape_string($db,$_POST['description']); 
    $rooms = mysqli_real_escape_string($db,$_POST['rooms']); 
    $wc = mysqli_real_escape_string($db,$_POST['wc']); 
    $parking = mysqli_real_escape_string($db,$_POST['parking']); 
    $seller = mysqli_real_escape_string($db,$_POST['seller']); 
    $created = date('Y/m/d');

    // asign files to a variable
    $image = $_FILES['image'];
    var_dump($image['name']);


    if (!$tittle) {
        $errors[] = 'Tittle cant be empty';
    }

    if (!$price) {
        $errors[] = 'Price cant be empty';
    }

    if (strlen($description) < 50) {
        $errors[] = 'Description cant be empty and it must be at least 50 characters';
    }

    if (!$rooms) {
        $errors[] = 'Rooms number cant be empty';
    }

    if (!$wc) {
        $errors[] = 'WC number cant be empty';
    }

    if (!$parking) {
        $errors[] = 'Parking lot spots cant be empty';
    }

    if (!$seller) {
        $errors[] = 'Select one selller';
    }

    if(!$image['name'] || $image['error']){
        $errors[] = 'Image is mandatory';
    }

    // Image size validator (1 MB max)
    $messure = 1000 * 1000;

    if($image['size'] > $messure){
        $errors[] = 'Image is so big, upload another';
    }


    // review if error logs is empty
    if (empty($errors)) {

        // uploading files
        // make directory
        $dirImages = '../../images/';

        if(!is_dir($dirImages)){
            // if not exist, make it
            mkdir($dirImages);
        }

        // generate unique name to images
        $nameImage = md5(uniqid(rand(), true)) . ".jpg";
        // var_dump($nameImage);

        // upload image
        move_uploaded_file($image['tmp_name'], $dirImages . $nameImage);

        
        // Insert DB
        $query = "INSERT INTO properties (tittle, price, image, description, rooms, wc, parking, created, sellers_id) VALUES ('$tittle', '$price', '$$nameImage', '$description', '$rooms', '$wc', '$parking', '$created' , '$seller')";

        // echo $query;

        $result = mysqli_query($db, $query);

        if ($result) {
            // Redirection
            header('location: /admin?result=1');
        }
    }
}


require '../../includes/functions.php';
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

            <select name="seller">
                <option value="">--SELECT--</option>
                <?php while($row = mysqli_fetch_assoc($result)) :?>
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

<?php addTemplate('footer');; ?>