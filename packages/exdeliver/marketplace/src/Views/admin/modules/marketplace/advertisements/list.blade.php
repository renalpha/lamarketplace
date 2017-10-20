@section('title')
    @if(isset($content->title))
        <h1 class="mainTitle">{{ ucfirst($content->title) }}</h1>
    @endif
    @if(isset($content->subtitle))
        <span class="mainDescription">{{ ucfirst($content->subtitle) }} </span>
    @endif
@stop

@section('content')
    <table class="table">
        <tr>
            <thead>
            <th>{!! trans('marketplace::elements.id') !!}</th>
            <th>{!! trans('marketplace::elements.title') !!}</th>
            <th>{!! trans('marketplace::elements.creaated_at') !!}</th>
            <th>{!! trans('marketplace::elements.updated_at') !!}</th>
            <th>{!! trans('marketplace::elements.manage') !!}</th>
            </thead>
        </tr>
        @if(isset($advertisements) && count($advertisements) > 0)
            @foreach($advertisements as $advertisement)
                <tr>
                    <td>
                        {!! $advertisement->id !!}
                    </td>
                    <td>
                        {!! $advertisement->title !!}
                    </td>
                    <td>
                        {!! date('d-m-Y H:i', strtotime($advertisement->created_at)) !!}
                    </td>
                    <td>
                        {!! date('d-m-Y H:i', strtotime($advertisement->created_at)) !!}
                    </td>
                    <td>
                        Manage btns
                    </td>
                </tr>
                @endforeach
            @endif
    </table>
@stop