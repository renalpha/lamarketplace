@extends('marketplace::site.layouts.master')

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
                    <h4>Rubrieken</h4>
                    @if(count(\MarketplaceService::getCategories()) > 0)
                        <?php
                        $chunks_categories = \MarketplaceService::getCategories()->whereNull('parent_id')->orderBy('priority')->getAll()->chunk(4);
                        ?>
                        @foreach($chunks_categories as $category_chunk)
                            <ul>
                                @each('marketplace::site.layouts.elements._category_chunk', $category_chunk, 'category')
                            </ul>
                        @endforeach
                        <div class="clear"></div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <strong>Grafi-fix aanbieding</strong><br/>
                Onderhoud op uw snijmachine
            </div>
        </div>
    </div>
@stop