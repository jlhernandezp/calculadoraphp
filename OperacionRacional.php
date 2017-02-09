<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperacionReal
 *
 * @author JL
 */
class OperacionRacional extends Operacion {
    
    public function __construct($operacion) {
        parent::__construct($operacion);
    }
    
    public function opera() {
        
        $needle = '[\/]';
        $numerador1 = strtok($this->operando1,$needle);
        $denominador1 = strtok($needle);
        
        if ($denominador1 == NULL) {
            
            $denominador1 = 1;
        }
        
        $numerador2 = strtok($this->operando2,$needle);
        $denominador2 = strtok($needle);
        
        if ($denominador2 == NULL) {
            
            $denominador2 = 1;
        }
        if (($numerador1==NULL)||(($numerador2==NULL))){
            
            return "ERROR";
        }
        
        switch ($this->operacion) {
            case "+":
                return $this->suma($numerador1,$denominador1,$numerador2,$denominador2);
                break;
            case "-":
                return $this->resta($numerador1,$denominador1,$numerador2,$denominador2);
                break;
            case "*":
                return $this->multiplica($numerador1,$denominador1,$numerador2,$denominador2);
                break;
            case ":":
                return $this->divide($numerador1,$denominador1,$numerador2,$denominador2);
                break;
        }
      // echo "Operacion Racional".$numerador1." ".$denominador1;
      // echo "Operacion Racional".$numerador2." ".$denominador2;
  
    }
    
    public function multiplica($numerador1,$denominador1,$numerador2,$denominador2) {
        
        $numerador = $numerador1*$numerador2;
        $denominador = $denominador1*$denominador2;
        
        return $numerador/$denominador;
    }
    
    public function divide($numerador1,$denominador1,$numerador2,$denominador2) {
        
        $numerador = $numerador1*$denominador2;
        $denominador = $denominador1*$numerador2;
        
        return $numerador/$denominador;
    }
    
    public function suma($numerador1,$denominador1,$numerador2,$denominador2) {
        
        $numerador = ($numerador1*$denominador2) + ($numerador2 * $denominador1);
        $denominador = $denominador1 * $denominador2;
        echo $numerador."/".$denominador;
        return $numerador/$denominador;
    }

    public function resta($numerador1,$denominador1,$numerador2,$denominador2) {
        
        $numerador = ($numerador1*$denominador2) - ($numerador2 * $denominador1);
        $denominador = $denominador1 * $denominador2;
        echo $numerador."/".$denominador;
        return $numerador/$denominador;
    }
    
}
