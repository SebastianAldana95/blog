@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Datos personales</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   value="{{ old('name', $user->name) }}">
                            {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email"
                                   name="email"
                                   type="email"
                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                   value="{{ old('email', $user->email) }}">
                            {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña: </label>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   placeholder="Contraseña"
                                   >
                            {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
                            <small class="form-text text-muted">Dejar en blanco para no cambiar contraseña</small>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar contraseña:</label>
                            <input id="password_confirmation"
                                   name="password_confirmation"
                                   type="password"
                                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   placeholder="Repite la contraseña"
                                   >
                            {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Actualizar usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Roles</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
                        @csrf @method('PUT')

                        @include('admin.roles.checkboxes')

                        <button class="btn btn-primary btn-block">Actualizar roles</button>
                    </form>
                </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Permisos</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                        @csrf @method('PUT')
                        @include('admin.permissions.checkboxes')
                        <button class="btn btn-primary btn-block">Actualizar permisos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
