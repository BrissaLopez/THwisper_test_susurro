

<?php



class Algoritmo{

	 private $ciclo;
         
         private $grupo_uno_derecha= array("amo"=>1, "cruel"=>2, "cuna"=>3, "doce"=>4,"humo"=>5,"luca"=>6,
                "mano"=>7,"mono"=>8, "mudo"=>9, "mulo"=>10, "nado"=>11, "nieve"=>12, "nube"=>13, "nueve"=>14,"nuez"=>15,
                "once"=>16, "tuno"=>17, "turco"=>18, "tuyo"=>18, "uno"=>19);
         private $grupo_dos_derecha=array("bar"=>20, "buey"=>21, "cal"=>22, "club"=>23, "dios"=>24,);
         
         private $grupo;
         
         private $listadoDerecha;
         

	//constructor
	public function _construct(){
          
           
	}


	public function iniciarTest(){
            //Se iniciará por el oido derecho
            //echo "Estoy en el Algoritmo";
            $listadoDerecha = ["grupo1", "grupo2", "grupo2", "grupo4", "grupo5"];
            
            //primer ciclo for indicará las veces que se repite el examen (dosveces, una por cada oido)
            for($ciclo = 0; $ciclo <=2; $ciclo++){
                
                if($ciclo == 1){
                    
                    
                    $grupo = array_rand($listadoDerecha);
                    
                    $grupoString = $listadoDerecha[$grupo];
                    
                    
                    echo "      Se ha escogido: ".$grupoString;
                    
                    //dependiendo del grupo escogido, se comenzará con la selección de palabras del grupo
                    
                    if(strcmp($grupoString, "grupo1")== 0){
                        echo "Estoy dentro de la comparación de nombre de grupo";
                    }else{
                        echo "no son iguales";
                    }
                   
                    
                   
                    
                    
                }
                if($ciclo == 2){
                    
                }
                
            }
            

	}
        
      


}

?>