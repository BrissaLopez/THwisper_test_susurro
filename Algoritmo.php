<?php

include("phpMQTT.php");



class Algoritmo{

     //private $ciclo; //variable que inicia el test
     
     private $grupo_uno;
     private $grupo_dos;
     private $grupo_tres;
     private $grupo_cuatro;
     private $grupo_cinco;
         
     private $grupo;
         
     private $listado;
     
     private $palabra1;
     private $palabra2;
     private $palabra3;
     private $palabra4;
  
     
     //private $nombrePalabra;
     
     //private $numeroPalabra;
         

	//constructor
     public function __construct(){
          $this->grupo_uno = [1=>"amo", 2=>"cruel", 3=>"cuna", 4=>"doce",5=>"humo",6=>"luca",
                7=>"mano",8=>"mono", 9=>"mudo", 10=>"mulo", 11=>"nado", 12=>"nieve", 13=>"nube", 14=>"nueve",15=>"nuez",
                16=>"once", 17=>"tuno", 18=>"turco", 19=>"tuyo", 20=>"uno"];
          
          $this->grupo_dos = [21=>"bar", 22=>"buey", 23=>"cal", 24=>"club", 25=>"dios", 26=>"flan", 27=>"luis", 28=>"para",
              29=>"pez", 30=>"por", 31=>"quien", 32=>"rey", 33=>"riel", 34=>"sal", 35=>"tul", 36=>"vial", 37=>"voy"];
          
          $this->grupo_tres =[38=>"baño", 39=>"bar", 40=>"barra", 41=>"bata", 42=>"besa", 43=>"beso", 44=>"boca", 45=>"par",
              46=>"parra", 47=>"pelo", 48=>"pesa", 49=>"peso", 50=>"pez", 51=>"pino", 52=>"poca", 53=>"vez", 54=>"vino"];
          
          $this->grupo_cuatro = [55=>"boca", 56=>"boda", 57=>"codo", 58=>"condado", 59=>"contado", 60=>"domar", 61=>"saldar", 62=>"saltado",
              63=>"saltar", 64=>"seda", 65=>"soldado", 66=>"tienda", 67=>"tiendo", 68=>"tienta", 69=>"tiento", 70=>"tomar", 71=>"zeta"];
          
          $this->grupo_cinco = [72=>"cama", 73=>"cana", 74=>"casa", 75=>"caucho", 76=>"coma", 77=>"corro", 78=>"gama", 79=>"gana", 
              80=>"gasa", 81=>"gaucho", 82=>"goloso", 83=>"goma", 84=>"gorro", 85=>"guita", 86=>"quita", 87=>"toca", 88=>"toga", 89=>"vaca"];
          
          $this->listado = ["grupo1", "grupo2", "grupo2", "grupo4", "grupo5"];
           
    }
        


    public function iniciarTest(){
            //Se iniciará por el oido derecho
            //echo "Estoy en el Algoritmo";
        
        $grupo = array_rand($this->listado,2);
                    
        //Obtengo 2 grupos de palabras distintos sin que se repitan
        $grupoString1 = $this->listado[$grupo[0]];
        $grupoString2 = $this->listado[$grupo[1]];
        
            
            //primer ciclo for indicará las veces que se repite el examen (dos veces, una por cada oido)
        for($ciclo = 0; $ciclo <=2; $ciclo++){
                
            if($ciclo == 1){
                
                $this->seleccionaGrupo($grupoString1, $ciclo);
            }
            
            if($ciclo == 2){ //si ciclo == 2, se hace el oído izquierdo
                
                $this->seleccionaGrupo($grupoString2, $ciclo);
                    
            }
        }
    }
    
    public function seleccionaGrupo($grupoString, $ciclo){           
                    
        echo "      Se ha escogido: ".$grupoString;
                    
        //dependiendo del grupo escogido, se comenzará con la selección de palabras del grupo
                    
        if(strcmp($grupoString, "grupo1")== 0){
            echo " = grupo1"."<br>";
                    
            $palabrasSeleccionadas = array_rand($this->grupo_uno, 2);
                
            $this->seleccionaPalabra($palabrasSeleccionadas, $ciclo);
                    
        }else if (strcmp($grupoString, "grupo2")== 0){
            echo " = grupo2"."<br>";
            $palabrasSeleccionadas = array_rand($this->grupo_dos, 2);
            $this->seleccionaPalabra($palabrasSeleccionadas, $ciclo);
                    
        }else if (strcmp($grupoString, "grupo3")== 0){
            echo " = grupo3"."<br>";
                    
            $palabrasSeleccionadas = array_rand($this->grupo_tres, 2);
            $this->seleccionaPalabra($palabrasSeleccionadas,$ciclo);
                    
        }else if (strcmp($grupoString, "grupo4")== 0){
            echo " = grupo4"."<br>";
                    
            $palabrasSeleccionadas = array_rand($this->grupo_cuatro, 2);
            $this->seleccionaPalabra($palabrasSeleccionadas, $ciclo);
                    
        }else if (strcmp($grupoString, "grupo5")== 0){
            echo " = grupo5"."<br>";
                    
            $palabrasSeleccionadas = array_rand($this->grupo_cinco, 2);
            $this->seleccionaPalabra($palabrasSeleccionadas, $ciclo);
                    
        }else {
            echo " Ha habido un error al escoger un grupo";
        }
        
        //manda a Node-RED para enviar por mqtt
        //header("Location:http://127.0.0.1:1880/test?palabra1=$this->palabra1&palabra2=$this->palabra2&palabra3=$this->palabra3&palabra4=$this->palabra4");
        //$this->pubSub();
    }
    
    
    public function seleccionaPalabra($arrayPalabrasAleatorias, $ciclo){
        
        foreach ($arrayPalabrasAleatorias as $indicePalabra => $nombrePalabra){
            
       
            if($ciclo==1){
                if($indicePalabra ==0){
                    $this->palabra1= $nombrePalabra;
                   
                }
                if($indicePalabra ==1){
                    $this->palabra2= $nombrePalabra;
                  
                }
             
                
            }
            if($ciclo==2){
                if($indicePalabra ==0){
                    $this->palabra3= $nombrePalabra;
                   
                }
                if($indicePalabra ==1){
                    $this->palabra4= $nombrePalabra;
                   
                }
               
            }
            
            //echo " ".$indicePalabra." = ".$nombrePalabra."<br>";
            
        }
        
    }
   
    
    public function pubSub(){
        $mqtt = new phpMQTT("lossolos.hopto.org", 1883, "ClientID".rand());
        
        $repeticion["repeticion"]= array('qos' => 2);
        
        $contador = 0;
        
        
        
        if ($mqtt->connect(true,NULL,"","")) {
            
            
            //suscribir
            $mqtt->subscribe($repeticion, 2);
            //$mqtt->close();
            
            
            //publicar
            if($this->palabra1 != ""){
                $mqtt->publish("Pista",$this->palabra1, 0);
                
                $contador++;
                
                echo " ".$this->palabra1;

                //$mqtt->close();

              
            }
            if($this->palabra2 != ""){
                $mqtt->publish("Pista",$this->palabra2, 0);
                
                $contador++;
                
                echo " ".$this->palabra2;

                //$mqtt->close();

             
            }
            
            if($this->palabra3 != "" ){
                $mqtt->publish("Pista",$this->palabra3, 0);
                
                $contador++;
                
                echo " ".$this->palabra3;

                //$mqtt->close();

         
            }
            
            if($this->palabra4 != ""){
                $mqtt->publish("Pista",$this->palabra4, 0);
                
                $contador++;
                
                echo " ".$this->palabra4;
       
            }
            
            if($contador ==4){
                echo ' ---> Se ha terminado la ejecución del test';
            }
            
            else{
            
                if($repeticion[0] != "repeticion"){
                    echo 'No hay respuesta aun por parte del usuario.';
                }
            }
            
            $mqtt->close();
             
             
            
        }
        
    }
        
      
  

}

?>