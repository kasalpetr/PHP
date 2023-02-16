<?php
declare(strict_types=1);
session_start();

if (isset($_POST["odhlasit"])) {
    unset($_SESSION["uzivatel"]);
    session_regenerate_id();
}

if (isset($_POST["jmeno"])) {
    $soubor = fopen('users.csv', 'r');
    while (($radek = fgetcsv($soubor)) !== FALSE) {          
        if (in_array($_POST["jmeno"], $radek)) {           
            if (password_verify($_POST["heslo"] ,$radek[4])) {
               $_SESSION["uzivatel"]["jmeno"] = $radek[9];
               $_SESSION["uzivatel"]["prijmeni"] = $radek[10];
            }
        }
        
    }
    fclose($soubor);
}
?>
<div id="prihlasit">

    <?php
    if (isset($_SESSION["user"]["jmeno"])) {
        echo "Přihlášen uživatel: " . $_SESSION["uzivatel"]["jmeno"] 
        . " " . $_SESSION["uzivatel"]["prijmeni"];
        echo "<br><form action='prihlaseni.php' method='post'>
         <input name='odhlasit' type='submit' value='Odhlásit'> </form>";


    } else {
        echo "uživatel nepřihlášen";
    }
    

    ?>
</div>
<br>

<form action="prihlaseni.php" method="post">

    Jméno: <input name="jmeno" type="text"><br>

    Heslo: <input name="heslo" type="password"><br>

    <input name="submit" type="submit" value="Přihlásit">
    
</form>
</div>