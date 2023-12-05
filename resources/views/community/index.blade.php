<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="m-0 font-weight-bold text-primary">Listado de Comunidades/Edificios</h6>
                        </div>
                        <div class="col-md-3">
                            <a class=" float-right btn btn-primary btn-sm" href="{{ route('community.create') }}">Nueva Comunidad/Edificio</a>
                        </div>
                    </div>
                </div>
                <div class="card-body border-left-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>Comunidad/Edificio</th>
                                        <th>Teléfono conserjería</th>
                                        <th>Dirección</th>
                                        <th>Administrador</th>
                                        <th>Teléfono administrador</th>
                                        <th>-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($communities as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->administrator_name }}</td>
                                            <td>{{ $item->administrator_phone }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('community.edit',$item->id ) }}">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>