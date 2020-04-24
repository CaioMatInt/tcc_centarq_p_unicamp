
<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$id}}">{{$label}}</label>
    <input type="file"
           class="form-control btn btn-outline-info btn-fw"
           name="{{$name}}"
           id="{{$id}}"
           placeholder="{{$label}}"
           accept="image/*" />
    @if ($errors->has($name))
        <span class="help-block">{{ $errors->first($name) }}</span>
    @endif
</div>
