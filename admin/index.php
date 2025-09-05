<?php

// Import DB
require '../includes/config/database.php';
$db = DBconn();

// Query
$query = "SELECT * FROM properties";


// Consult BD
$queryResult = mysqli_query($db, $query);



// Show conditional message
$result = $_GET['result'] ?? null;

// Show template
require '../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Admin RealState</h1>

    <?php if(intval($result) === 1): ?>
        <p class="alert succes">Ad created successfully</p>
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
            <?php while($propertie = mysqli_fetch_assoc($queryResult)): ?>
            <tr>
                <td><?php echo $propertie['id'];?></td>
                <td><?php echo $propertie['tittle'];?></td>
                <td><img src="/images/<?php echo $propertie['image']; ?>" alt="" class="table-img"></td>
                <td><?php echo $propertie['price'];?></td>
                <td>
                    <a href="#" class="red-btn-b">Delete</a>
                    <a href="admin/properties/update.php?id=<?php echo $propertie['id']; ?>" class="blue-btn-b">Update</a>
                </td>
            </tr>

            <?php endwhile; ?>
         </tbody>
    </table>

</main>

<?php

// Close Connection

mysqli_close($db);

addTemplate('footer'); ?>