@extends('marketplace::site.layouts.master')

@section('breadcrumb')
    <li class="active">{!! $category->title !!}</li>
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
                <div class="col-md-12 categories">
                    <h2>{!! ucfirst($category->title) !!}</h2>
                    <a href="/advertisements/new" class="pull-right btn btn-sm btn-primary">{!! trans('marketplace::elements.create_new_name', ['name' => trans('marketplace::elements.advertisement')]) !!}</a>
                    @if(count($category->childs) > 0)
                        <ul class="homes-list">

                            @each('marketplace::site.layouts.elements._category_chunk', $category->childs, 'category')

                        </ul>
                        <div class="clear"></div>
                        <hr class="purple"/>
                    @endif
                    {!! $category->description !!}
                    <p><br/></p>
                    <div class="clear"></div>
                    <hr class="purple"/>
                </div>
                <div class="col-md-12 advertisements">
                    @if(count($category->advertisements) > 0)
                        @each('marketplace::site.layouts.elements._advertisement', $category->advertisements, 'advertisement')
                    @endif
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@stop