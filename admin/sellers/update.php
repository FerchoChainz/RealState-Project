<?php 

require '../../includes/app.php';

use App\Seller;

isAuth();

$seller = new Seller();
// debbuger($seller);


// array error logs
$errors = Seller::getErrors();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

}

addTemplate('header');
?>


<main class="container section">
    <h1>Update Seller Info</h1>

    <a href="/admin" class="button green-btn">Go Back</a>

    <?php foreach ($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/admin/sellers/create.php">

        <?php include '../../includes/templates/seller_form.php' ?>

        <input type="submit" value="Save Changes" class="button green-btn">
    </form>

</main>

<?php addTemplate('footer')?>