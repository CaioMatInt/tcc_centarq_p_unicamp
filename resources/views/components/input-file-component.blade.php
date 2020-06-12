
<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    @if($label)
    <label for="{{$id}}">{{$label}}</label>
    @endif
    <input type="file"
           class="form-control btn btn-outline-info btn-fw"
           name="{{$name}}"
           id="{{$id}}"
           placeholder="{{$label}}"/>
    @if ($errors->has($name))
        <span class="help-block text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
