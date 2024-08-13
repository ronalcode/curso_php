<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Session;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (!empty($errors)) {
    Session::flash('errors', $errors);
    Session::flash('old', [
        'email' => $email
    ]);
    redirect('/register');
    // return view('registration/create.view.php', compact('errors'));
}

$db = App::resolve(Database::class);

$user = $db->query('select * from  users where email = :email', ['email' => $email])->find();


if ($user) {
    header('location: /');
    die();
}

$db->query('INSERT INTO users (email, password) VALUES(:email,:password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT), //Es posible usar también PASSWRD_DEFAULT PERO POR DEFECTO USA BCRYPT ASÍ QUE SE PODRÍA DECIR QUE ES LO MISMO
]);

(new Authenticator)->login($user);

header('location: /');
die();
