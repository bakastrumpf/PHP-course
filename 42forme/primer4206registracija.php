<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="TŠ | MS" />
    <meta name="description" content="PHP: PHP basics" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#PHP42: Registracija</title>
</head>
<body>

<fieldset style="width: 300px;">
    <form >
        Име:
        <input type="text" name="ime">
        <br>
        Презиме:
        <input type="text" name="prezime">
        <br>
        Мејл:
        <input type="email" name="mejl">
        <br>
        Лозинка:
        <input type="text" name="lozinka">
        <br>
        Град:
        <select name="grad">
            <option value="1">Београд</option>
            <option value="2">Нови Сад</option>
            <option value="3">Шабац</option>
            <option value="4">Амстердам</option>
            <option value="5">Брисел</option>
        </select>
        <br>
        Годиште:
        <select name="godiste">
            <option value="1">1990</option>
            <option value="2">1991</option>
            <option value="3">1992</option>
            <option value="4">1993</option>
            <option value="5">1994</option>
        </select>
        <br>
        Месец:
        <select name="grad">
            <option value="1">јануар</option>
            <option value="2">фебруар</option>
            <option value="3">март</option>
            <option value="4">април</option>
            <option value="5">мај</option>
            <option value="6">јун</option>
            <option value="7">јул</option>
            <option value="8">август</option>
            <option value="9">септембар</option>
            <option value="10">октобар</option>
            <option value="11">новембар</option>
            <option value="10">децембар</option>
        </select>
        <br>
        Датум:
        <input type="date" name="datum">
        <br>
    </form>
    <input type="submit" name="posalji" value="Пошаљи">
</fieldset>
    
</body>
</html>