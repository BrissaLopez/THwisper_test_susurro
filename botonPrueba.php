


<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Botón de prueba</h1>
        <form  method="POST" >
            
            <input type="submit"  name="inicioTest" value="Iniciar Test" >
            
            <?php
                include"Algoritmo.php";
                if(isset($_POST['inicioTest'])) {  //recibir la orden del botón de iniciar el test
                    $algoritmo = new Algoritmo();
                    $algoritmo->iniciarTest();
                    $algoritmo->pubSub();

                } 
            ?>
             
        </form>
        
     
    </body>
</html>
