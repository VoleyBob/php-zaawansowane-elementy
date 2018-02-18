<?php

declare(strict_types=1);

// echo PHP_MAX_INT; // =>147483647
// echo phpinfo();

// apcu_clear_cache ();

$a = apcu_add("test", array(1,2,3,4));
if ($a) {
    echo "OK";
} else {
    echo "Błąd";
}

apcu_delete("test");


$a = apcu_add("test", array(1,2,3,4));
if ($a) {
    echo "OK";
} else {
    echo "Błąd";
}

echo PHP_EOL;
var_export(apcu_cache_info());
