<?php

require '../../includes/app.php';

use App\Propertie;
use App\Seller;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

$auth = isAuth();

$propertie = new Propertie();

// query to get all from sellers
$sellers = Seller::all();



// array error logs
$errors = Propertie::getErrors();


// exect after user send form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propertie = new Propertie($_POST['propertie']);


    // This code manage de upload files or images
    $nameImage = md5(uniqid(rand(), true)) . ".jpg";

    
    if ($_FILES['propertie']['tmp_name']['image']) {
        $manager = new Image(Driver::class);
        $image = $manager->read($_FILES['propertie']['tmp_name']['image'])->cover(800, 600);
        $propertie->setImage($nameImage);

        // debbuger($image);
    }


    $errors = $propertie->validate();


    // review if error logs is empty
    if (empty($errors)) {

        // make directory

        if (!is_dir(DIR_IMAGES)) {
            // if not exist, make it
            mkdir(DIR_IMAGES);
        }

        // Save image in server
        $image->save(DIR_IMAGES . $nameImage);

        $result = $propertie->saveData();
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

        <?php include '../../includes/templates/propertie_form.php' ?>

        <input type="submit" value="Create Propertie" class="button green-btn">
    </form>
</main>

<?php addTemplate('footer'); ?>