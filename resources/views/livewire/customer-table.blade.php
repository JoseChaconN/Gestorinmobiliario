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
                            <label class="font-weight-bold">Nombre/RUT/Email:</label>
                            <input class="form-control" type="text" wire:model.live="search" placeholder="Nombre/RUT/Email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Fecha de creación:</label>
                            <input class="form-control" type="date" wire:model.live="created_at" wire:change="search">
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
                            <th>N°</th>
                            <th>RUT</th>
                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ Rut::parse($item->rut)->format()->dotted()->hyphened(); }}</td>
                                <td>{{ $item->name.' '.$item->last_name }}</td>
                                <td>{{ $item->email_1 }}</td>
                                <td>{{ $item->phone_1 }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('customer.edit',$item->id) }}">Editar</a>
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
            {!! $customers->links() !!}
        </div>
    </div>
</div>
