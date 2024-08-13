<?php

use Core\Authenticator;

(new Authenticator)->logout();

header('location: /');

exit(); //Or die() it's similar