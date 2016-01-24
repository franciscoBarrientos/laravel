<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Receta {{$pet->name}} {{$atention->created_at->format('Y-m-d')}}</title>
    </head>
    <body>
        <div style="width: 100%">
            <div><b>{{env('ENTERPRISE_NAME')}}</b></div>
            <div><b>{{env('ENTERPRISE_ADDRESS')}}</b></div>
            <div><b>{{env('ENTERPRISE_CITY')}}</b></div>
            <div><b>Fono: {{env('ENTERPRISE_PHONE')}}</b></div>
        </div>
        <br/>
        <div>
            <table style="width: 100%">
                <tr>
                    <td colspan="2">
                        <b>Fecha:</b> {{$atention->created_at->format('Y-m-d')}}
                    </td>
                    <td>
                        <b>N° de Ficha:</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <b>Nombre del Paciente: {{$pet->name}}</b>
                    </td>
                    <td >
                        <b>Fono:</b>&nbsp;
                        @if($client->phone != null && $client->cellphone != null)
                        {{$client->phone}} / {{$client->cellphone}}
                        @endif
                        @if($client->phone != null && $client->cellphone == null)
                        {{$client->phone}}
                        @endif
                        @if($client->phone == null && $client->cellphone != null)
                        {{$client->cellphone}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Especie:</b> {{$specie->species}}
                    </td>
                    <td>
                        <b>Raza:</b> {{$breed->name}}
                    </td>
                    <td>
                        <b>Edad:</b> {{$age}}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <b>Dirección:</b> {{$client->address}}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <b>Nombre del Propietario:</b> {{$client->name}} {{$client->lastname}}
                    </td>
                </tr>
            </table>
            <br/>
            <p><b>Rp.</b></p>
            <?php
                if(isset($atention->prescription)){
                    $textos = explode("\r\n", $atention->prescription);
                }

                foreach ($textos as $indice => $texto){
                    if($texto != null){
                        echo('<p style="text-align: justify;">'.$texto.'</p>');
                    }
                }
            ?>
            <hr>
            <p>{{env('FOOTER')}}</p>
        </div>
    </body>
</html>