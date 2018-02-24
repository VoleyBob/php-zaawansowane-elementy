<?php
if (isset($_POST['value']) &&  isset($_POST['currency'])) {
    //Pobiranie file_get_contents z http://api.nbp.pl/api/exchangerates/tables/A/
    //Przy użyciu file_get_contents (parsowanie json - json_decode(string, true)) zaisać do tablicy kursy wszystkich walut w stosunku do PLN
    //Tablice zapisać do cache
    //Obliczyć kurs wg przesłanej waluty i wartości

    $value = $_POST['value'];
    $currency = $_POST['currency'];

    $data = file_get_contents("http://api.nbp.pl/api/exchangerates/tables/A/");

    /**
     * array(
     * 'EUR' => 4.3232,
     * 'USD' => 3.3234,
     * ...)
     */

    // var_export(json_decode($data, true));
       $kursy = json_decode($data, true);
    // print("<pre>".print_r($kursy, true)."</pre>");  
    // $dolar = $kursy[0]["rates"][1]["mid"];
    // $dolar = $kursy[0]["rates"][1]["code"];
    // echo $dolar;

    foreach($kursy[0]["rates"] as $waluta){
        echo $waluta["code"];
        if($waluta["code"] === $currency){
            echo "find";
        }
    }


  //    header("Location: index.php?val=$dolar");


}  else {
    die("Błędne dane");
}