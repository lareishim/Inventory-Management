@extends('layouts.app')

@section('title', 'Car Parts - AutoParts Pro')

@section('content')
    <main>
        <div class="products-header">
            <h2>Car Parts Catalog</h2>
            <p>Find the perfect parts for your vehicle from our extensive inventory</p>
        </div>

        <div class="product-filters">
            <button class="filter-btn active" onclick="filterProducts('all', event)">All Parts</button>
            @foreach ($categories as $category)
                <button class="filter-btn"
                    onclick="filterProducts('{{ strtolower(str_replace(['&', ' '], ['', '-'], $category->name)) }}', event)">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card"
                    data-category="{{ strtolower(str_replace(['&', ' '], ['', '-'], $product->category->name)) }}"
                    onclick="showProductDetails('{{ $product->name }}', '{{ $product->category->name }}', {{ $product->stock }}, '{{ $product->image_path }}', '${{ number_format($product->price, 2) }}')">
                    <img src="{{ $product->image_path }}" alt="{{ $product->name }}" />
                    <div class="product-info">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-price">${{ number_format($product->price, 2) }}</div>
                        <div class="product-stock">In Stock: {{ $product->stock }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Product Modal -->
        <div id="productModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">×</span>
                <img id="modalImg" src="" alt="" />
                <h3 id="modalName"></h3>
                <p><strong>Category:</strong> <span id="modalType"></span></p>
                <p><strong>Price:</strong> <span id="modalPrice"></span></p>
                <p><strong>In Stock:</strong> <span id="modalStock"></span></p>
                <div class="modal-actions">
                    <button class="btn btn-primary">Add to Cart</button>
                    <button class="btn btn-secondary">View Details</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        function filterProducts(category, event) {
            const cards = document.querySelectorAll('.product-card');
            cards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                card.style.display = (category === 'all' || cardCategory === category) ? 'block' : 'none';
            });

            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }

        function showProductDetails(name, category, stock, image, price) {
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalType').textContent = category;
            document.getElementById('modalStock').textContent = stock;
            document.getElementById('modalImg').src = image;
            document.getElementById('modalPrice').textContent = price;
            document.getElementById('productModal').classList.add('show');
        }

        function closeModal() {
            document.getElementById('productModal').classList.remove('show');
        }
    </script>
@endsection