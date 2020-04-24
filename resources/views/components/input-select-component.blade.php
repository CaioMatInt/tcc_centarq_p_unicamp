
<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$id}}">{{$label}} </label>
    <select class="form-control" name="{{$name}}" id="{{$id}}">
        @if(!$current)
            <option selected value="-1">Selecione...</option>
        @endif

        @foreach($options as $key => $option)
            @if (!is_null($current) && $current == $option)
                <option selected value="{{$key}}">{{$option}}</option>
            @else
                <option value="{{$key}}">{{$option}}</option>
            @endif
        @endforeach

    </select>
    @if ($errors->has('"' . $name . '"'))
        <span class="help-block">{{ $errors->first('"' . $name . '"') }}</span>
    @endif
</div>

