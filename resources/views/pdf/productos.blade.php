
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Listado General de Productos del Almacen Informatico</title>
  <style>
  .attendance-table table{
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #000;
}
.blank-cell{
  min-width: 50px;
}
.attendance-cell{
  padding: 8px;
}
.attendance-table table th.attendance-cell, .attendance-table table td.attendance-cell {
    border: 1px solid #000;
}
th {
    background-color:cornflowerblue;
    color: white;
}
h1 {
    background-color: #994432;
    color: white;
    border: 1px solid #000;
    position: center;
}

</style>
</head>
<body>
  <h1><center>TUS TECNOLOGIAS TUCUMAN</center></h1>
  <p><div>
    <img src="data:image/jpeg;base64,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" align="right">
  </div>
  <div>
    <p><b>Argentina-Tucuman-Rivadavia 1050</b></p>
    <p></b>Telefono:4277426</b></p>
    <p><b>Contacto: correo@gmail.com</b></p>
    <p><b>Fecha de Emision:{{\Carbon\Carbon::now()->format('d-m-Y')}}</b></p>
      </div></p>
  <p>
  <div class="attendance-table">
      <table class="table-bordered">
        <tr>
          <th class="attendance-cell"><strong>#PRODUCTO</strong></th>
          <th class="attendance-cell">DESCRIPCION</th>
          <th class="attendance-cell">PRECIO DE COSTO</th>
          <th class="attendance-cell">PRECIO DE VENTA</th>
          <th class="attendance-cell">CANTIDAD ACTUAL</th>
          <th class="attendance-cell">CANTIDAD MINIMA</th>
          <th class="attendance-cell">TIPO DE ARTICULO</th>
       
        </tr>
        
            @foreach($productos as $producto)
            <tr>
            <td class="attendance-cell">{{$producto->id}}</td>
            <td class="attendance-cell">{{$producto->descripcion}}</td>
            <td class="attendance-cell">${{$producto->precio_costo}}</td>
            <td class="attendance-cell">${{$producto->precio_venta}}</td>
            <td class="attendance-cell">{{$producto->stock->cantidad}}</td>
            <td class="attendance-cell">{{$producto->stock->minimo}}</td>
            <td class="attendance-cell">{{$producto->tipo->descripcion}}</td>
            </tr>
            @endforeach
        
      </table>
      </div></p>
</body>
</html>
