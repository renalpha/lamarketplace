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
    {!! Form::model($advertisement, ['class' => 'foobar']) !!}
    <div class="form-group">
        <label for="title">{{ trans('marketplace::elements.user') }}</label>
        {!! Form::select('user_id', \MarketplaceService::selectUser(['selection' => true]), null, ['class' => 'form-control']) !!}
    </div>
    @include('marketplace::admin.modules.marketplace.advertisements.elements._advertisement_form')
    {!! Form::close() !!}
@stop