<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#PHP40: prodaja</title>
</head>
<body>

    <form action="primer4003obracun.php">
        <input type="number" name="cena"/>
        <br>
        PDV stopa: 
        <select name="stopa">
            <option value="20">Opšta stopa</option>
            <option value="10">Posebna stopa</option>
        </select>
    <br>
    <input type="submit" value="obracunaj"/>
    </form>
    
</body>
</html>