@extends('adminlte::page')

@section('title', 'Tutorados')

@section('content_header')
    <h2 class="text-center"><b>Tutorados</b></h2>
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
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ route('admin.mentees.create') }}" class="btn btn-success"><b>+</b> Agregar Tutorado</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <form action="{{ route('admin.mentees.index') }}" method="GET">
                        <div class="mb-3 row">
                            <div class="col-sm-9">
                                <input type="text" name="filterValue" placeholder="Buscar Tutorado" class="form-control rounded border-primary text-secondary">
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
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>ID IPN</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mentees as $mentee)
                        <tr>
                            <td><b>{{ $mentee->id }}</b></td>
                            <td>{{ $mentee->name }}</td>
                            <td>{{ $mentee->id_ipn }}</td>
                            <td>{{ $mentee->phone }}</td>
                            <td>{{ $mentee->email }}</td>
                            <td width="2px">
                                <a href="{{ route('admin.mentees.show', $mentee) }}" class="btn btn-info btn-sm mb-2">Información</a>
                            </td>
                            <td width="5px">
                                <a href="{{ route('admin.mentees.edit', $mentee) }}" class="btn btn-default btn-sm mb-2">Editar</a>
                            </td>
                            <td width="5px">
                                <a href="#" class="btn btn-danger btn-sm mb-2" onclick="deleteMentee({{ $mentee->id }})">Borrar</a>
                            </td>
                        </tr>
                        <form id="mentee-{{ $mentee->id }}" action="{{ route('admin.mentees.destroy', $mentee) }}" method="POST">
                            @csrf
                            @method('DELETE')   
                            <input type="submit" value="Borrar" class="btn btn-danger btn-sm invisible">
                        </form>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination Section -->
            <div class="text-center mt-3">
                {{ $mentees->appends(["filterValue" => $filterValue])->links() }}
            </div>
            <br>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-secondary">Regresar</a>
            </div>
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script>
        function deleteMentee(menteeId) {
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
                    document.getElementById(`mentee-${menteeId}`).submit();
                }
            });
        }
    </script>
@stop