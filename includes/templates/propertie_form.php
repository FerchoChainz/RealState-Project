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

<fieldset>
    <legend>Seller</legend>
        <label for="seller">Seller</label>
        <select name="propertie[sellers_id]" id="seller">
            <option value="selected value">--Select one seller--</option>

            <?php foreach($sellers as $seller){ ?>
                <option
                <?php echo $propertie->sellers_id === $seller->id ? 'Selected' : ''; ?>
                value="<?php echo s($seller->id); ?>"><?php echo s($seller->name) . " " . s($seller->last_name); ?></option>
                <?php } ?>

        </select>

</fieldset>