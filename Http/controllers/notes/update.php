<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$id = $_POST['id'];

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id",[
    'id' => $id
])->findOrFail();

$errors = [];

authorize($note['user_id'] === $currentUserId);    

if(!Validator::string($_POST['body'],1,200)){
    $errors['body'] = 'A body of no more than 200 characters is required';
}

if(count($errors)){
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id',[
    'body' => $_POST['body'],
    'id' => $id
]);


header('location: /notes');
die();
