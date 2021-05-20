@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Articulos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Articulos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Listado de articulos</h3>
            <button class="btn btn-primary float-right"
                    data-toggle="modal"
                    data-target="#exampleModal">
                <i class="fas fa-plus"></i>
                Crear Artículo
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="articles-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Extracto</th>
                        <th class="btn-block">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->excerpt }}</td>
                            <td class="btn-block">
                                <a href="{{ route('articles.show', $article) }}"
                                    class="btn btn-sm btn-default"
                                    target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.articles.edit', $article) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                               <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" style="display: inline">
                                   {{ csrf_field() }} {{ method_field('DELETE') }}
                                   <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Está seguro de eliminar {{ $article->title }}?')">
                                       <i class="fas fa-times"></i>
                                   </button>
                               </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            $('#articles-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order": false,
            });
        });
    </script>
@endpush

