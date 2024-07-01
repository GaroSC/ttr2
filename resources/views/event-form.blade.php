<x-modal-action action="{{ $action }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <input type="text" name="date" readonly value="{{ $data->date ?? request()->date }}" class="form-control datepicker">
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <input type="time" name="starts_at" value="{{ $data->starts_at }}" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <input type="time" name="ends_at" value="{{ $data->ends_at }}" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <textarea name="title" class="form-control" placeholder="Escribe un título para la sesión">{{ $data->title }}</textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <textarea name="description" class="form-control" placeholder="Escribe una descripción para la sesión">{{ $data->description }}</textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'success' ? 'checked' : null }} type="radio" name="category" id="category-success" value="success">
                    <label class="form-check-label" for="category-success">Individual</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'danger' ? 'checked' : null }} type="radio" name="category" id="category-danger" value="danger">
                    <label class="form-check-label" for="category-danger">Grupal</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'warning' ? 'checked' : null }} type="radio" name="category" id="category-warning" value="warning">
                    <label class="form-check-label" for="category-warning">Regularización</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'info' ? 'checked' : null }} type="radio" name="category" id="category-info" value="info">
                    <label class="form-check-label" for="category-info">Recuperación Académica</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'secondary' ? 'checked' : null }} type="radio" name="category" id="category-info" value="secondary">
                    <label class="form-check-label" for="category-secondary">Entre Pares</label>
                  </div>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="delete" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Borrar</label>
                  </div>
            </div>
        </div>
    </div>
</x-modal-action>