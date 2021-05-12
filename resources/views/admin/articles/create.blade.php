@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Crear Articulos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">Articulos</a></li>
                    <li class="breadcrumb-item active">crear</li>
                </ol>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <form method="POST" action="{{ route('admin.articles.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">Contenido del articulo</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Titulo del articulo</label>
                                <input id="title"
                                       name="title"
                                       type="text"
                                       class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                       value="{{ old('title') }}"
                                       placeholder="Ingresa titulo del articulo">
                                {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label for="editor">Contenido del articulo</label>
                                <textarea rows="10"
                                          id="editor"
                                          name="content"
                                          class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                                          placeholder="Ingresa contenido del articulo">{{ old('content') }}</textarea>
                                {!! $errors->first('content', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label for="iframe">Contenido embebido (iframe)</label>
                                <textarea rows="2"
                                          id="iframe"
                                          name="iframe"
                                          class="form-control {{ $errors->has('iframe') ? 'is-invalid' : '' }}"
                                          placeholder="Ingresa contenido embebido (iframe) de audio o video">{{ old('iframe') }}</textarea>
                                {!! $errors->first('iframe', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">Detalles del articulo</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="datepicker">Fecha de publicación:</label>
                            <div class="input-group date">
                                <input name="published_at"
                                        id="datepicker"
                                        type="text"
                                        class="form-control datetimepicker-input"
                                        data-target="#datepicker"
                                        value="{{ old('published_at') }}"/>
                                <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Categorias</label>
                            <select id="category_id"
                                    name="category_id"
                                    class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                <option value="">Selecciona una categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="keywords">Palabras clave</label>
                            <select id="keywords"
                                    name="keywords[]"
                                    class="form-control select2 {{ $errors->has('keywords') ? 'is-invalid' : '' }}"
                                    multiple="multiple"
                                    data-placeholder="Seleccione palabras clave"
                                    style="width: 100%;">
                                @foreach($keywords as $keyword)
                                    <option {{ collect(old('keywords'))->contains($keyword->id) ? 'selected' : '' }} value="{{ $keyword->id }}">{{ $keyword->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('keywords', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state">Estado</label>
                                    <select id="state"
                                            name="state"
                                            class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}">
                                        <option value="">Seleccionar estado</option>
                                        <option value="publico" {{ old('state') == 'publico' ? 'selected' : '' }}>Publico</option>
                                        <option value="privado" {{ old('state') == 'privado' ? 'selected' : '' }}>Privado</option>
                                    </select>
                                    {!! $errors->first('state', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="visibility">Visibilidad</label><br>
                                    <input type="hidden" name="visibility" value="0">
                                    <input id="visibility"
                                           name="visibility"
                                           type="checkbox"
                                           checked
                                           data-bootstrap-switch
                                           data-off-color="danger"
                                           data-on-color="success"
                                           class="form-control {{ $errors->has('visibility') ? 'is-invalid' : '' }}"
                                           value="1">
                                    {!! $errors->first('visibility', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Extraxto del articulo</label>
                            <textarea id="excerpt"
                                      name="excerpt"
                                      class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}"
                                      placeholder="Ingresa extracto del articulo">{{ old('excerpt') }}</textarea>
                            {!! $errors->first('excerpt', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Guardar Articulo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('styles')
    <!-- daterange picker -->
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">

    <!-- summernote -->
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="/adminlte/plugins/dropzone/min/dropzone.min.css">
@endpush

@push('scripts')
    <!-- date-range-picker -->
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <script src="/adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

    <!-- Bootstrap Switch -->
    <script src="/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <!-- dropzonejs -->
    <script src="/adminlte/plugins/dropzone/min/dropzone.min.js"></script>

    <script>
        $(function() {
            //Initialize DatePicker
            $("#datepicker").daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            });

            //Initialize Editor
            $('#editor').summernote({
                height: 172,   //set editable area's height
            });

            //Initialize Select2 Elements
            $('.select2').select2({
                tags: true
            });

            // bootstrap switch
            $("#visibility").bootstrapSwitch({
                size: 'mini',
                onColor: 'success',
                offColor: 'danger',
            });

        });
    </script>
@endpush


