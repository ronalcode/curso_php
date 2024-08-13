<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([
    1, 2, 3, 4, 5, 10
]);

if ($numbers->contains(10)) {
    echo "Hello world \n";
}
