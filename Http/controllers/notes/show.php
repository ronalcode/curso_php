<?php

// use Core\Database;

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
// $config = require base_path('config.php');

// $db = new Database($config['database'], 'root','Theking19');

$heading = "Note";

$id = $_GET['id'];

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id",[
    'id' => $id
    ])->findOrFail();


authorize($note['user_id'] === $currentUserId);    

view('notes/show.view.php', compact('heading','note'));
