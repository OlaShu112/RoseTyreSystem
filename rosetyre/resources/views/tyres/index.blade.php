@extends('layouts.app')

@section('title', 'Tyres - Rose Tyre')

@push('styles')
<style>
    .tyres-page {
        padding: 40px 20px;
        min-height: calc(100vh - 200px);
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .page-header h1 {
        color: #1e7e34;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .page-header p {
        color: #666;
        font-size: 1.1rem;
    }

    .tyres-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .tyre-item {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        margin-bottom: 30px;
        height: 100%;
    }

    .tyre-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .tyre-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        background: #f8f9fa;
    }

    .tyre-card-body {
        padding: 25px;
    }

    .tyre-brand {
        color: #1e7e34;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .tyre-size {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 15px;
    }

    .tyre-price {
        font-size: 1.8rem;
        font-weight: 700;
        color: #dc3545;
        margin-bottom: 10px;
    }

    .tyre-stock {
        color: #28a745;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .tyre-stock.low {
        color: #ffc107;
    }

    .tyre-stock.out {
        color: #dc3545;
    }

    .btn-book {
        background-color: #1e7e34;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 500;
        width: 100%;
        transition: background-color 0.3s;
    }

    .btn-book:hover {
        background-color: #16692c;
        color: white;
    }

    .btn-book:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .tyre-image {
            height: 200px;
        }
    }
</style>
@endpush

@section('content')
<div class="tyres-page">
    <div class="tyres-container">
        <div class="page-header">
            <h1>Available Tyres</h1>
            <p>Browse our wide selection of premium tyres for all vehicle types</p>
        </div>

        <div class="row">
            @foreach($tyres as $index => $tyre)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="tyre-item">
                    @php
                        $tyreImages = ['tier1.jpeg', 'tier2.jpeg', 'tier3.jpeg', 'tier5.jpeg'];
                        $imageIndex = $index % count($tyreImages);
                    @endphp
                    <img src="{{ asset('images/' . $tyreImages[$imageIndex]) }}" alt="{{ $tyre['brand'] }}" class="tyre-image">
                    <div class="tyre-card-body">
                        <h3 class="tyre-brand">{{ $tyre['brand'] }}</h3>
                        <p class="tyre-size">{{ $tyre['size'] }}</p>
                        <div class="tyre-price">£{{ number_format($tyre['price'], 2) }}</div>
                        <p class="tyre-stock {{ $tyre['stock'] == 0 ? 'out' : ($tyre['stock'] < 5 ? 'low' : '') }}">
                            @if($tyre['stock'] == 0)
                                Out of Stock
                            @else
                                In Stock: {{ $tyre['stock'] }} available
                            @endif
                        </p>
                        <a href="{{ route('booking') }}" class="btn btn-book" {{ $tyre['stock'] == 0 ? 'disabled' : '' }}>
                            {{ $tyre['stock'] == 0 ? 'Out of Stock' : 'Book Tyre Fitting' }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
