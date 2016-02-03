<?php $total = 0 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Boleta {{$number}}</title>
    </head>
    <body>
        <div style="width: 100%">
            <div>{{env('ENTERPRISE_NAME')}}</div>
            <div>{{env('ENTERPRISE_ADDRESS')}}</div>
            <div>{{env('ENTERPRISE_CITY')}}</div>
            <div>Fono: {{env('ENTERPRISE_PHONE')}}</div>
        </div>
        <br/>
        <div>
            <h2>Boleta: {{$number}}</h2>
            <h3>Fecha: {{$date}}</h3>
        </div>
        <br/>
        <div>
            <table style="width: 100%;border-style: solid;border-width: 1px; border-collapse: collapse;">
                <tr>
                    <th style="width: 25%;text-align: left;border-style: solid;border-width: 1px;">Descripción</th>
                    <th style="width: 25%;text-align: left;border-style: solid;border-width: 1px;">Cantidad</th>
                    <th style="width: 25%;text-align: left;border-style: solid;border-width: 1px;">Precio Unitario</th>
                    <th style="width: 25%;text-align: left;border-style: solid;border-width: 1px;">Subtotal</th>
                </tr>
                @foreach($products as $product)
                <?php $total =  ($total + $product->subtotal); ?>
                <tr>
                    <td style="border-style: solid;border-width: 1px;">{{$product->description}}</td>
                    <td style="border-style: solid;border-width: 1px;">{{$product->quantity}}</td>
                    <td style="border-style: solid;border-width: 1px;">{{$product->price}}</td>
                    <td style="border-style: solid;border-width: 1px;">{{$product->subtotal}}</td>
                </tr>
                @endforeach
            </table>
            <h3>Total: {{$total}}</h3>
        </div>
    </body>
</html>
