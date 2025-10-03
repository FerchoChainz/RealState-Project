<?php

use App\Propertie;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

require '../../includes/app.php';

isAuth();


// Validate valid ID
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

$db = DBconn();


// Instance of class Propertie
$propertie =  Propertie::find($id);



// query for sellers
$query = "SELECT * FROM sellers";
$resultSellers = mysqli_query($db, $query);
// array error logs
$errors = [];

$errors = $propertie::getErrors();

// exect after user send form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Asign atributes
    $args = $_POST['propertie'];;


    // this metod sync the late input by user and the object in memory
    $propertie->sync($args);


    // validate
    $errors = $propertie->validate();

    // upload files
    // This code manage de upload files or images
    $nameImage = md5(uniqid(rand(), true)) . ".jpg";
    if ($_FILES['propertie']['tmp_name']['image']) {
        $manager = new Image(Driver::class);
        $image = $manager->read($_FILES['propertie']['tmp_name']['image'])->cover(800, 600);
        $propertie->setImage($nameImage);

        // debbuger($image);
    }


    // review if error logs is empty
    if (empty($errors)) {



        exit;

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

        <?php include '../../includes/templates/propertie_form.php'?>

        <input type="submit" value="Update Propertie" class="button green-btn">
    </form>
</main>

<?php addTemplate('footer'); ?>