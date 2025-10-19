<?php 

require '../../includes/app.php';
use App\Seller;
isAuth();

// Validate id is valid
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /admin');
}


// get seller array from DB 
$seller = Seller::find($id);



// array error logs
$errors = Seller::getErrors();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // assign values 
    $args = $_POST['seller'];
    
    // sync memory object
    $seller->sync($args);

    // validate
    $errors = $seller->validate();

    if(empty($errors)){
        $seller->saveUpdate();
    }

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

    <form class="form" method="POST" enctype="multipart/form-data§">

        <?php include '../../includes/templates/seller_form.php' ?>

        <input type="submit" value="Save Changes" class="button green-btn">
    </form>

</main>

<?php addTemplate('footer')?>  