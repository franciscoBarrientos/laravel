<?php

namespace Veterinaria\Http\Controllers;

class UtilsController{
    public static function validateRut($rut, $dv){

        $rutArray[0] = $rut;
        $rutArray[1] = $dv;

        $rutNew = str_replace(".", "", trim($rutArray[0]));
        $factor = 2;
        $sum = 0;

        for($i = strlen($rutNew)-1; $i >= 0; $i--):
            $factor = $factor > 7 ? 2 : $factor;
            $sum += $rutNew{$i}*$factor++;
        endfor;

        $rest = $sum % 11;
        $dv = 11 - $rest;

        if($dv == 11){
            $dv = 0;
        }else if($dv == 10){
            $dv = "k";
        }

        if($dv == trim(strtolower($rutArray[1]))){
            return true;
        }else{
            return false;
        }
    }

    public static function calculateAge($birthDate){
        $date2 = date('Y-m-d');//
        $diff = abs(strtotime($date2) - strtotime($birthDate));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $date = $years.' años '.$months.' meses '.$days.' días';
        return $date;
    }
}