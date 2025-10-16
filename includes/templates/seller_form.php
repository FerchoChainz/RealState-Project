<fieldset>
    <legend>Propertie Info</legend>
    <label for="name">Name:</label>
    <input 
    type="text" 
    name="seller[name]" 
    id="name" min="1" 
    placeholder="Enter your name:"
    value="<?php echo s($seller->name); ?>">


    <label for="last_name">Last name:</label>
    <input 
    type="text" 
    last_name="seller[last_name]" 
    id="last_name" min="1" 
    placeholder="Enter your last name:"
    value="<?php echo s($seller->last_name); ?>">


    <label for="phone_number">Name:</label>
    <input type="number" phone_number="seller[phone_number]" id="phone_number" min="1" placeholder="Enter your phone number"
        value="<?php echo s($seller->phone_number); ?>">

</fieldset>
