<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id",[
    'id' => $id
])->findOrFail();


authorize($note['user_id'] === $currentUserId); 

$heading = "Edit Note";

$errors = [];

view('notes/edit.view.php', compact('heading','errors','note'));