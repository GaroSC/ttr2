@extends('adminlte::page')

@section('title', 'Editar Tutorado')

@section('content_header')
    <h2 class="text-center"><b>Editar Tutorado</b></h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.mentees.update', $mentee) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control rounded" id="name" name="name" value="{{ old('name', $mentee->name) }}" required>

                        @error('name')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="id_ipn">ID IPN:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control rounded" id="id_ipn" name="id_ipn" value="{{ old('id_ipn', $mentee->id_ipn) }}" required>

                        @error('id_ipn')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="msituations">Situación Académica:</label>
                    <div class="col-sm-10">
                        <label for="id_label_single">                   
                            <select class="js-example-basic-single js-states form-control rounded" id="id_label_single"></select>
                        </label>
                    </div> 
                </div>

                {{--  
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="msituations">Situación Académica:</label>
                    <div class="col-sm-10">
                        <select class="form-control rounded js-example-basic-multiple" id="msituations" name="msituations[]" multiple="multiple" required>
                            @foreach ($msituations as $msituation)
                                <option value="{{ $msituation->id }}" {{ in_array($msituation->id, old('msituations', [])) ? 'selected' : '' }}>
                                    {{ $msituation->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('msituations')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone">Teléfono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control rounded" id="phone" name="phone" value="{{ old('phone', $mentee->phone) }}" required maxlength="10" minlength="10">

                        @error('phone')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email">Correo Electrónico:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control rounded" id="email" name="email" value="{{ old('email', $mentee->email) }}" required>

                        @error('email')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Editar Tutorado">
                    <a href="{{ route('admin.mentees.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>   
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    {{--  
    <script>
        $(document).ready(()=>{});
        $('#msituations').val(@json($ids_msituations));
    </script>
    --}}

    {{-- 
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                theme: 'classic',
            });
        });
    </script>
    --}}
@stop