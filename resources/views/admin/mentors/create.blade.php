@extends('adminlte::page')

@section('title', 'Agregar Tutor')

@section('content_header')
    <h2 class="text-center"><b>Agregar Tutor</b></h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.mentors.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control rounded" id="name" name="name" value="{{ old('name') }}" required>

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
                        <input type="text" class="form-control rounded" id="id_ipn" name="id_ipn" value="{{ old('id_ipn') }}" required>

                        @error('id_ipn')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="mtypes">Figuras Tutoriales:</label>
                    <div class="col-sm-10">
                        <select class="form-control rounded js-example-basic-multiple" id="mtypes" name="mtypes[]" multiple="multiple" required>
                            @foreach ($mtypes as $mtype)
                                <option value="{{ $mtype->id }}" {{ in_array($mtype->id, old('mtypes', [])) ? 'selected' : '' }}>
                                    {{ $mtype->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('mtypes')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone">Teléfono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control rounded" id="phone" name="phone" value="{{ old('phone') }}" required maxlength="10" minlength="10">

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
                        <input type="email" class="form-control rounded" id="email" name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="password">Contraseña:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control rounded" id="password" name="password" required>

                        @error('password')
                            <span class="text-danger">
                                <span>*{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="password_confirmation">Confirmar Contraseña:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control rounded" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Agregar Tutor">
                    <a href="{{ route('admin.mentors.index') }}" class="btn btn-secondary">Cancelar</a>
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                theme: 'classic',
            });
        });
    </script>
@stop


