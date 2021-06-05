@extends('admin.layout')

@section('content')
   <div class="row">
       <div class="col-md-6">
           <div class="card card-primary card-outline">
               <div class="card-header">
                   <h3 class="card-title">Datos personales</h3>
               </div>
               <div class="card-body">
                   <form method="POST" action="{{ route('admin.users.store') }}">
                       @csrf
                       <div class="form-group">
                           <label for="name">Nombre:</label>
                           <input id="name"
                                  name="name"
                                  type="text"
                                  class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                  value="{{ old('name') }}">
                           {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                       </div>
                       <div class="form-group">
                           <label for="email">Email:</label>
                           <input id="email"
                                  name="email"
                                  type="email"
                                  class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                  value="{{ old('email') }}">
                           {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                       </div>

                       <div class="row form-group">
                           <div class="form-check col-md-6">
                               <label>Roles</label>
                               @include('admin.roles.checkboxes')
                           </div>

                           <div class="form-check col-md-6">
                               <label>Permisos</label>
                               @include('admin.permissions.checkboxes')
                           </div>
                       </div>

                       <small class="form-group form-text text-muted">La contraseña será generada y enviada al nuevo usuario via email</small>

                       <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-block">Crear usuario</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
@endsection
