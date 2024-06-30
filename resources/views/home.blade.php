@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="text-left"><b>HOME </b><img src="{{ asset('img/logottr.png') }}" width="60" height="60"></h1>
            </div>
            <div class="col-6">
                <h1 class="text-right"><b> {{ now()->format('d/m/y') }} </b></h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="text-center">
        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/user.png') }}" class="img-circle" width="200" height="200">
        <br><br>
    </div>
    <h5 class="text-center"><b>¡{{ Auth::user()->name }}!</b> 
        <br><br>
        Bienvenido a la plataforma de tutorías TTR-APP, 
        aquí podras gestionar tus sesiones de tutoría conforme a tus necesidades y al Programa Institucional de 
        Tutorías del Instituto Politécnico Nacional.
        <br><br>
    </h5>
    
        <div class="container">
        <div class="row">
            @can('mentor.index')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Consultar Sesiones de Tutoría</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/calen.png') }}" width="50" height="50">
                            <br><br>
                            <a href="#" class="btn btn-primary">Ver Citas</a>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            @can('mentor.index')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Confirmar Solicitudes de Tutoría</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/confirmcalen.png') }}" width="50" height="50">
                            <br><br>
                            <a href="#" class="btn btn-primary">Confirmar Citas</a>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            @can('admin.mentors.index')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Gestionar Profesores Tutores</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/mentor.png') }}" width="50" height="50">
                            <br><br>
                            <a href="{{ route('admin.mentors.index') }}" class="btn btn-primary">Gestionar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            @can('admin.mentors.index')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Gestionar Alumnos Tutorados</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/mentoree.png') }}" width="50" height="50">
                            <br><br>
                            <a href="{{ route('admin.mentees.index') }}" class="btn btn-primary">Gestionar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            @can('mentee.index')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Mostrar Listado de Tutores</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/showmentors.png') }}" width="50" height="50">
                            <br><br>
                            <a href="{{ route('admin.mentors.index') }}" class="btn btn-primary">Mostrar Tutores</a>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            @can('mentee.index')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Mostrar Citas Confirmadas</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/confirmmeetings.png') }}" width="50" height="50">
                            <br><br>
                            <a href="#" class="btn btn-primary">Mostrar Mis Citas</a>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Figuras Tutoriales</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/mtypes.png') }}" width="50" height="50">
                            <br><br>
                            <a href="{{ route('mtypes.index') }}" class="btn btn-primary">Mostrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@stop

@section('css')
    <style>
    </style>
@stop

@section('js')
    <script>
    </script>
@stop
