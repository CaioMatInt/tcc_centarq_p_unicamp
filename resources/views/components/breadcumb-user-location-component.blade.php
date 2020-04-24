<div class="row">
    <div class="col-sm">
        <h4>{{ $pageTitle }}</h4></div>
    <div class="pull-right" style="display:block;">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Painel</a></li>

            <span class="ml-1 mr-1">/</span>

            @foreach($previousLinks as $previousLink)

                <li><a href="{{$previousLink['link']}}">{{$previousLink['name']}}</a></li>

                <span class="ml-1 mr-1">/</span>

            @endforeach

            <li class="active">{{$pageTitle}}</li>
        </ol>
    </div>
    <br>
</div>
