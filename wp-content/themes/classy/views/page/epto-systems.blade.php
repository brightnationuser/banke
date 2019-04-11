@extends('layout.default')

@section('content')
    <div class="page-tabs">
        <div class="page-tabs__item m_active" data-id="1">
            Concept
        </div>
        <div class="page-tabs__item" data-id="2">
            Products
        </div>
        <div class="page-tabs__item" data-id="3">
            References
        </div>
        <div class="page-tabs__item" data-id="4">
            Media
        </div>
    </div>

    <div class="tab tab-concept m_active" data-id="1">

        <div class="container">
            @include('partials.epto-slider')
        </div>

    </div>

    <div class="tab tab-products" data-id="2">
    </div>

    <div class="tab tab-references" data-id="3">
    </div>

    <div class="tab tab-media" data-id="4">
    </div>
@stop