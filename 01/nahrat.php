<?php

declare(strict_types=1);

$loginForm = $_POST['login'];;
$predmetForm = $_POST['predmet'];
$znamkaForm = $_POST['znamka'];
$datumForm = $_POST['datum'];


function zapis(string $login, string $predmet, string $znamka, string $datum)
{
    $db = new PDO("mysql:localhost;charset=utf8;dbname=znamky", "root", "");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stmtUZ = $db->query("SELECT * FROM uzivatele");
    $stmtPR = $db->query("SELECT * FROM predmety");
    if ($stmtUZ->rowCount() > 0 && $stmtPR->rowCount()) {
        $stmt = $db->prepare("INSERT INTO znamky(login, predmet, datum, znamka) VALUES (:login, :predmet, :datum, :znamka)");
        $stmt->execute(
            [
                ":login" => $login,
                ":predmet" => $predmet,
                ":datum" => $datum,
                ":znamka" => $znamka
            ]
        );
        echo "zaznam vytvořen";
    }
}

zapis($loginForm, $predmetForm, $znamkaForm, $datumForm);
