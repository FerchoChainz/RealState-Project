<fieldset>
    <legend>General Info</legend>

    <label for="tittle">Tittle:</label>
    <input type="text" id="tittle" name="propertie[tittle]" placeholder="Propertie tittle"
        value="<?php echo s($propertie->tittle); ?>">

    <label for="price">Price:</label>
    <input type="number" id="price" name="propertie[price]" placeholder="Propertie price"
        value="<?php echo s($propertie->price); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" name="propertie[image]" accept="image/jpeg, image/png">

    <?php if ($propertie->image): ?>
        <img src="/images/<?php echo $propertie->image ?>" alt="" class="small-img">
    <?php endif; ?>

    <label for="description">Description:</label>
    <textarea id="description" name="propertie[description]"><?php echo s($propertie->description); ?></textarea>
</fieldset>

<fieldset>
    <legend>Propertie Info</legend>
    <label for="rooms">Rooms:</label>
    <input type="number" name="propertie[rooms]" id="rooms" min="1" placeholder="Example: 3"
        value="<?php echo s($propertie->rooms); ?>">

    <label for="wc">Bathrooms:</label>
    <input type="number" name="propertie[wc]" id="wc" min="1" placeholder="Example: 3"
        value="<?php echo s($propertie->wc); ?>">

    <label for="parking">Parking Lot:</label>
    <input type="number" name="propertie[parking]" id="parking" min="1" placeholder="Example: 3"
        value="<?php echo s($propertie->parking); ?>">
</fieldset>

<!-- <fieldset>
    <legend>Seller</legend>

    <select name="sellers_id">
        <option value="">--SELECT--</option>
        <?php while ($row = mysqli_fetch_assoc($resultSellers)) : ?>
            <option
                <?php echo $seller === $row['id'] ? 'selected' : ''; ?>
                value="<?php echo $row['id'] ?>">


                <?php echo $row['name'] . " " . $row['last_name']; ?>
            </option>
        <?php endwhile ?>
    </select>
</fieldset> -->