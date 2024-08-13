<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$heading = "Note";

$id = $_POST['id'];

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id",[
    'id' => $id
    ])->findOrFail();


authorize($note['user_id'] === $currentUserId);  

$db->query('delete from notes where id = :id',[
    'id' => $_POST['id'],
]);

header('location: /notes');
die();
