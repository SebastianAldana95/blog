@extends('layout')

@section('content')
    <section class="pages container">
        <div class="page">
            <div class="mainbox">
                <div class="err">4</div>
                <i class="far fa-question-circle fa-spin"></i>
                <div class="err2">4</div>
                <div class="msg">¿Quizás esta página se movió? ¿Fue eliminado? ¿Está en cuarentena? ¿Nunca existió en primer lugar?
                    <p>Vamos
                        <a style="text-decoration: underline;" href="{{ route('pages.home') }}">Inicio</a>
                        e intente desde allí.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="/css/page404.css">
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
@endpush

