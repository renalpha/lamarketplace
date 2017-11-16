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
    <table class="table" id="sortableTable">
        @if(isset($categories) && count($categories) > 0)
            <tbody>
            @each('marketplace::admin.modules.marketplace.categories.elements._category', $categories, 'category')
            </tbody>
        @endif
    </table>
@stop