<?php $total = 0 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Boleta {{$number}}</title>
    </head>
    <body>
        <h1>Boleta: {{$number}}</h1>
        <h3>Fecha: {{$date}}</h3>
            <table>
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
                @foreach($products as $product)
                <?php $total =  ($total + $product->subtotal); ?>
                <tr>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->subtotal}}</td>
                </tr>
                @endforeach
            </table>
        <br/>
        <h2>Total: {{$total}}</h2>
    </body>
</html>
