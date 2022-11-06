<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 

  <title>REPORTES | SISTEMA</title>
</head>
<body class=" p-3">
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <img src="{{public_path('img/logo.png')}}" width="260px" alt="">
            </div>
            <div class="col-6">
                <span class=" ">Listado de Asistencia de la Capacitacion: {{$capacitacion[0]->nombre}}</span>
                <p>Impartido por CADER: {{$capacitacion[0]->cader->nombre}} </p>
                <p>comunidad : {{$capacitacion[0]->cader->comunidad->comunidad}} </p>
                <span class="badge text-bg-info"> Total de Asistencia: {{ count($asistencias)}}</span>
            </div>
        </div>

        <div class="row">
     
            <h3 class="alert alert-success ">Listado de Asistencia</h3>
            <table class="table table-striped ">
                <thead class="alert alert-secondary">
                    <tr class="border border-secondary">
                    <th class="fs-6 border border-secondary">NO.</th>
                    <th class="fs-6 border border-secondary">NOMBRE COMPLETO</th>
                    <th class="fs-6 border border-secondary">DPI</th>
                    <th class="fs-6 border border-secondary">ASISTIO</th>
                    </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    @foreach ($asistencias as $a)
                    <tr id="todo{{$a->id}}">
                    <td class="border border-secondary">{{$a->id}}</td>
                        <td class="border border-secondary">{{$a->persona->nombres}} - {{$a->persona->apellidos}}</td>
                        <td class="border border-secondary">{{$a->persona->dpi}}</td>
                        <td class="border border-secondary">{{$a->asistio}}</td>
                        {{-- <td>{{$edad}}</td> --}}
                            
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-6">
                <span>Firma:_____________________________________________</span>
            </div>
            <div class="col-6">

                <span> Fecha impresion: {{\Carbon\Carbon::now()->toDateString()}}</span>
                <h4 class=" ">Sistema web @2022 Estudiante: Gerson Suriano</h4>
            </div>
        </div>
    </div>

 
</body>
</html>
