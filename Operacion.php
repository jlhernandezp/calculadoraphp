<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of operacion
 *
 * @author JL
 */
abstract class Operacion {
    //put your code here
    protected $operando1;
    protected $operando2;
    protected $operacion;
    
    public function __construct($operacion) {
        // $token = '[\+|\-|\*|\:|\/]';
        $token = '[\+|\-|\*|\:]';
        
        $this->operando1 = strtok($operacion, $token);
        $this->operando2 = strtok($token);
        $this->operacion = substr($operacion, strlen($this->operando1),1);
        
 
    }
    
    public function getOperando1(){
        return $this->operando1;
    }
    
    public function getOperando2(){
        return $this->operando2;
    }
    
    public function getOperador(){
        return $this->operacion;
    }
    /** comprueba que la operacion es racional o no
     * @return String  Racional si la operación es racional,
     *                 Real en cualquier otro caso   
     */
    public function tipoDeOperacion($operacion){    
        $token = '[\+|\-|\*|\:]';
        
        $op1 = strtok($operacion, $token);
        $op2 = strtok($token);
        $oper = substr($operacion, strlen($op1),1);
        
        if ($oper==":"){
            return "Racional";
        }
        $needle = "/";
        if (strpos($op1,$needle)!==FALSE||strpos($op2,$needle)!==FALSE){
            return "Racional";
        }
        return "Real".$op1;
    }
}
