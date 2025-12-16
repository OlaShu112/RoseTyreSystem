@extends('layouts.app')

@section('title', 'Special Offers - Rose Tyre')

@push('styles')
<style>
    .offers-page {
        padding: 40px 20px 60px 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .offers-container {
        max-width: 1200px;
        margin: 0 auto;
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

    .offers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .offer-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
    }

    .offer-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.15);
    }

    .offer-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #dc3545;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 2px 10px rgba(220, 53, 69, 0.3);
    }

    .offer-badge.best-value {
        background: #ffc107;
        color: #000;
        box-shadow: 0 2px 10px rgba(255, 193, 7, 0.3);
    }

    .offer-badge.student {
        background: #17a2b8;
        box-shadow: 0 2px 10px rgba(23, 162, 184, 0.3);
    }

    .offer-badge.package {
        background: #6f42c1;
        box-shadow: 0 2px 10px rgba(111, 66, 193, 0.3);
    }

    .offer-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        background: #f8f9fa;
    }

    .offer-content {
        padding: 25px;
    }

    .offer-discount {
        display: inline-block;
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        box-shadow: 0 4px 15px rgba(30, 126, 52, 0.3);
    }

    .offer-title {
        color: #1e7e34;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .offer-description {
        color: #666;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .offer-validity {
        display: flex;
        align-items: center;
        color: #999;
        font-size: 0.9rem;
        margin-bottom: 20px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .offer-validity-icon {
        margin-right: 8px;
        font-size: 1.1rem;
    }

    .btn-claim {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        width: 100%;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-claim:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 126, 52, 0.4);
        color: white;
    }

    .btn-claim:active {
        transform: translateY(0);
    }

    .hero-banner {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        padding: 60px 30px;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 50px;
        box-shadow: 0 8px 30px rgba(30, 126, 52, 0.3);
    }

    .hero-banner h2 {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .hero-banner p {
        font-size: 1.2rem;
        opacity: 0.95;
    }

    @media (max-width: 768px) {
        .offers-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .hero-banner h2 {
            font-size: 2rem;
        }

        .offer-image {
            height: 200px;
        }
    }
</style>
@endpush

@section('content')
<div class="offers-page">
    <div class="offers-container">
        <div class="page-header">
            <h1>Special Offers</h1>
            <p>Don't miss out on these amazing deals! Limited time offers on premium tyres</p>
        </div>

        <div class="hero-banner">
            <h2>🎉 Exclusive Deals Available Now!</h2>
            <p>Save big on premium tyres with our special offers. Book your fitting today!</p>
        </div>

        <div class="offers-grid">
            @foreach($offers as $offer)
            <div class="offer-card">
                <span class="offer-badge {{ strtolower(str_replace(' ', '-', $offer['badge'])) }}">
                    {{ $offer['badge'] }}
                </span>
                <img src="{{ asset('images/' . $offer['image']) }}" alt="{{ $offer['title'] }}" class="offer-image">
                <div class="offer-content">
                    <div class="offer-discount">{{ $offer['discount'] }}% OFF</div>
                    <h3 class="offer-title">{{ $offer['title'] }}</h3>
                    <p class="offer-description">{{ $offer['description'] }}</p>
                    <div class="offer-validity">
                        <span class="offer-validity-icon">⏰</span>
                        <span>Valid until: {{ date('F d, Y', strtotime($offer['valid_until'])) }}</span>
                    </div>
                    <a href="{{ route('booking') }}" class="btn-claim">Claim This Offer</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

