<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : ''}}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Inicio</span>
            </a>
        </li>

        <li class="nav-item menu-open">

            <a href="#" class="nav-link {{ request()->routeIs('admin.articles*') ? 'active' : ''}}">
                <i class="far fa-newspaper"></i>
                <p>
                    Articulos
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.articles.index') }}" class="nav-link {{ request()->routeIs('admin.articles.index') ? 'active' : ''}}">
                        <i class="fas fa-eye"></i>
                        <p>Ver todos los articulos</p>
                    </a>
                </li>
                <li class="nav-item">
                    @if (request()->routeIs('admin.articles.edit'))
                        <a href="{{ route('admin.articles.index', '#create') }}"
                           class="nav-link {{ request()->routeIs('admin.articles.create') ? 'active' : ''}}">
                            <i class="fas fa-plus-circle"></i>
                            Crear artículo
                        </a>
                    @else
                        <a href="#"
                           data-toggle="modal"
                           data-target="#exampleModal"
                           class="nav-link {{ request()->routeIs('admin.articles.create') ? 'active' : ''}}">
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
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Simple Link
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
