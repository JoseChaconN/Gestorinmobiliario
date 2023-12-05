<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ficha de comunidad/edificio</h6>
                </div>
                <form action="{{ (!empty($community->id)) ? route('community.update',$community)  : route('community.store') }}" method="POST">
                    @csrf
                    @if (!empty($community->id))
                        @method('PATCH')
                    @endif
                    <div class="card-body border-left-primary">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nombre comunidad/edificio:</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name' , $community->name)}}" placeholder="Nombre comunidad/edificio">
                                    @error('name')
                                        <small class="text-danger">*El campo Nombre es obligatorio</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Teléfono conserjería:</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone' , $community->phone)}}" placeholder="Teléfono conserjería">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Región:</label>
                                    <select name="region_id" id="region" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach ($region as $item)
                                            <option {{ (old('region_id' , $community->region_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Comuna:</label>
                                    <select name="commune_id" id="comuna" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach ($comunas as $item)
                                            <option {{ (old('commune_id' , $community->commune_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}" data-region-id="{{ $item->region_id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Dirección:</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('name' , $community->name)}}" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nombre administrador:</label>
                                    <input type="text" name="administrator_name" class="form-control" value="{{ old('administrator_name' , $community->administrator_name)}}" placeholder="Nombre administrador">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Teléfono administrador:</label>
                                    <input type="text" name="administrator_phone" class="form-control" value="{{ old('administrator_phone' , $community->administrator_phone)}}" placeholder="Teléfono administrador">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Correos:</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email' , $community->email)}}" placeholder="Correos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Observaciones:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs" placeholder="Observaciones">{{ old('obs' , $community->obs)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#comuna option').hide();
        });
        $('#region').change(function() {
            // Obtén el valor seleccionado
            var regionSeleccionada = $(this).val();

            // Filtra las opciones del select "Comuna" según la región seleccionada
            $('#comuna option').hide();
            $('#comuna option[data-region-id="' + regionSeleccionada + '"]').show();
            
            // Restablece la opción "Seleccione" y selecciona la primera comuna disponible
            $('#comuna').val('');
            $('#comuna option[data-region-id="' + regionSeleccionada + '"]:first').prop('selected', true);
        });
    </script>
</x-app-layout>