<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="m-0 font-weight-bold text-primary">Listado de propiedades</h6>
                        </div>
                        <div class="col-md-3">
                            <a class=" float-right btn btn-primary btn-sm" href="{{ route('property.create') }}">Nueva Propiedad</a>
                        </div>
                    </div>
                </div>
                <div class="card-body border-left-primary">
                    <livewire:property-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>