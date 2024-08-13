<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$heading = "Create Note";

$errors = [];

$note = $_POST['body'];

if(!Validator::string($_POST['body'],1,200)){
    $errors['body'] = 'A body of no more than 200 characters is required';
}

// if(strlen($note) > 500){
//     $errors['body'] = 'A body can not be more than 500 characters.';
// }

if(!empty($errors))
{
    return view('notes/create.view.php', compact('heading','errors'));
}


$db->query("INSERT INTO notes(body,user_id) VALUES (:note, :user_id)", [
    'note' => $note,
    'user_id' => 1,
]);

header('location: /notes');
die();