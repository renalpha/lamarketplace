@extends('marketplace::site.layouts.master')

@section('breadcrumb')
    <li><a href="/category/{!! $advertisement->category->slug !!}">{!! $advertisement->category->title !!}</a></li>
    <li class="active">{!! $advertisement->title !!}</li>
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
                    <h4>{!! $advertisement->title !!}</h4>
                    {!! $advertisement->content !!}
                </div>
            </div>
            <div class="col-md-4">
                @if(\Auth::check() && \Auth::user()->id == $advertisement->user_id)
                    <div>
                        <h3>Beheer</h3>
                        <hr class="purple"/>
                        <a href="/advertisements/remove/{!! $advertisement->id !!}"
                           class="btn btn-sm btn-danger"><i
                                    class="fa fa-remove"></i> {!! trans('marketplace::elements.remove') !!}</a>

                        <a href="/advertisements/edit/{!! $advertisement->id !!}"
                           class="btn btn-sm btn-danger">{!! trans('marketplace::elements.edit') . ' ' .trans('marketplace::elements.advertisement') !!}</a>
                    </div>
                @endif
                <h3>Over de adverteerder</h3>
                <hr class="purple"/>
                <div class="caption" class="pull-left">
                    <h4>
                        {!! $advertisement->vendor->contact->full_name !!}
                    </h4>
                    @if(isset($advertisement->vendor->contact->email) && $advertisement->vendor->contact->email != '')
                        <small><b>E-mail: </b>{!! $advertisement->vendor->contact->email !!}</small><br/>
                    @endif
                    @if(isset($advertisement->vendor->contact->phone) && $advertisement->vendor->contact->phone != '')
                        <small><b>Telefoonnummer: </b>{!! $advertisement->vendor->contact->phone !!}</small><br/>
                    @endif
                    @if(isset($advertisement->vendor->contact->mobile) && $advertisement->vendor->contact->mobile != '')
                        <small><b>Mobiel: </b>{!! $advertisement->vendor->contact->mobile !!}</small><br/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop