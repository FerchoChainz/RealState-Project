<?php 

// connection
require 'includes/app.php';

$db = DBconn();


// log errors 
$errors = [];

// Auth user
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Once we click in login, this code works when we send to server
    
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string( $db,filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));


    $password = mysqli_real_escape_string($db,$_POST['password']);

    // var_dump($email);

    if(!$email){
        $errors[] = "This email is not valid or is not correct";
    }

    if(!$password){
        $errors[] = "Password is incorrect";
    }

    // echo "<pre>";
    // var_dump($errors);
    // echo "</pre>";

    if(empty($errors)){

        // verify if user exist
        $query = " SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($db, $query);
        // var_dump($result);


        if($result -> num_rows){
            // validate password
            $user = mysqli_fetch_assoc($result);
            // var_dump($user);

            // password verify - 2nd argument is the hashed password
            $auth = password_verify($password, $user['password']);

            // var_dump($auth);

            if($auth){
                // User auth is correct
                session_start();

                // Fill session array 
                $_SESSION['user'] = $user['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');
                

            }else{
                // User auth is not correct
                $errors [] = "Password is not correct";
            }

        } else {
            $errors [] = "User not exist";
        }
    }

}



// header

addTemplate('header');
?>

    <main class="container section centered-content">
        <h1>Login</h1>

        <?php foreach ($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

        <form action="" method="POST" class="form">
            <fieldset>
            <legend>Email & Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Your email" id="email" novalidate  >

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your password" >
          </fieldset>


          <input type="submit" value="Login" class="button green-btn">
        </form>
    </main>

<?php addTemplate('footer'); ;?>