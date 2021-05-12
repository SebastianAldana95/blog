@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Articulo</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">Articulos</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <form method="POST" action="{{ route('admin.articles.update', $article) }}">
        @csrf @method("PUT")
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
                                   value="{{ old('title', $article->title) }}"
                                   placeholder="Ingresa titulo del articulo">
                            {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="editor">Contenido del articulo</label>
                            <textarea rows="10"
                                      id="editor"
                                      name="content"
                                      class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                                      placeholder="Ingresa contenido del articulo">{{ old('content', $article->content) }}</textarea>
                            {!! $errors->first('content', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="iframe">Contenido embebido (iframe)</label>
                            <textarea rows="2"
                                      id="iframe"
                                      name="iframe"
                                      class="form-control {{ $errors->has('iframe') ? 'is-invalid' : '' }}"
                                      placeholder="Ingresa contenido embebido (iframe) de audio o video">{{ old('iframe', $article->iframe) }}</textarea>
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
                                       value="{{ old('published_at', $article->published_at ? $article->published_at->format('m/d/y') : null) }}"/>
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
                                        {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}
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
                                    <option {{ collect(old('keywords', $article->keywords->pluck('id')))->contains($keyword->id) ? 'selected' : '' }} value="{{ $keyword->id }}">{{ $keyword->name }}</option>
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
                                        <option value="publico" {{ old('state', $article->state) == 'publico' ? 'selected' : '' }}>Publico</option>
                                        <option value="privado" {{ old('state', $article->state) == 'privado' ? 'selected' : '' }}>Privado</option>
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
                                      placeholder="Ingresa extracto del articulo">{{ old('excerpt', $article->excerpt) }}</textarea>
                            {!! $errors->first('excerpt', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Actualizar Articulo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('admin.articles.resources.store', $article) }}">
        @csrf @method("POST")
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar recursos al artículo</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                              <span class="btn btn-success col fileinput-button">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Agregar Recursos</span>
                                              </span>
                                        <button type="submit" class="btn btn-primary col start">
                                            <i class="fas fa-upload"></i>
                                            <span>Subir archivos</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning col cancel">
                                            <i class="fas fa-times-circle"></i>
                                            <span>Cancelar</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="fileupload-process w-100">
                                        <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table table-striped files" id="previews">
                                <div id="template" class="row mt-2">
                                    <div class="col-auto">
                                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                    </div>
                                    <div class="col d-flex align-items-center">
                                        <p class="mb-0">
                                            <span class="lead" data-dz-name></span>
                                            (<span data-dz-size></span>)
                                        </p>
                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                        <div class="btn-group">
                                            <button class="btn btn-primary start">
                                                <i class="fas fa-upload"></i>
                                                <span>Subir</span>
                                            </button>
                                            <button data-dz-remove class="btn btn-warning cancel">
                                                <i class="fas fa-times-circle"></i>
                                                <span>Cancelar</span>
                                            </button>
                                            <button data-dz-remove class="btn btn-danger delete">
                                                <i class="fas fa-trash"></i>
                                                <span>Eliminar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        @if($article->resources->count())
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Recursos</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($article->resources as $resource)
                                <form class="col-md-3" method="POST" action="{{ route('admin.resources.destroy', $resource) }}">
                                    {{ method_field('DELETE') }} {{ csrf_field() }}
                                    <div>
                                        <button class="btn btn-danger btn-xs" style="position: absolute"><i class="fas fa-trash"></i></button>
                                        <img width="70%" class="img-responsive" src="{{ url(asset('storage/'.$resource->url)) }}" alt="">
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
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
                height: 150,   //set editable area's height
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

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
                url: '/admin/articles/{{ $article->url }}/resources', // Set the url
                acceptedFiles: 'image/*',
                maxFilesize: 2,
                paramName: 'url',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
        });
    </script>
@endpush


