

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
<?php
// create curl resource
$ch = curl_init();   // przygotowujemy obiekt

curl_setopt($ch, CURLOPT_ACCEPT_ENCODING, 'gzip');

//curl_setopt($ch, CURLOPT_TIMEOUT_MS, 3000);

// set url
curl_setopt($ch, CURLOPT_URL, "https://wp.pl");

//
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

var_dump(curl_exec($ch));
curl_close($ch);


exit;

?>
    </body>
</html>


<!-- 
//
$output = curl_exec($ch);

// close curl resource to free up system resources












exit;

/*
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="currencies.php" method="post">
            <label for="value">Kwota</label>
            <input type="text" id="value" value="" name="value">

            <select name="currency">
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
                <option value="USD">USD</option>
                <option value="CHF">CHF</option>
            </select>
            <input type="submit" />
        </form>
        -->
        <!-- <?php //var_dump($_GET); ?> -->
        <!--        
        <?php if (!empty($_GET['val'])) :?>
            <input value="<?php echo $_GET['val'];?>" disabled>

        <?php endif; ?>
    </body>
</html>*/ -->