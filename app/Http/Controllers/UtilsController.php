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
        $date2 = date('Y-m-d');
        $diff = abs(strtotime($date2) - strtotime($birthDate));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        if($years == 1){$yearAge = 'año';}
        else{$yearAge = 'años';}

        if($months == 1){$monthsAge = 'mes';}
        else{$monthsAge = 'meses';}

        if($days == 1){$daysAge = 'día';}
        else{$daysAge = 'días';}

        $date = $years.' '.$yearAge.' '.$months.' '.$monthsAge.' '.$days.' '.$daysAge;

        return $date;
    }

    public static function getColorButtonList(){
        $color = [
            'default'   =>  'Blanco',
            'primary'   =>  'Azul',
            'info'      =>  'Celeste',
            'green'     =>  'Verde',
            'success'   =>  'Verde Claro',
            'yellow'    =>  'Amarillo',
            'warning'   =>  'Amarillo Claro',
            'red'       =>  'Rojo',
            'danger'    =>  'Rojo Claro'
        ];

        return $color;
    }

    public static function getColorName($class){
        $color = '';
        if($class == 'default')
            $color = 'Blanco';
        if($class == 'primary')
            $color = 'Azul';
        if($class == 'info')
            $color = 'Celeste';
        if($class == 'green')
            $color = 'Verde';
        if($class == 'success')
            $color = 'Verde Claro';
        if($class == 'yellow')
            $color = 'Amarillo';
        if($class == 'warning')
            $color = 'Amarillo Claro';
        if($class == 'red')
            $color = 'Rojo';
        if($class == 'danger')
            $color = 'Rojo Claro';

        return $color;
    }
    
    public static function generateFontAwesomeHtml($fontAwesomes, $columnsNumber, $fontPixelSize){
        $html = '<div class="table-responsive"><table class="table">';
        $size = count($fontAwesomes);
        $j = 1;
        $i = 0;
        foreach($fontAwesomes as $id => $ico){
            if($i == $columnsNumber){$i = 0;}
            if($i == 0){$html .= '<tr>';}
            if($j < $size || ($j == $size && $i == ($columnsNumber-1))){$html .= '<td>';}
            else{$html .= '<td colspan="'.($columnsNumber-$i).'">';}
            $html .= '<i id="'.$id.'" class="fa '.$ico.'" style="font-size: '.$fontPixelSize.'px;cursor:pointer;" onclick="changeFontAwesome(this.id)"></i></td>';
            if($i == ($columnsNumber-1)){$html .= '</tr>';}
            $i++;
            $j++;
        }
        if($i<($columnsNumber-1)){$html .= '</tr>';}
        $html .= '</table></div>';
        return $html;
    }

    public static function getAlertTypeHtml($color,$id,$title,$font){
        $html = '<div class="col-lg-3 col-md-6">
                    <div class="panel panel-'.$color.'">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa '.$font.' fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="number'.$id.'"></div>
                                    <div>'.$title.'</div>
                                </div>
                            </div>
                        </div>
                        <a style="cursor: pointer" data-toggle="modal" data-target="#alertType'.$id.'">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="modal fade" id="alertType'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">'.$title.'</h4>
                            </div>
                            <div class="modal-body text-justify" id="alertTypeBody'.$id.'"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>';

        return $html;
    }
}