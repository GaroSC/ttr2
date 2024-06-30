@extends('adminlte::page')

@section('title', 'Figuras Tutoriales')

@section('content_header')
    <h2 class="text-center"><b>Información Acerca de las Figuras Tutoriales</b></h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- 
                TABLA OCULTA 
            
                 <!-- Table Section -->
                <table class="table table-striped table-hover table-md">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mTypes as $mType)
                        <tr>
                            <td><b>{{ $mType->id }}</b></td>
                            <td>{{ $mType->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            --}}
           
            <br>
            <div class="text-center">
                <h1 class="fs-5"><b>Descripción de Figuras Tutoriales</b></h1>
                <br>
                <p>
                    <b>1. Tutoría grupal</b> <i>(anteriormente conocida como "Maestro Tutor").</i>
                    <br> 
                    Docente asignado a un grupo dentro de su carga académica durante un periodo escolar, 
                    que brinda acompañamiento con respecto de trámites, servicios y en su caso canaliza a la instancia correspondiente.
                </p>
                <p>
                    <b>2. Tutoría individual</b> <i>(anteriormente conocida como "Tutor Individual").</i> 
                    <br>
                    A petición de un alumno un docente lo acompaña a lo largo de su trayectoria escolar, 
                    brinda apoyo con respecto de temas académicos y personales, y en su caso realiza la canalización a las dependencias Politécnicas correspondientes.
                </p>
                <p>
                    <b>3. Tutoría de regularización</b> <i>(anteriormente conocida como "Tutor grupal").</i> 
                    <br>
                    Asesora en temas específicos de una unidad de aprendizaje a los alumnos que requieran reafirmar conocimientos, 
                    así como aquellos que no hayan acreditado.
                </p>
                <p>
                    <b>4. Tutoría de recuperación académica</b> <i>(anteriormente conocida como "Recuperación Académica por Tutorías").</i>
                    <br> 
                    Actividad autorizada por la Dirección de Coordinación correspondiente, 
                    misma que está dirigida a alumnos con dictamen académico y aquellos que adeuden materias de programas académicos en liquidación.
                </p>
                <p>
                    <b>5. Tutoría entre pares</b> <i>(anteriormente conocida como "Alumno Asesor").</i> 
                    <br>
                    Es un alumno que domina las temáticas de una Unidad de Aprendizaje y que en un horario asignado brinda apoyo académico a sus pares.
                </p>
                <p>
                    Para mayor información sobre el Programa Institucional de Tutorías, visitar el sitio web del IPN: 
                    <a href="https://www.ipn.mx/tutorias/" target="_blank"><i>https://www.ipn.mx/tutorias/</i></a>.
                </p>
                <a href="{{ route('home') }}" class="btn btn-secondary">Regresar</a>
                <br>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        p {
            text-align: justify;
        }
    </style>
@stop

@section('js')
    <script>
        
    </script>
@stop


