<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = "My Notes";

$notes = $db->query("select * from notes where user_id = 1")->get();


// require "views/notes/index.view.php";
view('notes/index.view.php', compact('heading','notes'));