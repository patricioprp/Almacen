<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h2><p>Nombre{{$dliq->user->name}}</p>
    <p>Apellido{{$dliq->user->apellido}}</p>
    Turno: {{$dliq->user->turno}}</h2>
  
  <div>
      <table>
        <thead>
          <th>CONCEPTO</th>
          <th>HABERES</th>
          <th>DEDUCCIONES</th>
          <th>IMPORTE</th>
          <th>UNIDADES</th>
  
        </thead>
        <tbody>
            @foreach($dliq->detalleliquidacions as $l)
            <tr>
            <td><p>{{$l->concepto->descripcion}}</p></td>
            <td>{{$l->subTotalH}}</td>
            <td>{{$l->subTotalD}}</td>
            <td>{{$l->concepto->importe}}</td>
            <td>{{$l->unidad}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <p><h3>Total Sueldo Neto: ${{$dliq->sueldoNeto}}</h3><p> 
      <h3>Total Sueldo Bruto: ${{$dliq->sueldoBruto}}</h3>
      </div>
  
  
</body>
</html>
