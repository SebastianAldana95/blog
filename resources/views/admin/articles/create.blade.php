<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.articles.store', '#create') }}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el título del nuevo artículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" hidden>Titulo del articulo</label>
                        <input id="title"
                               name="title"
                               type="text"
                               class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                               value="{{ old('title') }}"
                               placeholder="Ingresa titulo del articulo"
                               autofocus required>
                        {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Crear artículo</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        if (window.location.hash === '#create')
        {
            $('#exampleModal').modal('show');
        }

        $('#exampleModal').on('hide.bs.modal', function (){
            window.location.hash = '#';
        });

        $('#exampleModal').on('shown.bs.modal', function (){
            $('#title').focus();
            window.location.hash = '#create';
        });
    </script>
@endpush


