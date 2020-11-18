

<?php



class Algoritmo{

     private $ciclo; //variable que inicia el test
     
     private $grupo_uno;
     private $grupo_dos;
     private $grupo_tres;
     private $grupo_cuatro;
     private $grupo_cinco;
         
     private $grupo;
         
     private $listado;
     
     //private $nombrePalabra;
     
     //private $numeroPalabra;
         

	//constructor
     public function __construct(){
          $this->grupo_uno = ["amo"=>1, "cruel"=>2, "cuna"=>3, "doce"=>4,"humo"=>5,"luca"=>6,
                "mano"=>7,"mono"=>8, "mudo"=>9, "mulo"=>10, "nado"=>11, "nieve"=>12, "nube"=>13, "nueve"=>14,"nuez"=>15,
                "once"=>16, "tuno"=>17, "turco"=>18, "tuyo"=>18, "uno"=>19];
          
          $this->grupo_dos = ["bar"=>20, "buey"=>21, "cal"=>22, "club"=>23, "dios"=>24, "flan"=>25, "luis"=>26, "para"=>27,
              "pez"=>28, "por"=>29, "quien"=>30, "rey"=>31, "riel"=>32, "sal"=>33, "tul"=>34, "vial"=>35, "voy"=>36];
          
          $this->grupo_tres =["baño"=>37, "bar"=>38, "barra"=>39, "bata"=>40, "besa"=>41, "beso"=>42, "boca"=>43, "par"=>44,
              "parra"=>45, "pelo"=>46, "pesa"=>47, "peso"=>48, "pez"=>49, "pino"=>50, "poca"=>51, "vez"=>52, "vino"=>53];
          
          $this->grupo_cuatro = ["boca"=>54, "boda"=>55, "codo"=>56, "condado"=>57, "contado"=>58, "domar"=>59, "saldar"=>60, "saltado"=>61,
              "saltar"=>62, "seda"=>63, "soldado"=>64, "tienda"=>65, "tiendo"=>66, "tienta"=>67, "tiento"=>68, "tomar"=>69, "zeta"=>70];
          
          $this->grupo_cinco = ["cama"=>71, "cana"=>72, "casa"=>73, "caucho"=>74, "coma"=>75, "corro"=>76, "gama"=>77, "gana"=>78, 
              "gasa"=>79, "gaucho"=>80, "goloso"=>81, "goma"=>82, "gorro"=>83, "guita"=>84, "quita"=>85, "toca"=>86, "toga"=>87, "vaca"=>88];
          
          $this->listado = ["grupo1", "grupo2", "grupo2", "grupo4", "grupo5"];
           
    }
        


    public function iniciarTest(){
            //Se iniciará por el oido derecho
            //echo "Estoy en el Algoritmo";
        
            
            //primer ciclo for indicará las veces que se repite el examen (dosveces, una por cada oido)
        for($ciclo = 0; $ciclo <=2; $ciclo++){
                
            if($ciclo == 1){
                
                $this->seleccionaGrupo();
            }
            
            if($ciclo == 2){ //si ciclo == 2, se hace el oído izquierdo
                
                $this->seleccionaGrupo();
                    
            }
        }
    }
    
    public function seleccionaGrupo(){
        
        $grupo = array_rand($this->listado);
                    
                $grupoString = $this->listado[$grupo];
                    
                    
                echo "      Se ha escogido: ".$grupoString;
                    
                    //dependiendo del grupo escogido, se comenzará con la selección de palabras del grupo
                    
                if(strcmp($grupoString, "grupo1")== 0){
                    echo " = grupo1"."<br>";
                    
                    $palabrasSeleccionadas = array_rand($this->grupo_uno, 10);
                
                    $this->seleccionaPalabra($palabrasSeleccionadas);
                    
                }else if (strcmp($grupoString, "grupo2")== 0){
                    echo " = grupo2"."<br>";
                    $palabrasSeleccionadas = array_rand($this->grupo_dos, 10);
                    $this->seleccionaPalabra($palabrasSeleccionadas);
                    
                }else if (strcmp($grupoString, "grupo3")== 0){
                    echo " = grupo3"."<br>";
                    
                    $palabrasSeleccionadas = array_rand($this->grupo_tres, 10);
                    $this->seleccionaPalabra($palabrasSeleccionadas);
                    
                }else if (strcmp($grupoString, "grupo4")== 0){
                    echo " = grupo4"."<br>";
                    
                    $palabrasSeleccionadas = array_rand($this->grupo_cuatro, 10);
                    $this->seleccionaPalabra($palabrasSeleccionadas);
                    
                }else if (strcmp($grupoString, "grupo5")== 0){
                    echo " = grupo5"."<br>";
                    
                    $palabrasSeleccionadas = array_rand($this->grupo_cinco, 10);
                    $this->seleccionaPalabra($palabrasSeleccionadas);
                    
                }else {
                    echo " Ha habido un error al escoger un grupo";
                }
        
    }
    
    
    public function seleccionaPalabra($arrayPalabrasAleatorias){
        
        foreach ($arrayPalabrasAleatorias as $indicePalabra => $nombrePalabra){
            
            echo " ".$indicePalabra." = ".$nombrePalabra."<br>";
            
        }
        
        //var_export($arrayPalabrasAleatorias);
    }
        
      
  

}

?>