<?php
    declare(strict_types=1);
    session_start();

    if (!(!isset($_POST["login"]) || $_POST["login"] == "") && !(!isset($_POST["datum"]) || $_POST["datum"] == "") && !(!isset($_POST["predmet"]) || $_POST["predmet"] == "") && !(!isset($_POST["znamka"]) || $_POST["znamka"] == "")) {
        echo $login = $_POST["login"];
        echo $datum = $_POST["datum"];
       
        echo $predmet = $_POST["predmet"];
       
        echo $znamka = $_POST["znamka"];
        require_once ('model/database.class.php');
        try {
            $db = DB::getInstance();
            $sql = "SELECT CONCAT(jmeno, ' ', prijmeni) AS jmenoPrijmeni FROM zaci WHERE login = ?";
            $stm = $db->prepare($sql);
            $stm->execute([$login]);
            $pomocnaBool = false;
            while($row = $stm->fetch(PDO::FETCH_ASSOC))
            
            {
                $pomocnaBool = true;
                $jmenoPrijmeniStav = $row["jmenoPrijmeni"];
            }
        } catch (Exception $e) {
            print $e->getMessage();
            $_SESSION["stav"] = $e->getMessage();
        }


            if ($pomocnaBool) 
            {
                if (!vlozZnamku($login, new Datetime($datum), $predmet, $znamka)) 
                {
                    $_SESSION["stav"] = "Chyba v zapisu do databáze!!!";
                }else{
                    $_SESSION["stav"] = "Byl vytvořen záznam pro " . $jmenoPrijmeniStav . " známka: " . $znamka;
                }
            }else{
                $_SESSION["stav"] = "Byl zadán neexistující login!!!";
            }


    }else{
        $_SESSION["stav"] = "Vyplňte všechny údaje!!!";
    }

    function vlozZnamku(String $login, DateTime $datum, String $predmet, String $znamka): Bool{
        try {

            $db = DB::getInstance();

            $sql = "INSERT INTO znamkyZaku (login, znamka, datum, predmet) VALUES (?,?,?,?)";

            $stm = $db->prepare($sql);
            $stm->execute([$login, $znamka, $datum->format("Y-m-d"), $predmet]);
        } catch (Exception $e) {
            print $e->getMessage();
            $_SESSION["stav"] = $e->getMessage();
            return false;
        }
        return true;
    }
    header("location: index.php");
    exit();
?>