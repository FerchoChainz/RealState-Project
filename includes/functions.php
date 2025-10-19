<?php


define('TEMPLATES_URL', __DIR__ . '/templates');

define('FUNCTIONS_URL',__DIR__ . 'functions.php');

define('DIR_IMAGES', __DIR__ . '/../images/');

function addTemplate(string $name, bool $main = false){
    include TEMPLATES_URL ."/{$name}.php";
}

function isAuth() : bool {
    session_start();
    
    $auth = $_SESSION['login'];
    if($auth){

        return true;
    }

    return false;

}

function debbuger($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}


// scape HTML / sanitize HTML -- Helper
function s($html):string{
    $s = htmlspecialchars($html);

    return $s;
}

// Convert type currency

function currency($number){
    $locale = 'es_MX';
    $formatter = new NumberFormatter($locale,NumberFormatter::CURRENCY);

    echo $formatter->formatCurrency($number, 'MXN');
}


// TO DO: IMPLEMENT THE TYPE OF FORMAT PHONE NUMBER
function formattingPhone($phone){
    
    // Pass phone number in preg_match function
    if(preg_match(
        '/^\+[0-9]([0-9]{3})([0-9]{3})([0-9]{4})$/', 
    $phone, $value)) {
    
        // Store value in format variable
        $format = $value[1] . '-' . 
            $value[2] . '-' . $value[3];
    }
    else {
       
        // If given number is invalid
        echo "Invalid phone number <br>";
    }
    
}

// validate type content 
function validateTypeContent($type){
    $types = ['seller','propertie'];

    // search a string o value in array.
    return in_array($type, $types);
}

function showDialogMessage($code){
    $message = [
        'message'=> false,
        'class'=> ''
    ];

    switch ($code) {
        case 1:
            $message['message'] = 'Created Succesfully';
            $message['class'] = 'alert succes';
            break;
        case 2:
            $message['message'] = 'Updated Succesfully';
            $message['class'] = 'alert updated';
            break;
        case 3: 
            $message['message'] = 'Deleted Succesfully';
            $message['class'] = 'alert deleted';
            break;
        default:
            $message['message'] = false;
            break;
    }


    return $message;
}