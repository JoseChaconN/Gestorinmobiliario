<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <a href="#collapseCardOwner" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardOwner">
                <h6 class="m-0 font-weight-bold text-primary">Datos para Propietario</h6>
            </a>
            <div class="collapse" id="collapseCardOwner" style="visibility: inherit">
                <div class="card-body border-left-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Impuesto al cobrar comisión:</label>
                                        <select name="commission_tax" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($commission_tax_list as $item)
                                                <option {{ (old('commission_tax' , $customer->commission_tax) == $item['id']) ? 'selected' : ''}} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="m-0 font-weight-bold text-primary">Cuentas Bancarias <button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddBankAccount()">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Agregar Más</span>
                                        </button>
                                    </h6>
                                </div>
                            </div>
                            <div class="row owner-account-div">
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12 d-none" id="ownerAccount_">
                                    <input type="hidden" class="account_id" value="">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <button class="btn btn-danger btn-sm btn-delete-bank-account" type="button">Eliminar Cuenta</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Titular de cuenta:</label>
                                                <input type="text" class="form-control account_holder" value="" placeholder="Titular de cuenta">                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Nº de cuenta bancaria:</label>
                                                <input type="text" class="form-control account_number" value="" placeholder="Nº de cuenta bancaria">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Banco:</label>
                                                <select class="form-control bank_id">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($banks as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Tipo de cuenta bancaria:</label>
                                                <select class="form-control account_type">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($account_type_list as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (!empty($customer->bank_account))
                                    @foreach ($customer->bank_account as $account)
                                        <div class="col-md-12" id="ownerAccount_{{ $account->id }}">
                                            <input type="hidden" name="account_id[{{ $account->id }}]" value="{{ $account->id }}">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <button class="ml-2 btn btn-danger btn-sm" type="button" onclick="fnDeleteData('{{route('customer-bank-account.delete',$account->id)}}',{{ $account->id }},'La cuenta bancaria {{ $account->account_number }}')">
                                                        Eliminar Cuenta
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Titular de cuenta:</label>
                                                        <input type="text" class="form-control" name="account_holder[{{ $account->id }}]" value="{{ $account->account_holder }}" placeholder="Titular de cuenta">                                    
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Nº de cuenta bancaria:</label>
                                                        <input type="text" class="form-control" name="account_number[{{ $account->id }}]" value="{{ $account->account_number }}" placeholder="Nº de cuenta bancaria">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Banco:</label>
                                                        <select class="form-control" name="bank_id[{{ $account->id }}]">
                                                            <option value="">Seleccione</option>
                                                            @foreach ($banks as $item)
                                                                <option {{ ($account->bank_id == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Tipo de cuenta bancaria:</label>
                                                        <select class="form-control" name="account_type[{{ $account->id }}]">
                                                            <option value="">Seleccione</option>
                                                            @foreach ($account_type_list as $item)
                                                                <option {{ ($account->account_type == $item['id']) ? 'selected' : ''}} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function fnAddBankAccount() {
        number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
        clone = $("#ownerAccount_").clone();
        clone.attr("id", "ownerAccount_"+number).removeClass("d-none");        
        clone.find('.account_id').attr('name','account_id['+number+']').val(number)
        clone.find('.account_holder').attr('name','account_holder['+number+']').val('')
        clone.find('.account_number').attr('name','account_number['+number+']').val('')
        clone.find('.bank_id').attr('name','bank_id['+number+']').val('')
        clone.find('.account_type').attr('name','account_type['+number+']').val('')
        clone.find('.btn-delete-bank-account').attr("onclick","$('#ownerAccount_"+number+"').remove()");
        $('.owner-account-div').append(clone.show());
    }
</script>