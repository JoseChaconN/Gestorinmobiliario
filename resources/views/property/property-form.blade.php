@php
    use MNC\ChileanRut\Rut;
@endphp
<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">Ficha de propiedad</h6>
                    </div>
                </div>
                <form action="{{ (!empty($property->id)) ? route('property.update',$property)  : route('property.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($property->id))
                        @method('PATCH')
                    @endif
                    <div class="card-body border-left-primary">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Propietario:</label>
                                    <select class="form-control" name="owner_id" id="owner_id">
                                        @isset($property->owner)
                                            <option selected value="{{ $property->owner_id }}">{{ $property->owner->name.' | '.Rut::parse($property->owner->rut)->format()->dotted()->hyphened().' | '.$property->owner->email_1 }}</option>
                                        @endif
                                    </select>
                                    @error('owner_id')
                                        <small class="text-danger">*El Propietario es obligatorio</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tipo de inmueble:</label>
                                    <select name="property_type" id="property_type" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach ($property_type_list as $item)
                                            <option {{ (old('property_type' , $property->property_type) == $item['id']) ? 'selected' : ''}} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Rol Avalúo:</label>
                                    <input type="text" name="role" class="form-control" value="{{ old('role' , $property->role)}}" placeholder="Rol Avalúo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Código interno de la propiedad:</label>
                                    <input type="text" name="code" class="form-control" value="{{ old('code' , $property->code)}}" placeholder="Código interno de la propiedad">
                                    @error('code')
                                        <small class="text-danger">{{ $message }}</small>
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
                                            <option {{ (old('region_id' , $property->region_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Comuna:</label>
                                    <select name="commune_id" id="commune" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach ($comunas as $item)
                                            <option {{ (old('commune_id' , $property->commune_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}" data-region-id="{{ $item->region_id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Ciudad:</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city' , $property->city)}}" placeholder="Ciudad">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Dirección:</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address' , $property->address)}}" placeholder="Dirección">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Edificio/Comunidad:</label>
                                    <select class="form-control">
                                        <option value="community_id">Seleccione</option>
                                        @foreach ($community as $item)
                                            <option {{ (old('community_id' , $property->community_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Subclasificación:</label>
                                            <select class="form-control" name="subclassification">
                                                <option value="">Seleccione</option>
                                                @foreach ($subclasification_list as $item)
                                                    <option {{ (old('subclassification' , $property->subclassification) == $item['id']) ? 'selected' : ''}} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">M<sup>2</sup></label>
                                            <input type="text" class="form-control inputDecimal" name="m2" value="{{ old('m2' , $property->m2)}}" placeholder="M2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold">Arriendo pactado en:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="currency_type_1" name="currency_type" class="custom-control-input" value="1" {{ (old('currency_type' , $property->currency_type) ==1) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="currency_type_1">Pesos</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="currency_type_2" name="currency_type" class="custom-control-input" value="2" {{ (old('currency_type' , $property->currency_type) == 2) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="currency_type_2">UF</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Cuenta propietario:</label>
                                    <select class="form-control" name="account_id" id="account_id">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Valor arriendo en pesos ($):</label>
                                    <input type="text" class="form-control inputDecimal" name="rental_value_p" value="{{ old('rental_value_p' , $property->rental_value_p)}}" placeholder="Valor arriendo en pesos ($)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Valor arriendo en UF:</label>
                                    <input type="text" class="form-control inputDecimal" name="rental_value_uf" value="{{ old('rental_value_uf' , $property->rental_value_uf)}}" placeholder="Valor arriendo en UF">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Día de cobro (desde):</label>
                                            <input type="text" class="form-control inputInt" value="{{ old('start_pay_day' , $property->start_pay_day)}}" name="start_pay_day" placeholder="Día de cobro (desde)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Día de cobro (hasta):</label>
                                            <input type="text" class="form-control inputInt" value="{{ old('end_pay_day' , $property->end_pay_day)}}" name="end_pay_day" placeholder="Día de cobro (hasta)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="font-weight-bold">Comisión administración:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="administration_currency_type_1" name="administration_currency_type" class="custom-control-input" value="1"  {{ (old('administration_currency_type' , $property->administration_currency_type) == 1) ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="administration_currency_type_1">Porcentaje (%)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="administration_currency_type_2" name="administration_currency_type" class="custom-control-input" value="2"  {{ (old('administration_currency_type' , $property->administration_currency_type) == 2) ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="administration_currency_type_2">Fijo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Valor comisión administración:</label>
                                            <input type="text" class="form-control inputDecimal" name="administration_fee" value="{{ old('administration_fee' , $property->administration_fee)}}" placeholder="Valor comisión administración">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold">Garantía en:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="warranty_currency_type_1" name="warranty_currency_type" class="custom-control-input" value="1" {{ (old('warranty_currency_type' , $property->warranty_currency_type) == 1) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="warranty_currency_type_1">Pesos</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="warranty_currency_type_2" name="warranty_currency_type" class="custom-control-input" value="2" {{ (old('warranty_currency_type' , $property->warranty_currency_type) == 2) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="warranty_currency_type_2">UF</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Monto garantía:</label>
                                    <input type="text" class="form-control inputDecimal" name="warranty_ammount" value="{{ old('warranty_ammount' , $property->warranty_ammount)}}" placeholder="Monto garantía">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Vigencia:</label>
                                    <input type="text" class="form-control inputInt" name="validity" value="{{ old('validity' , $property->validity)}}" placeholder="Vigencia">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Aviso renovación:</label>
                                    <select class="form-control" name="renewal_alert">
                                        <option value="">Seleccione</option>
                                        @foreach ($renewal_alert_list as $item)
                                            <option {{ (old('renewal_alert' , $property->renewal_alert) == $item['id']) ? 'selected' : ''}} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Periodo:</label>
                                    <input type="text" class="form-control inputInt" name="period" value="{{ old('period' , $property->period)}}" placeholder="Periodo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check form-check-inline mt-4">
                                            <input class="form-check-input" name="rent_iva" type="checkbox" id="inlineCheckbox1" value="1" {{ (old('rent_iva' , $property->rent_iva) == 1) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="inlineCheckbox1">Arriendo con IVA</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-inline mt-4">
                                            <input class="form-check-input" name="use_gc" type="checkbox" id="inlineCheckbox2" value="1" {{ (old('use_gc' , $property->use_gc) == 1) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="inlineCheckbox2">Usa Gasto Común</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-inline mt-4">
                                            <input class="form-check-input" name="pay_contributions" type="checkbox" id="inlineCheckbox3" value="1" {{ (old('pay_contributions' , $property->pay_contributions) == 1) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="inlineCheckbox3">Paga contribuciones</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tipo de reajuste:</label>
                                    <select class="form-control" name="lease_adjustment_type">
                                        <option value="">Seleccione</option>
                                        @foreach ($lease_adjustment_type_list as $item)
                                            <option {{ (old('renewal_alert' , $property->renewal_alert) == $item['id']) ? 'selected' : ''}} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Mes de reajuste:</label>
                                    <select class="form-control" name="lease_adjustment_month">
                                        <option value="">Seleccione</option>
                                        @foreach ($lease_adjustment_month_list as $item)
                                            <option {{ (old('renewal_alert' , $property->renewal_alert) == $item['id']) ? 'selected' : ''}} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Item retirado:</label>
                                    <select class="form-control" name="retired">
                                        <option value="">Seleccione</option>
                                        <option {{ (old('retired' , $property->retired) == 1) ? 'selected' : ''}} value="1">Disponible</option>
                                        <option {{ (old('retired' , $property->retired) == 2) ? 'selected' : ''}} value="2">Sin administración</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nº de habitaciones:</label>
                                            <input type="text" class="form-control inputInt" name="n_rooms" value="{{ old('period' , $property->period)}}" placeholder="Nº de habitaciones">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nº de baños:</label>
                                            <input type="text" class="form-control inputInt" name="n_bathrooms" value="{{ old('period' , $property->period)}}" placeholder="Nº de baños">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Servicio de Luz:</label>
                                    <select class="form-control" name="electric_service_id">
                                        <option value="">Seleccione</option>
                                        @foreach ($services as $item)
                                            @if ($item->type == 2)
                                                <option {{ (old('electric_service_id' , $property->electric_service_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nº de cliente:</label>
                                    <input type="text" class="form-control" name="electric_service_number" value="{{ old('electric_service_number' , $property->electric_service_number)}}" placeholder="Nº de cliente">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Servicio de Agua:</label>
                                    <select class="form-control" name="water_service_id">
                                        <option value="">Seleccione</option>
                                        @foreach ($services as $item)
                                            @if ($item->type == 1)
                                                <option {{ (old('water_service_id' , $property->water_service_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nº de cliente:</label>
                                    <input type="text" class="form-control" name="water_service_number" value="{{ old('water_service_number' , $property->water_service_number)}}" placeholder="Nº de cliente">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Servicio de Gas:</label>
                                    <select class="form-control" name="gas_service_id">
                                        <option value="">Seleccione</option>
                                        @foreach ($services as $item)
                                            @if ($item->type == 3)
                                                <option {{ (old('gas_service_id' , $property->gas_service_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nº de cliente:</label>
                                    <input type="text" class="form-control" name="gas_service_number" value="{{ old('gas_service_number' , $property->gas_service_number)}}" placeholder="Nº de cliente">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Servicio de Gasto común:</label>
                                    <select class="form-control" name="">
                                        <option value="">Seleccione</option>
                                        @foreach ($services as $item)
                                            @if ($item->type == 4)
                                                <option {{ (old('gc_service_id' , $property->gc_service_id) == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Observaciones:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="observation" rows="3" placeholder="Observaciones">{{ old('period' , $property->period)}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                    <a href="#collapseCardDataContract" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardDataContract">
                                        <h6 class="m-0 font-weight-bold text-primary">Información de contrato vigente N° 00001</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardDataContract" style="visibility: inherit">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Arrendatario:</label>
                                                        <input type="text" class="form-control" readonly value="" placeholder="Arrendatario">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">&nbsp</label>
                                                        <br>
                                                        <a class="btn btn-primary btn-sm" href="#"> Ver Ficha Contrato</a>
                                                        <a class="btn btn-primary btn-sm" href="#"> Ver Ficha Arrendatario</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Fecha firma del contrato:</label>
                                                        <input type="text" class="form-control" readonly value="" placeholder="Fecha firma del contrato">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Fecha inicio del contrato:</label>
                                                        <input type="text" class="form-control" readonly value="" placeholder="Fecha inicio del contrato">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Fecha término del contrato:</label>
                                                        <input type="text" class="form-control" readonly value="" placeholder="Fecha término del contrato">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Fecha de salida (anticipada):</label>
                                                        <input type="text" class="form-control" readonly value="" placeholder="Fecha de salida (anticipada)">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Motivo de salida:</label>
                                                        <input type="text" class="form-control" readonly value="" placeholder="Motivo de salida">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                    <a href="#collapseCardFiles" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardFiles">
                                        <h6 class="m-0 font-weight-bold text-primary">Archivos de la propiedad</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardFiles" style="visibility: inherit">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary btn-sm float-right" type="button" onclick="fnAddMoreFile()">Agregar archivo</button>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row file-div">
                                                <div class="col-md-12 d-none" id="file_">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-danger btn-sm float-right btn-delete-file" type="button">Eliminar</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Nombre del archivo:</label>
                                                                <input type="text" class="form-control file_name" placeholder="Nombre del archivo">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label font-weight-bold">Archivo:</label>
                                                                <div class="col-sm-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input file">
                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Comentario:</label>
                                                                <input type="text" class="form-control file_obs" placeholder="Comentario">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-hover dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha cargado</th>
                                                                <th>Nombre archivo</th>
                                                                <th>Comentario</th>
                                                                <th>-</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (!empty($property->getMedia('property-files')))
                                                                @foreach ($property->getMedia('property-files') as $item)
                                                                    <tr>
                                                                        <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                                                                        <td>{{ (!empty($item->custom_properties['name'])) ? $item->custom_properties['name'] : $item->name }}</td>
                                                                        <td>{{ (!empty($item->custom_properties['obs'])) ? $item->custom_properties['obs'] : '' }}</td>
                                                                        <td style='white-space: nowrap'>
                                                                            <a class="btn btn-success btn-sm" href="{{ $item->getUrl() }}" download="">Descargar</a>
                                                                            <!--button class="btn btn-danger btn-sm" type="button">Eliminar</button-->
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        $(document).ready(function() {
            @if(!empty($property->owner_id))
                $('#owner_id').trigger('change');
            @endif
            setTimeout(() => {
                $('#collapseCardFiles').removeClass('show')
                @if(!empty($property->account_id))
                    console.log({{ $property->account_id }})
                    $('#account_id').val({{ $property->account_id }}).trigger('change')
                @endif
            }, 500);
            $('#comuna option').hide();
            $('#owner_id').select2({
                placeholder: 'Propietario',
                ajax: {
                    url: '{{ route("customer.search") }}',
                    delay: 250,
                    data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                        return query;
                    }
                }
            });
        });
        function fnAddMoreFile(){
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#file_").clone();
            clone.attr("id", "file_"+number).removeClass("d-none");
            clone.find('.file_name').attr('name','file_name[]');
            clone.find('.file').attr('name','file[]');
            clone.find('.file_obs').attr('name','file_obs[]');
            //clone.find('.fotografia').attr('name','fotografia[]');
            clone.find('.btn-delete-file').attr("onclick","$('#file_"+number+"').remove()");
            $('.file-div').append(clone.show());
        }
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
        $('#owner_id').change(function () {
            accounts_type_list = @json($account_type_list);
            $.ajax({
                url: '{{ route("customer-bank-account.search") }}',
                data: { id: $(this).val() },
                dataType: 'json',
                success: function (data) {
                    $('#account_id').empty();
                    $('#account_id').append('<option value="">Seleccione</option>');
                    $.each(data, function (key, value) {
                        // Buscar el tipo de cuenta en accounts_type_list
                        var account_type_name = accounts_type_list.find(function(accountType) {
                            return accountType.id === value.account_type;
                        });
                        // Verificar si se encontró el tipo de cuenta
                        account_type_name = account_type_name ? account_type_name.name : 'Definir';
                        $('#account_id').append('<option value="' + value.id + '">' + value.bank.name + ' | ' + account_type_name + ' | ' + value.account_number +'</option>');
                    });
                },
                error: function (error) {
                    console.error('Error en la petición AJAX', error);
                }
            });
        });

    </script>
</x-app-layout>