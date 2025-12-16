@extends('layouts.app')

@section('title', 'Find a Branch - Rose Tyre')

@push('styles')
<style>
    .branches-page {
        padding: 40px 20px 60px 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .branches-container {
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

    .branches-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .branch-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        border-top: 4px solid #1e7e34;
    }

    .branch-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.15);
    }

    .branch-header {
        margin-bottom: 20px;
    }

    .branch-name {
        color: #1e7e34;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .branch-address {
        color: #666;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
    }

    .branch-address-icon {
        margin-right: 10px;
        color: #1e7e34;
        font-size: 1.2rem;
        margin-top: 2px;
    }

    .branch-contact {
        margin-bottom: 20px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        color: #555;
        font-size: 0.95rem;
    }

    .contact-item-icon {
        margin-right: 12px;
        color: #1e7e34;
        font-size: 1.1rem;
        width: 20px;
        text-align: center;
    }

    .contact-item a {
        color: #1e7e34;
        text-decoration: none;
        transition: color 0.3s;
    }

    .contact-item a:hover {
        color: #16692c;
        text-decoration: underline;
    }

    .branch-hours {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .branch-hours-title {
        color: #1e7e34;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .hours-item {
        display: flex;
        justify-content: space-between;
        padding: 5px 0;
        font-size: 0.9rem;
        color: #666;
        border-bottom: 1px solid #e9ecef;
    }

    .hours-item:last-child {
        border-bottom: none;
    }

    .hours-day {
        font-weight: 500;
    }

    .branch-services {
        margin-bottom: 20px;
    }

    .services-title {
        color: #1e7e34;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .services-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .service-badge {
        background: #e8f5e9;
        color: #1e7e34;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .btn-directions {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        padding: 12px 25px;
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

    .btn-directions:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 126, 52, 0.4);
        color: white;
    }

    .btn-directions:active {
        transform: translateY(0);
    }

    .search-section {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 40px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .search-input {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .search-input:focus {
        outline: none;
        border-color: #1e7e34;
        box-shadow: 0 0 0 3px rgba(30, 126, 52, 0.1);
    }

    .hero-banner {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 40px;
        box-shadow: 0 8px 30px rgba(30, 126, 52, 0.3);
    }

    .hero-banner h2 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .hero-banner p {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    @media (max-width: 768px) {
        .branches-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .branch-card {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="branches-page">
    <div class="branches-container">
        <div class="page-header">
            <h1>Find a Branch</h1>
            <p>Visit one of our convenient locations across London</p>
        </div>

        <div class="hero-banner">
            <h2>📍 Multiple Locations Across London</h2>
            <p>Find the nearest Rose Tyre branch to you</p>
        </div>

        <div class="search-section">
            <input type="text" 
                   class="search-input" 
                   placeholder="🔍 Search by location or postcode..."
                   id="branchSearch"
                   onkeyup="filterBranches()">
        </div>

        <div class="branches-grid" id="branchesGrid">
            @foreach($branches as $branch)
            <div class="branch-card" data-branch-name="{{ strtolower($branch['name']) }}" data-branch-address="{{ strtolower($branch['address']) }}">
                <div class="branch-header">
                    <h3 class="branch-name">{{ $branch['name'] }}</h3>
                    <div class="branch-address">
                        <span class="branch-address-icon">📍</span>
                        <span>{{ $branch['address'] }}</span>
                    </div>
                </div>

                <div class="branch-contact">
                    <div class="contact-item">
                        <span class="contact-item-icon">📞</span>
                        <a href="tel:{{ $branch['phone'] }}">{{ $branch['phone'] }}</a>
                    </div>
                    <div class="contact-item">
                        <span class="contact-item-icon">✉️</span>
                        <a href="mailto:{{ $branch['email'] }}">{{ $branch['email'] }}</a>
                    </div>
                </div>

                <div class="branch-hours">
                    <div class="branch-hours-title">🕐 Opening Hours</div>
                    @foreach($branch['hours'] as $day => $time)
                    <div class="hours-item">
                        <span class="hours-day">{{ $day }}</span>
                        <span>{{ $time }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="branch-services">
                    <div class="services-title">🛠️ Services Available</div>
                    <div class="services-list">
                        @foreach($branch['services'] as $service)
                        <span class="service-badge">{{ $service }}</span>
                        @endforeach
                    </div>
                </div>

                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($branch['address']) }}" 
                   target="_blank" 
                   class="btn-directions">
                    Get Directions
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function filterBranches() {
        const input = document.getElementById('branchSearch');
        const filter = input.value.toLowerCase();
        const cards = document.querySelectorAll('.branch-card');

        cards.forEach(card => {
            const name = card.getAttribute('data-branch-name');
            const address = card.getAttribute('data-branch-address');
            
            if (name.includes(filter) || address.includes(filter)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endsection

