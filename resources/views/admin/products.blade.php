@extends('layouts.master')

@section('title', 'Manage Products')

@section('content')
    <div class="admin-product-page">
        <div class="container">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Manage Products
                </h3>
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ADD PRODUCT BUTTON --}}
            <button class="btn mb-4" style=" color: white; background-color: #af5ad0" onclick="openAddModal()">Add
                Product</button>

            {{-- PRODUCT TABLE --}}
            <div class="table-card">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price ($)</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ $product->image_path }}" alt="{{ $product->name }}" width="60" height="60"
                                        style="object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary"
                                        onclick="openEditModal({{ $product->id }}, '{{ $product->name }}', {{ $product->category_id }}, '{{ $product->price }}', {{ $product->stock }}, '{{ $product->image_path }}')">Edit</button>
                                    <button class="btn btn-sm"
                                        style="color: #ffffff; background-color: red; text-decoration: none;"
                                        onclick="openDeleteModal({{ $product->id }})">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Product Modal -->
        <div id="addProductModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeAddModal()">&times;</span>
                <h3>Add New Product</h3>
                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Product Name" required>
                    <select name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" step="0.01" name="price" placeholder="Price" required>
                    <input type="number" name="stock" placeholder="Stock" required>
                    <input type="url" name="image_path" placeholder="Image URL" required>
                    <button type="submit">Add Product</button>
                </form>
            </div>
        </div>

        <!-- Edit Product Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h3>Edit Product</h3>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" id="editName" required>
                    <select name="category_id" id="editCategory" required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" step="0.01" name="price" id="editPrice" required>
                    <input type="number" name="stock" id="editStock" required>
                    <input type="url" name="image_path" id="editImagePath" placeholder="Image URL">
                    <img id="previewImage" src="" alt="Preview"
                        style="margin-top: 10px; max-width: 100%; border-radius: 6px;">
                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeDeleteModal()">&times;</span>
                <h4>Are you sure you want to delete this product?</h4>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn custom-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addProductModal').classList.add('show');
        }

        function closeAddModal() {
            document.getElementById('addProductModal').classList.remove('show');
        }

        function openEditModal(id, name, categoryId, price, stock, image) {
            document.getElementById('editForm').action = `/admin/products/${id}`;
            document.getElementById('editName').value = name;
            document.getElementById('editCategory').value = categoryId;
            document.getElementById('editPrice').value = price;
            document.getElementById('editStock').value = stock;
            document.getElementById('editImagePath').value = image;
            document.getElementById('previewImage').src = image;
            document.getElementById('editModal').classList.add('show');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('show');
        }

        function openDeleteModal(id) {
            document.getElementById('deleteForm').action = `/admin/products/${id}`;
            document.getElementById('deleteModal').classList.add('show');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
        }
    </script>
@endsection