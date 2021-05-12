<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : ''}}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Inicio</span>
            </a>
        </li>

        <li class="nav-item menu-open">

            <a href="#" class="nav-link {{ request()->is('admin/articles*') ? 'active' : ''}}">
                <i class="far fa-newspaper"></i>
                <p>
                    Articulos
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.articles.index') }}" class="nav-link {{ request()->is('admin/articles') ? 'active' : ''}}">
                        <i class="fas fa-eye"></i>
                        <p>Ver todos los articulos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.articles.create') }}" class="nav-link {{ request()->is('admin/articles/create') ? 'active' : ''}}">
                        <i class="fas fa-plus-circle"></i>
                        <p>Crear articulo</p>
                    </a>
                </li>
                @if(isset($article) && request()->is('admin/articles/*/edit'))
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="nav-link {{ request()->is('admin/articles/*/edit') ? 'active' : ''}}">
                            <i class="fas fa-edit"></i>
                            <p>Editar articulo</p>
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
