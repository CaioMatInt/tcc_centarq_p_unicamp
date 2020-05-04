
<label for="{{$id}}"> @if(isset($label)) {{$label}} @endif</label>
<br>
<textarea name={{$name}} id={{$id}}>

    @if(isset($value))
        {{$value}}
    @endif

</textarea>
