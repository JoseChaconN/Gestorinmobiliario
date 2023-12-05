@php
    use MNC\ChileanRut\Rut;
@endphp
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <h6 class="font-weight-bold text-primary">Buscador:</h6>
        </div>
        <div class="col-md-12">
            <form wire:submit="search">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Código interno de la propiedad:</label>
                            <input class="form-control" type="text" wire:model.live="code" placeholder="interno de la propiedad">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Arrendatario/Propietario (Nombre/RUT/Email):</label>
                            <input class="form-control" type="text" wire:model.live="search" placeholder="Arrendatario/Propietario (Nombre/RUT/Email)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Fecha de creación:</label>
                            <input class="form-control" type="date" wire:model.live="created_at" wire:change="search">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">N° contrato:</label>
                            <input class="form-control" type="text" placeholder="N° contrato">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Fecha de inicio de contrato:</label>
                            <input class="form-control" type="date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Fecha fin de contrato:</label>
                            <input class="form-control" type="date">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Propietario</th>
                            <th>Arrendatario</th>
                            <th>Dirección</th>
                            <th>Comuna</th>
                            <th>Ciudad</th>
                            <th>N° contrato</th>
                            <th>Ingreso</th>
                            <th>Termino</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td><a href="{{ route('customer.edit',$item->owner->id) }}">{{ $item->owner->name.' '.Rut::parse($item->owner->rut)->format()->dotted()->hyphened(); }}</a></td>
                                <td>-</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->commune->name }}</td>
                                <td>{{ $item->city }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('property.edit',$item->id) }}">Editar</a>
                                    <button class="btn btn-danger btn-sm" type="button" wire:click="delete" wire:confirm="Are you sure you want to delete this post?">Eliminar</button>
                                    <!--button class="btn btn-danger btn-sm" type="button">Eliminar</button-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! $properties->links() !!}
        </div>
    </div>
</div>
