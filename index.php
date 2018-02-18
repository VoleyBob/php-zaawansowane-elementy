<?php

declare(strict_types=1);

require_once 'APCu.php';
const A = 'A';
const B = 'B';
$acpu = new APCu(3600, A);
$s = microtime(true);
if ($test = $acpu->get("number3")) {
    /**
     * Każde kolejne wykonanie skryptu przez godzinę
     */
//    var_dump(2);
//    echo $test;
} else {
    /**
     * Pierwsze wykoanie skryptu
     */
//    var_dump(1);
    $test = 0;
    for ($i = 0; $i < 1000000; $i++) {
        $test += $i * $i + 10;
    }
    $acpu->add("number3", $test);
//    echo $test;
}
var_dump(microtime(true) - $s);
//$acpu->add("number", $test);
//$acpu2 = new APCu(3600, B);
//$acpu3 = new APCu(3600, "C");
//
//$acpu->add("test", "test value");
//$acpu2->add("test", "test value2");
//$acpu3->add("test", "test value3");
//
//echo $acpu->get("test") . '<br />';
//echo $acpu2->get("test") . '<br />';
//echo $acpu3->get("test") . '<br />';
//
//apcu_store("A" . '_' . "test", "test value");