
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
}</style>
</head>
<body>
  <h3><p>Nombre:{{$dliq->user->name}}</p>
    <p>Apellido:{{$dliq->user->apellido}}</p>
     <p>Turno: {{$dliq->user->turno}}</h3></p>
  
  <div class="attendance-table">
      <table class="table-bordered">
        <tr>
          <th class="attendance-cell">ID DLiq</th>
          <th class="attendance-cell">ID Concepto</th>
          <th class="attendance-cell">CONCEPTO</th>
          <th class="attendance-cell">HABERES</th>
          <th class="attendance-cell">DEDUCCIONES</th>
          <th class="attendance-cell">IMPORTE</th>
          <th class="attendance-cell">UNIDADES</th>
  
        </tr>
        
            @foreach($dliq->detalleliquidacions as $l)
            <tr>
            <td class="attendance-cell">{{$l->id}}</td>
            <td class="attendance-cell">{{$l->concepto->id}}</td>
            <td class="attendance-cell">{{$l->concepto->descripcion}}</td>
            <td class="attendance-cell">{{$l->subTotalH}}</td>
            <td class="attendance-cell">{{$l->subTotalD}}</td>
            <td class="attendance-cell">{{$l->concepto->importe}}</td>
            <td class="attendance-cell">{{$l->unidad}}</td>
            </tr>
            @endforeach
        
      </table>
      <p><h3>Total Sueldo Neto: ${{$dliq->sueldoNeto}}</h3><p> 
      <h3>Total Sueldo Bruto: ${{$dliq->sueldoBruto}}</h3>
      </div>
   
</body>
</html>
