
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <a href="#collapseCardTenant" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardTenant">
                <h6 class="m-0 font-weight-bold text-primary">Datos para Arrendatario</h6>
            </a>
            <div class="collapse " id="collapseCardTenant" style="visibility: inherit">
                <div class="card-body border-left-primary">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="penalty_fee" name="penalty_fee" value="1" {{ (old('penalty_fee' , $customer->penalty_fee) == 1) ? 'checked' : ''}}>
                                <label class="custom-control-label" for="penalty_fee">¿Afecta Multa?</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-3 font-weight-bold text-primary">Datos básicos del aval</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="payer_rut_2" name="payer_rut" class="custom-control-input" value="2" {{ (old('payer_rut' , $customer->payer_rut) == 2) ? 'checked' : ''}}>
                                <label class="custom-control-label" for="payer_rut_2">Rut Pagador</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nombre:</label>
                                        <input type="text" name="aval_name" class="form-control" value="{{ old('aval_name' , $customer->aval_name)}}" placeholder="Nombre">                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">RUT:</label>
                                        <input type="text" name="aval_rut" id="aval_rut" class="form-control" value="{{ old('aval_rut' , $customer->aval_rut)}}" placeholder="RUT">                                    
                                    </div>
                                    <small class="text-danger d-none validrut-aval">*El RUT ingresado es invalido</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Región:</label>
                                        <select name="aval_region_id" id="aval_region" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($region as $item)
                                                <option {{ (old('aval_region_id' , $customer->aval_region_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Comuna:</label>
                                        <select name="aval_commune_id" id="aval_comuna" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($comunas as $item)
                                                <option {{ (old('aval_commune_id' , $customer->aval_commune_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}" data-region-id="{{ $item->region_id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Ciudad:</label>
                                        <input type="text" name="aval_city" class="form-control" value="{{ old('aval_city' , $customer->aval_city)}}" placeholder="Ciudad">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Dirección:</label>
                                        <input type="text" name="aval_direction" class="form-control" value="{{ old('aval_direction' , $customer->aval_direction)}}" placeholder="Dirección">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Email:</label>
                                        <input type="text" name="aval_email" class="form-control" value="{{ old('aval_email' , $customer->aval_email)}}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Telefono:</label>
                                        <input type="text" name="aval_phone" class="form-control" value="{{ old('aval_phone' , $customer->aval_phone)}}" placeholder="Telefono">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-3 font-weight-bold text-primary">Datos básicos de tercero</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="payer_rut_3" name="payer_rut" class="custom-control-input" value="3" {{ (old('payer_rut' , $customer->payer_rut) == 3) ? 'checked' : ''}}>
                                <label class="custom-control-label" for="payer_rut_3">Rut Pagador</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nombre:</label>
                                        <input type="text" name="third_name" class="form-control" value="{{ old('third_name' , $customer->third_name)}}" placeholder="Nombre">                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">RUT:</label>
                                        <input type="text" name="third_rut" id="third_rut" class="form-control" value="{{ old('third_rut' , $customer->third_rut)}}" placeholder="RUT">                                    
                                    </div>
                                    <small class="text-danger d-none validrut-third">*El RUT ingresado es invalido</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Región:</label>
                                        <select name="third_region_id" id="third_region" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($region as $item)
                                                <option {{ (old('third_region_id' , $customer->third_region_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Comuna:</label>
                                        <select name="third_commune_id" id="third_comuna" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($comunas as $item)
                                                <option {{ (old('third_commune_id' , $customer->third_commune_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}" data-region-id="{{ $item->region_id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Ciudad:</label>
                                        <input type="text" name="third_city" class="form-control" value="{{ old('third_city' , $customer->third_city)}}" placeholder="Ciudad">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Dirección:</label>
                                        <input type="text" name="third_direction" class="form-control" value="{{ old('third_direction' , $customer->third_direction)}}" placeholder="Dirección">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Email:</label>
                                        <input type="text" name="third_email" class="form-control" value="{{ old('third_email' , $customer->third_email)}}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Telefono 1:</label>
                                        <input type="text" name="third_phone" class="form-control" value="{{ old('third_phone' , $customer->third_phone)}}" placeholder="Telefono">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#aval_comuna option').hide();
        $('#third_comuna option').hide();
        $("input#aval_rut").rut({
            minimumLength: 2, // validar largo mínimo; default: 2
            validateOn: 'change' // si no se quiere validar, pasar null
        });
        $("input#third_rut").rut({
            minimumLength: 2, // validar largo mínimo; default: 2
            validateOn: 'change' // si no se quiere validar, pasar null
        });
    });
    $('#aval_region').change(function() {
        // Obtén el valor seleccionado
        var regionSeleccionada = $(this).val();

        // Filtra las opciones del select "Comuna" según la región seleccionada
        $('#aval_comuna option').hide();
        $('#aval_comuna option[data-region-id="' + regionSeleccionada + '"]').show();
        
        // Restablece la opción "Seleccione" y selecciona la primera comuna disponible
        $('#aval_comuna').val('');
        $('#aval_comuna option[data-region-id="' + regionSeleccionada + '"]:first').prop('selected', true);
    });
    $('#third_region').change(function() {
        // Obtén el valor seleccionado
        var regionSeleccionada = $(this).val();

        // Filtra las opciones del select "Comuna" según la región seleccionada
        $('#third_comuna option').hide();
        $('#third_comuna option[data-region-id="' + regionSeleccionada + '"]').show();
        
        // Restablece la opción "Seleccione" y selecciona la primera comuna disponible
        $('#third_comuna').val('');
        $('#third_comuna option[data-region-id="' + regionSeleccionada + '"]:first').prop('selected', true);
    });
    // muestra un mensaje de error cuando el rut es inválido
    $("input#third_rut").rut().on('rutInvalido', function(e) {
        $('.validrut-third').removeClass('d-none');
        $('#third_rut').val('');
    });
    $("input#third_rut").rut().on('rutValido', function(e) {
        $('.validrut-third').addClass('d-none');
    });
    // muestra un mensaje de error cuando el rut es inválido
    $("input#aval_rut").rut().on('rutInvalido', function(e) {
        $('.validrut-aval').removeClass('d-none');
        $('#aval_rut').val('');
    });
    $("input#aval_rut").rut().on('rutValido', function(e) {
        $('.validrut-aval').addClass('d-none');
    });
</script>