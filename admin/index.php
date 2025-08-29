<?php

$result = $_GET['result'] ?? null;

require '../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Admin RealState</h1>

    <?php if(intval($result) === 1): ?>
        <p class="alert succes">Ad created successfully</p>
    <?php endif; ?>

    <a href="/admin/properties/create.php" class="button green-btn">New Propertie</a>
</main>

<?php addTemplate('footer'); ?>