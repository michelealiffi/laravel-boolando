@extends('layouts.default')

@section('title')
    Booleando - Home Page
@endsection

@section('main')
    <div class="container mb-5">
        <div class="row row-cols-3 g-5">
            @foreach ($products as $product)
                <div class="col">
                    @include('partials.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
