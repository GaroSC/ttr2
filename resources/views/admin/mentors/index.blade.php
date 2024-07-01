@extends('adminlte::page')

@section('title', 'Tutores')

@section('content_header')
    <h2 class="text-center"><b>Tutores</b></h2>
@stop

@section('content')
    <!-- Alert Section -->
    @if (session('success-create'))
        <div class="alert alert-success text-center">
            {{ session('success-create') }}
        </div>
    @elseif (session('success-update'))
        <div class="alert alert-primary text-center">
            {{ session('success-update') }}
        </div>
    @elseif (session('success-delete'))
        <div class="alert alert-danger text-center">
            {{ session('success-delete') }}
        </div> 
    @endif
    <!-- Button & Search Section -->
    <div class="card">
        <div class="card-header container">
            <div class="row">
                @can('admin.mentors.index')
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a href="{{ route('admin.mentors.create') }}" class="btn btn-success"><b>+</b> Agregar Tutor</a>
                    </div>
                @endcan
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <form action="{{ route('admin.mentors.index') }}" method="GET">
                        <div class="mb-3 row">
                            <div class="col-sm-9">
                                <input type="text" name="filterValue" placeholder="Buscar tutor" class="form-control rounded border-primary text-secondary">
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th class="text-center" colspan="4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mentors as $mentor)
                        <tr>
                            @can('admin.mentors.index')
                                <td><b>{{ $mentor->id }}</b></td>
                            @endcan
                            <td>{{ $mentor->name }}</td>
                            <td>{{ $mentor->id_ipn }}</td>
                            <td>{{ $mentor->phone }}</td>
                            <td>{{ $mentor->email }}</td>
                            <td width="2px">
                                <a href="{{ route('admin.mentors.show', $mentor) }}" class="btn btn-info btn-sm mb-2">Información</a>
                            </td>
                            @can('admin.mentors.index')
                                <td width="5px">
                                    <a href="{{ route('admin.mentors.edit', $mentor) }}" class="btn btn-default btn-sm mb-2">Editar</a>
                                </td>
                                <td width="5px">
                                    <a href="#" class="btn btn-danger btn-sm mb-2" onclick="deleteMentor({{ $mentor->id }})">Borrar</a>
                                </td>
                            @endcan
                            @can('mentee.index')
                                <td width="5px">
                                    <a href="{{ route('events.show', $mentor) }}" class="btn btn-default btn-sm mb-2">Calendario</a>
                                </td>
                            @endcan
                        </tr>
                        <form id="mentor-{{ $mentor->id }}" action="{{ route('admin.mentors.destroy', $mentor) }}" method="POST">
                            @csrf
                            @method('DELETE')   
                            <input type="submit" value="Borrar" class="btn btn-danger btn-sm invisible">
                        </form>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination Section -->
            <div class="text-center mt-3">
                {{ $mentors->appends(["filterValue" => $filterValue])->links() }}
            </div>
            <br>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-secondary">Regresar</a>
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
        function deleteMentor(mentorId) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, bórralo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`mentor-${mentorId}`).submit();
                }
            });
        }
    </script>
@stop