@extends('adminlte::page')

@section('title', 'Mostrar Tutores')

@section('content_header')
    <h2 class="text-center"><b>Información de Tutores</b></h2>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <!-- Table Section -->
        <table class="table table-striped table-hover table-md">
            <thead>
                <tr>
                    @can('admin.mentors.index')
                        <th>ID</th>
                    @endcan
                    <th>Nombre</th>
                    <th>ID IPN</th>
                    <th>Figuras Tutoriales</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @can('admin.mentors.index')
                        <td><b>{{ $mentor->id }}</b></td>
                    @endcan
                    <td>{{ $mentor->name }}</td>
                    <td>{{ $mentor->id_ipn }}</td>
                    <td>
                        @foreach ($mtypes as $mtype)
                            {{ $mtype->name }}
                            @if (!$loop->last){{ ', ' }}@endif
                        @endforeach
                    </td>
                    <td>{{ $mentor->phone }}</td>
                    <td>{{ $mentor->email }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Mostrar Foto
                        </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($mentor->photo === null)
                                    <img src="{{ asset('img/user.png') }}" class="img-panel">
                                @else
                                    <img src="{{ asset('storage/' . $mentor->photo) }}" class="img-panel">
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
        <br>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.mentors.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</div>

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/photo/photo.css') }}">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@stop


