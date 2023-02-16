<?php
    declare(strict_types=1);
    session_start();

        require_once ('model/database.class.php');

        try {
            $db = DB::getInstance();

            $sql = "SELECT CONCAT(jmeno, ' ', prijmeni) AS jmenoPrijmeni, login FROM zaci";
            $stm = $db->prepare($sql);
            $stm->execute();
            $jmena =  "";
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $jmena .= "<option value='" . $row["login"] . "'>" . $row["jmenoPrijmeni"] . "</option>";
            }

            $sql = "SELECT znamka, popis FROM znamky";
            $stm = $db->prepare($sql);
            $stm->execute();
            $znamky =  "";
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $znamky .= "<option value='" . $row["znamka"] . "'>" . $row["popis"] . "</option>";
            }

            $sql = "SELECT zkratka, nazev FROM predmety";
            $stm = $db->prepare($sql);
            $stm->execute();
            $predmety =  "";
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $predmety .= "<option value='" . $row["zkratka"] . "'>" . $row["nazev"] . "</option>";
            }
        } catch (Exception $e) {
            print $e->getMessage();
        }

    $datum = (new DateTime("NOW"))->format("Y-m-d");
    $page = file_get_contents("view/formular.php");
    $page =  str_replace("[@dnesniDatum]", $datum, $page);
    $page =  str_replace("[@jmena]", $jmena, $page);
    if (isset($_SESSION["stav"])) {
        $page =  str_replace("[@stav]", $_SESSION["stav"], $page);
    }else{
        $page =  str_replace("[@stav]", "", $page);
    }
    $page =  str_replace("[@znamka]", $znamky, $page);
    echo $page =  str_replace("[@predmet]", $predmety, $page);
    unset($_SESSION["stav"]);
?>

