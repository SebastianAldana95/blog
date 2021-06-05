@foreach($roles as $role)
    <div class="checkbox">
        <label for="roles"></label>
        <input id="roles" name="roles[]" type="checkbox" value="{{ $role->id }}" {{-- en caso de que ponga problema por el id se pasa la varaible name--}}
            {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
        {{ $role->name }} <br>
        <small class="form-text text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
    </div>
@endforeach
