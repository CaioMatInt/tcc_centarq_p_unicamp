@component('mail::message')

@if (! empty($greeting))
    # {{ $greeting }}
@else
    @if ($level === 'error')
        # @lang('Whoops!')
    @else
        # @lang('Hello!'), {{$user->name}}
    @endif
@endif

{{$user->resetLink}}
Sua conta foi criada com sucesso em nosso sistema.
Por favor, clique no link abaixo para definir sua senha.
@component('mail::button', ['url' => $user->resetLink])
Redefinir senha
@endcomponent

@endcomponent
