
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <!--div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div-->
            <div class="sidebar-brand-text mx-3">Gestor Inmobiliario</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inicio</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Gestión
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->        
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers"
                    aria-expanded="true" aria-controls="collapseCustomers">
                    <i class="fas fa-users"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapseCustomers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar" style="visibility: inherit">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('customer.create') }}">Nuevo</a>
                        <a class="collapse-item" href="{{ route('customer.index') }}">Listado</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProperties"
                    aria-expanded="true" aria-controls="collapseProperties">
                    <i class="far fa-building"></i>
                    <span>Propiedades</span>
                </a>
                <div id="collapseProperties" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar" style="visibility: inherit">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('property.create') }}">Nueva</a>
                        <a class="collapse-item" href="{{ route('property.index') }}">Listado</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContracts"
                    aria-expanded="true" aria-controls="collapseContracts">
                    <i class="fas fa-file-signature"></i>
                    <span>Contratos</span>
                </a>
                <div id="collapseContracts" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar" style="visibility: inherit">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Nuevo</a>
                        <a class="collapse-item" href="#">Listado</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMovements"
                    aria-expanded="true" aria-controls="collapseMovements">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Movimientos</span>
                </a>
                <div id="collapseMovements" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar" style="visibility: inherit">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Nuevo</a>
                        <a class="collapse-item" href="#">Listado</a>
                    </div>
                </div>
            </li>
        {{-- @hasanyrole('admin|administrador') --}}
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministracion"
                    aria-expanded="true" aria-controls="collapseAdministracion">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseAdministracion" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#collapseAdministracion" style="visibility: inherit">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administración:</h6>
                        <a class="collapse-item" href="#">Usuarios</a>
                        <a class="collapse-item" href="{{ route('community.index') }}">Comudiades/Edificios</a>
                    </div>
                </div>
            </li>
        {{-- @endhasanyrole --}}
    </ul>