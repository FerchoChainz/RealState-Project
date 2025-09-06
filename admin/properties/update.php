<?php


// Validate valid ID
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

// conn
require '../../includes/config/database.php';
$db = DBconn();


// Query form properties
$query = "SELECT * FROM properties WHERE id = $id ";
$result = mysqli_query($db, $query);
$propertie = mysqli_fetch_assoc($result);



// query for sellers
$query = "SELECT * FROM sellers";
$result = mysqli_query($db, $query);
// array error logs
$errors = [];


// Log errors

$tittle = $propertie['tittle'];
$price = $propertie['price'];
$description = $propertie['description'];
$rooms = $propertie['rooms'];
$wc = $propertie['wc'];
$parking = $propertie['parking'];
$seller = $propertie['sellers_id'];
$propertieImage = $propertie['image'];

// exect after user send form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";


    // Sanitize inputs
    $tittle = mysqli_real_escape_string($db, $_POST['tittle']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $rooms = mysqli_real_escape_string($db, $_POST['rooms']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $parking = mysqli_real_escape_string($db, $_POST['parking']);
    $seller = mysqli_real_escape_string($db, $_POST['seller']);
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

    if (!$description) {
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

    // Image size validator (1 MB max)
    $messure = 1000 * 1000;

    if ($image['size'] > $messure) {
        $errors[] = 'Image is so big, upload another';
    }


    // review if error logs is empty
    if (empty($errors)) {

        // make directory
        $dirImages = '../../images/';

        if (!is_dir($dirImages)) {
            // if not exist, make it
            mkdir($dirImages);
        }

        $nameImage = '';


        // updating images and deleting in server
        if ($image['name']) {
            // if new image exist, delete the past image

            unlink($dirImages . $propertie['image']);


            // generate unique name to images
            $nameImage = md5(uniqid(rand(), true)) . ".jpg";

            // var_dump($nameImage);

            // upload image
            move_uploaded_file($image['tmp_name'], $dirImages . $nameImage);
        } else {
            $nameImage = $propertie['image'];
        }


        // Update DB
        $query = " UPDATE properties SET tittle = '$tittle', price = '$price', image = '$nameImage', description = '$description', rooms = $rooms, wc = $wc, parking = $parking, sellers_id = $seller WHERE id = $id";

        // echo $query;

        $result = mysqli_query($db, $query);

        if ($result) {
            // Redirection
            header('location: /admin?result=2');
        }
    }
}



require '../../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Update</h1>

    <a href="/admin" class="button green-btn">Go Back</a>

    <?php foreach ($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>General Info</legend>

            <label for="tittle">Tittle:</label>
            <input type="text" id="tittle" name="tittle" placeholder="Propertie tittle" value="<?php echo $tittle; ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Propertie price" value="<?php echo $price; ?>">

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/jpeg, image/png">

            <img src="/images/<?php echo $propertieImage ?>" alt="" class="small-img">

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
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option
                        <?php echo $seller === $row['id'] ? 'selected' : ''; ?>
                        value="<?php echo $row['id'] ?>">


                        <?php echo $row['name'] . " " . $row['last_name']; ?>
                    </option>
                <?php endwhile ?>
            </select>
        </fieldset>

        <input type="submit" value="Update Propertie" class="button green-btn">
    </form>
</main>

<?php addTemplate('footer'); ?>