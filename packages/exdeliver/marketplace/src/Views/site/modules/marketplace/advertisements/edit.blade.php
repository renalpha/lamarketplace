@extends('marketplace::site.layouts.master')

@section('title')
    @if(isset($content->title))
        <h1 class="mainTitle">{{ ucfirst($content->title) }}</h1>
    @endif
    @if(isset($content->subtitle))
        <span class="mainDescription">{{ ucfirst($content->subtitle) }} </span>
    @endif
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-12 no-padding">
                    <div class="banner-top">
                        <h4>Banner</h4>
                        Hier kan uw advertentie komen te staan.
                    </div>
                </div>
                <div class="col-md-12">
                    <hr />
                </div>
                <div class="col-md-12 categories">
                    {!! Form::model($advertisement, ['class' => 'edit-advertisement']) !!}
                    @include('marketplace::admin.modules.marketplace.advertisements.elements._advertisement_form')
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@stop