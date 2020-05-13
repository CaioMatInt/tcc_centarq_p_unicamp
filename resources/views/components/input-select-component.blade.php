
<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$id}}">{{$label}} </label>
    <select class="form-control" name="{{$name}}" id="{{$id}}">

        {{--Se o usuário já selecionou uma opção e enviou o formulário, mas o backend retornou erros, é necessário re-selecionar a opção anteriormente selecionada--}}
        @if(old($name))

            @foreach($options as $key => $option)
                @if (old($name) == $key)
                    <option selected value="{{$key}}">{{$option}}</option>
                @else
                    <option value="{{$key}}">{{$option}}</option>
                @endif
            @endforeach

        @else

            {{--Se há uma array de opções p/ selecionar, mas não foi definido um valor selecionado por padrão--}}
            @if(!$current)
                <option selected value="">Selecione...</option>
                @foreach($options as $key => $option)
                        <option value="{{$key}}">{{$option}}</option>
                @endforeach
             {{--Se há uma array de opções p/ selecionar, e foi definido um valor selecionado por padrão--}}
            @elseif($current)
                @foreach($options as $key => $option)
                    @if ($current == $option)
                        <option selected value="{{$key}}">{{$option}}</option>
                    @else
                        <option value="{{$key}}">{{$option}}</option>
                    @endif
                @endforeach
            @endif

        @endif



    </select>

    @if ($errors->has($name))
        <span class="help-block text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>

