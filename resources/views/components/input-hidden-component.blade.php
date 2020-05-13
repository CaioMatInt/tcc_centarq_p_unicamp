<input type="hidden" class="form-control" name='{{$name}}' id="{{$id}}"
       value="
@if(old($name))
{{old($name)}}
@elseif(isset($value))
{{$value}}
@endif">
