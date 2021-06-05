<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ setActiveRoute('dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Inicio</span>
            </a>
        </li>

        <li class="nav-item menu-open">

            <a href="#" class="nav-link {{ setActiveRoute('admin.articles.index')}}">
                <i class="far fa-newspaper"></i>
                <p>
                    Articulos
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.articles.index') }}"
                       class="nav-link {{ setActiveRoute('admin.articles.index') }}">
                        <i class="fas fa-eye"></i>
                        <p>Ver todos los articulos</p>
                    </a>
                </li>
                <li class="nav-item">
                    @if (request()->routeIs('admin.articles.edit'))
                        <a href="{{ route('admin.articles.index', '#create') }}">
                            <i class="fas fa-plus-circle"></i>
                            Crear artículo
                        </a>
                    @else
                        <a href="#"
                           data-toggle="modal"
                           data-target="#exampleModal"
                           class="nav-link">
                            <i class="fas fa-plus-circle"></i>
                            Crear artículo
                        </a>
                    @endif
                </li>
                @if(isset($article) && request()->routeIs('admin.articles.edit'))
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="nav-link {{ request()->routeIs('admin.articles.edit') ? 'active' : ''}}">
                            <i class="fas fa-edit"></i>
                            <p>Editar artículo</p>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

        <li class="nav-item menu-open">

            <a href="#" class="nav-link {{ setActiveRoute(['admin.users.index', 'admin.users.create'])}}">
                <i class="fas fa-users"></i>
                <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                       class="nav-link {{ setActiveRoute('admin.users.index') }}">
                        <i class="fas fa-eye"></i>
                        <p>Ver todos los usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                        <a href="{{ route('admin.users.create') }}" class="nav-link {{ setActiveRoute('admin.users.create') }}">
                            <i class="fas fa-plus-circle"></i>
                            <p>Crear usuarios</p>
                        </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
