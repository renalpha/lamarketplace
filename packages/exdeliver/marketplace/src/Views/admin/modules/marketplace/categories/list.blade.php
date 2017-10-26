@extends('marketplace::admin.layouts.master')

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
            <th>{!! trans('marketplace::elements.advertisements') !!}</th>
            <th>{!! trans('marketplace::elements.created_at') !!}</th>
            <th>{!! trans('marketplace::elements.updated_at') !!}</th>
            <th>{!! trans('marketplace::elements.manage') !!}</th>
            </thead>
        </tr>
        @if(isset($categories) && count($categories) > 0)
            @foreach($categories as $category)
                <tr>
                    <td>
                        {!! $category->id !!}
                    </td>
                    <td>
                        <a href="/category/{!! $category->slug !!}" target="_blank">{!! $category->title !!}</a>
                    </td>
                    <td>
                        {!! count($category->advertisements) !!}
                    </td>
                    <td>
                        {!! date('d-m-Y H:i', strtotime($category->created_at)) !!}
                    </td>
                    <td>
                        {!! date('d-m-Y H:i', strtotime($category->created_at)) !!}
                    </td>
                    <td>
                        @include('marketplace::admin.modules.marketplace.categories.elements._manage_btns')
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@stop