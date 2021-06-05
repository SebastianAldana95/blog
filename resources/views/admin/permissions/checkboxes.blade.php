@foreach($permissions as $id => $name)
    <div class="checkbox">
        <label for="permissions"></label>
        <input id="permissions" name="permissions[]" type="checkbox" value="{{ $id }}" {{-- en caso de que ponga problema por el id se pasa la varaible name--}}
            {{ $user->permissions->contains($id) ? 'checked' : '' }}>
        {{ $name }}
    </div>
@endforeach
