<div class="row content-head-title-breadcumb-reverse">

    <div class="pageTitle col-12 col-xl-7">
        <h4>{{ $pageTitle }}</h4>
    </div>
    <div class="col-12 col-xl-5 pull-right text-center" style="display:block; flex-direction: column-reverse;">
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
