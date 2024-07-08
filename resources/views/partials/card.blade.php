@php
    $hasDiscount = false;
    $price = $product['price'];
    foreach ($product['badges'] as $key => $badge) {
        if ($badge['type'] === 'discount') {
            $hasDiscount = true;
            $price = ($price / 100) * (100 + intval($badge['value']));
            $price = number_format($price, 2, ',', '');
        }
    }
@endphp

<div class="position-relative">
    {{-- IMMAGINI --}}
    <div class="position-relative">
        <img class="w-100 front-image" src="{{ Vite::asset('resources/img/' . $product['frontImage']) }}"
            alt="Immagine prodotto">
        <img class="w-100 position-absolute top-0 start-0"
            src="{{ Vite::asset('resources/img/' . $product['backImage']) }}" alt="Immagine  class ="mb-0"prodotto
            lass ="mb-0"">

        <div class="position-absolute d-flex gap-2 badges-section">
            @foreach (array_reverse($product['badges']) as $badge)
                @include('partials.badge')
            @endforeach
        </div>
    </div>


    {{-- TITOLO E PREZZO --}}
    <span class="mb-0 fs-5">{{ $product['brand'] }}</span>
    <h3 class="mb-0 lh-1 fs-3"> {{ $product['name'] }} </h3>
    <span class="text-danger fs-5">
        <span class="fw-bold">
            {{ $price }}&euro;
        </span>
        @if ($hasDiscount)
            <span class="text-dark text-decoration-line-through">
                {{ $product['price'] }}&euro;
            </span>
        @endif
    </span>
</div>
