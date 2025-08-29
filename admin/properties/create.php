<?php 

require '../../includes/config/database.php';
$db = DBconn();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    $tittle = $_POST['tittle'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $rooms = $_POST['rooms'];
    $wc = $_POST['wc'];
    $parking = $_POST['parking'];
    $seller = $_POST['seller'];
}


require '../../includes/functions.php';
addTemplate('header');
?>

    <main class="container section">
        <h1>Create</h1>

        <a href="/admin" class="button green-btn">Go Back</a>

        <form class="form" method="POST" action="/admin/properties/create.php">
            <fieldset>
                <legend>General Info</legend>

                <label for="tittle">Tittle:</label>
                <input type="text" id="tittle" name="tittle" placeholder="Propertie tittle">

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Propertie price">

                <label for="image">Image:</label>
                <input type="file" id="image" accept="image/jpeg, image/png">

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>
            </fieldset>

            <fieldset>
                <legend>Propertie Info</legend>
                <label for="rooms">Rooms:</label>
                <input type="number" name="rooms" id="rooms" min="1" placeholder="Example: 3">

                <label for="wc">Bathrooms:</label>
                <input type="number" name="wc" id="wc" min="1" placeholder="Example: 3">

                <label for="parking">Parking Lot:</label>
                <input type="number" name="parking" id="parking" min="1" placeholder="Example: 3">
            </fieldset>

            <fieldset>
                <legend>Seller</legend>

                <select name="seller">
                    <option value="1">Juan</option>
                    <option value="2">Karen</option>
                </select>
            </fieldset>

            <input type="submit" value="Create Propertie" class="button green-btn">
        </form>
    </main>

<?php addTemplate('footer'); ;?>