<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">Ficha de Cliente</h6>
                    </div>
                </div>
                <form action="{{ (!empty($customer->id)) ? route('customer.update',$customer)  : route('customer.store') }}" method="POST">
                    @csrf
                    @if (!empty($customer->id))
                        @method('PATCH')
                    @endif
                    <div class="card-body border-left-primary">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="mb-3 font-weight-bold text-primary">Datos básicos del cliente</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="payer_rut_1" name="payer_rut" class="custom-control-input" value="1" {{ (old('payer_rut' , $customer->payer_rut) == 1) ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="payer_rut_1">Rut Pagador</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="type_id_1" name="type_id" class="custom-control-input" value="1" onclick="$('.rut').removeClass('d-none');$('.passport').addClass('d-none');">
                                            <label class="custom-control-label" for="type_id_1">Rut</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="type_id_2" name="type_id" class="custom-control-input" value="2" onclick="$('.passport').removeClass('d-none');$('.rut').addClass('d-none');">
                                            <label class="custom-control-label" for="type_id_2">Pasaporte</label>
                                        </div>
                                    </div>
                                    @error('type_id')
                                        <small class="text-danger">*Seleccione un tipo de identificación</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nombre:</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name' , $customer->name)}}" placeholder="Nombre">
                                            @error('name')
                                                <small class="text-danger">*El campo Nombre es obligatorio</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 {{ (!empty($customer->rut)) ? '' : 'd-none'}} rut">
                                        <div class="form-group">
                                            <label class="font-weight-bold">RUT:</label>
                                            <input type="text" name="rut" id="rut" class="form-control" value="{{ old('rut' , $customer->rut)}}" placeholder="RUT">
                                            @error('rut')
                                                <small class="text-danger">*El campo RUT es obligatorio</small>
                                            @enderror
                                            <small class="text-danger d-none validrut">*El RUT ingresado es invalido</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 {{ (!empty($customer->passport)) ? '' : 'd-none'}} passport">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Pasaporte:</label>
                                            <input type="text" name="passport" class="form-control" value="{{ old('passport' , $customer->passport)}}" placeholder="Pasaporte">
                                            @error('passport')
                                                <small class="text-danger">*El campo Pasaporte es obligatorio</small>
                                            @enderror
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
                                                    <option {{ (old('region_id' , $customer->region_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
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
                                                    <option {{ (old('commune_id' , $customer->commune_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}" data-region-id="{{ $item->region_id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Ciudad:</label>
                                            <input type="text" name="city" class="form-control" value="{{ old('city' , $customer->city)}}" placeholder="Ciudad">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Dirección:</label>
                                            <input type="text" name="direction" class="form-control" value="{{ old('direction' , $customer->direction)}}" placeholder="Dirección">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Email 1:</label>
                                            <input type="email" name="email_1" class="form-control" value="{{ old('email_1' , $customer->email_1)}}" placeholder="Email 1">
                                            @error('email_1')
                                                <small class="text-danger">*El campo Email 1 es obligatorio</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Email 2:</label>
                                            <input type="email" name="email_2" class="form-control" value="{{ old('email_2' , $customer->email_2)}}" placeholder="Email 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Telefono 1:</label>
                                            <input type="text" name="phone_1" class="form-control" value="{{ old('phone_1' , $customer->phone_1)}}" placeholder="Telefono 1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Telefono 2:</label>
                                            <input type="text" name="phone_2" class="form-control" value="{{ old('phone_2' , $customer->phone_2)}}" placeholder="Telefono 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Giro factura:</label>
                                            <input type="text" name="invoice_name" class="form-control" value="{{ old('invoice_name' , $customer->invoice_name)}}" placeholder="Giro factura">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Contacto Empresa:</label>
                                            <input type="text" name="contact_company" class="form-control" value="{{ old('contact_company' , $customer->contact_company)}}" placeholder="Contacto Empresa">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="retired" name="retired" value="1" {{ (old('retired' , $customer->retired) == 1) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="retired">¿Retirado?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Observaciones:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs" placeholder="Observaciones">{{ old('obs' , $customer->obs)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('customer.templates.customer-tenant-form')
                        @include('customer.templates.customer-owner-form')
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#comuna option').hide();
            $("input#rut").rut({
                minimumLength: 2, // validar largo mínimo; default: 2
                validateOn: 'change' // si no se quiere validar, pasar null
            });
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
        // muestra un mensaje de error cuando el rut es inválido
        $("input#rut").rut().on('rutInvalido', function(e) {
            $('.validrut').removeClass('d-none');
            $('#rut').val('');
        });
        $("input#rut").rut().on('rutValido', function(e) {
            $('.validrut').addClass('d-none');
        });
    </script>
</x-app-layout>