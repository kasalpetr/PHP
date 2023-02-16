<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <title>Formular</title>
</head>
<body>
    <div id="nadpis">
        <h1>Zadej známku</h1>
    </div>

    <form action="insert.php" method="post">
        <select name="jmena" id="jmena">
            <option value=''>Vyberte žáka...</option>
            [@jmena]
        </select>
        <input type="text" placeholder="Login"  readOnly name="login" id="login">
        <input type="date" value="[@dnesniDatum]" name="datum" id="datum">
        <select name="predmet" id="predmet">
            <option value=''>Vyberte předmět...</option>
            [@predmet]
        </select>
        <select name="znamka" id="znamka">
            <option value=''>Vyberte známku...</option>
            [@znamka]
        
        </select>
        <input type="submit" value="Vložit známku">
    
    </form>
    <div>

        <h1>[@stav]</h1>
    </div>
    <script src="static/script.js"></script>
</body>
</html>