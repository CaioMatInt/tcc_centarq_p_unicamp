

<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$id}}">{{$label}} </label>
    <select class="form-control" id="{{$id}}" name="{{$name}}[]" multiple="multiple">

            {{--Se há uma array de opções p/ selecionar, mas não foi definido um valor selecionado por padrão--}}
            @if(!$current)
                @foreach($options as $key => $option)
                        <option value="{{$key}}">{{$option}}</option>
                @endforeach
             {{--Se há uma array de opções p/ selecionar, e foram selecionados valores por padrão--}}
            @elseif($current)
                @foreach($options as $key => $option)
                    {{--$key é sempre a chave do array, e ao mesmo tempo o seu id, p ex 1 => Teste, 1 é a posicão no array e também seu id na base de dados--}}
                    @if (in_array($key, $current))
                        <option selected value="{{$key}}">{{$option}}</option>
                    @else
                        <option value="{{$key}}">{{$option}}</option>
                    @endif
                @endforeach
            @endif

    </select>

    @if ($errors->has($name))
        <span class="help-block text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>

