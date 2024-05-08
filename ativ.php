<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade</title>
</head>
<body>
    <form action="" method="POST">
        <select name="raca" id="carros">
            
            <option value="Tiefling.">Tiefling.</option>
            <option value="Genasi.">Genasi.</option>
            <option value="Dragonborn.">Dragonborn.</option>
            <option value="Harengon.">Harengon.</option>
            <option value="Elfo.">Elfo.</option>
            <option value="Gnomo.">Gnomo.</option>
            <option value="Tabaxi.">Tabaxi.</option>
            <option value="Halfling.">Halfling.</option>
            
        </select>
        <select name="classe" id="classe">
            <option value="Barbaro">Barbaro</option>
            <option value="Bardo">Bardo</option>
            <option value="Mago">Mago</option>
            
        </select>
        <input type="submit">
    </form>

    <?php 
        $raca = $_POST ["raca"];
        $classe = $_POST ["classe"];
        
       if ($raca == "Genasi." && $classe == "Barbaro") {
         $vida = 10;
         $mana = 3;
         $forca = 12;

         echo"Sua raça: $raca<br>Sua Classe: $classe<br>Sua vida: $vida<br>Sua mana: $mana<br>Sua Força: $forca";
       }else{
         echo"Precisa escolher certo ai";
       }
      
       

       

    ?>
</body>
</html>
      
       
    