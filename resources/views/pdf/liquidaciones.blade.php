
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reibo de Liquidacion de Sueldos</title>
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
    background-color: #4CAF50;
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
  <h2>Datos Personales del Empleado</h2>
  <div>
  <h3>
  <ul>
    <li>Nombre:{{$dliq->user->name}}</li>
    <li>Apellido:{{$dliq->user->apellido}}</li>
    <li>Turno: {{$dliq->user->turno}}</li>
    <li>Fecha de ingreso: {{\Carbon\Carbon::createFromDate($dliq->user->create_at)->age}}</li>
    <li>Antiguedad: xxxx</li>
    <li>Periodo:{{$dliq->periodo}}</li>
    <li>Desde:{{\Carbon\Carbon::parse($dliq->desde)->format('d-m-Y')}}</li>
    <li>Hasta:{{\Carbon\Carbon::parse($dliq->hasta)->format('d-m-Y')}}</li>
  </ul>
  </h3>
  </div>
  <div class="attendance-table">
      <table class="table-bordered">
        <tr>
          <th class="attendance-cell"><strong>ID Concepto</strong></th>
          <th class="attendance-cell">CONCEPTO</th>
          <th class="attendance-cell">HABERES</th>
          <th class="attendance-cell">DEDUCCIONES</th>
          <th class="attendance-cell">IMPORTE</th>
          <th class="attendance-cell">UNIDADES</th>
       
        </tr>
        
            @foreach($dliq->detalleliquidacions as $l)
            <tr>
            <td class="attendance-cell">{{$l->concepto->id}}</td>
            <td class="attendance-cell">{{$l->concepto->descripcion}}</td>
            <td class="attendance-cell">${{$l->subTotalH}}</td>
            <td class="attendance-cell">${{$l->subTotalD}}</td>
            <td class="attendance-cell">{{$l->concepto->importe}}</td>
            <td class="attendance-cell">{{$l->unidad}}</td>
            </tr>
            @endforeach
        
      </table>
      <p><h3>Total Sueldo Neto: ${{$dliq->sueldoNeto}}</h3><p> 
      <h3>Total Sueldo Bruto: ${{$dliq->sueldoBruto}}</h3>
      </div>
    <div><h3>Fecha de Emision del recibo:{{\Carbon\Carbon::now()->format('d-m-Y')}}</h3></div>
</body>
</html>
