@section('title')
    @if(isset($content->title))
        <h1 class="mainTitle">{{ ucfirst($content->title) }}</h1>
    @endif
    @if(isset($content->subtitle))
        <span class="mainDescription">{{ ucfirst($content->subtitle) }} </span>
    @endif
@stop

@section('content')
    {!! Form::model($advertisement, ['class' => 'foobar']) !!}
    @include('marketplace::modules.marketplace.categories.elements._advertisement_form')
    {!! Form::close() !!}
@stop