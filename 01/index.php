<?php
$db = new PDO("mysql:localhost;charset=utf8;dbname=znamky", "root", "");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>intranet</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

    <form method="post" action="nahrat.php">
        <label for="login">login</label>
        <select name="login" id="login" required>
            <?php
            $stmt = $db->query("SELECT * FROM uzivatele");
            $uzivatele = $stmt->fetchAll();
            foreach ($uzivatele as $row => $uzivatel) {
                echo '<option value="' . $uzivatel['id'] . '">' . $uzivatel['login'] . '</option>';
            }
            ?>
        </select>

        <br>
        <label for="predmet"> predmet</label>
        <select name="predmet" id="predmet" required>
            <?php
            $stmt = $db->query("SELECT * FROM predmety");
            $predmety = $stmt->fetchAll();
            foreach ($predmety as $row => $predmet) {
                echo '<option value="' . $predmet['id'] . '">' . $predmet['nazev'] . '</option>';
            }
            ?>
        </select>
        <br>
        <label for="znamka">znamka</label>
        <select name="znamka" id="znamka" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="N">N</option>
            <option value="U">U</option>
        </select>
        <br>
        <label for="datum">datum</label>
        <input type="date" name="datum" id="datum" required>
        <br>
        <input type="submit" value="Odeslat">
    </form>

</body>

</html>