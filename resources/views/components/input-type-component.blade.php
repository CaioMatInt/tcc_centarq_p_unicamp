
<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$id}}">{{$label}}</label>
    <input type="{{$type}}"
           class="pl-1 {{ !empty($class) ? 'form-control ' . $class : 'form-control' }}"
           name="{{$name}}"
           id="{{$id}}"
           value="{{ old($name) ?: (!empty($value) ? $value : '') }}"
           placeholder=" {{$label}}"
           {!! $customAttributes !!} >
    @if ($errors->has($name))
        <span class="help-block text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
