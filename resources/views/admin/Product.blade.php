@extends('admin.Main')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        .main-content {
            padding: 40px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #fff;
            padding-bottom: 20px;
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 36px;
            font-weight: 700;
        }

        .btn-custom {
            background: #fff;
            color: #000;
            border: 2px solid #fff;
            padding: 12px 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-custom:hover {
            background: #000;
            color: #fff;
        }

        .search-container {
            background: #000;
            border: 2px solid #fff;
            padding: 30px;
            margin-bottom: 40px;
        }

        .search-row {
            display: flex;
            gap: 15px;
            align-items: end;
        }

        .search-field {
            flex: 1;
        }

        .search-field label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
        }

        .search-field input,
        .search-field select {
            width: 100%;
            padding: 12px;
            background: #000;
            border: 1px solid #fff;
            color: #fff;
        }

        .stat-card {
            background: #000;
            border: 2px solid #fff;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
        }

        .stat-card:hover {
            background: #fff;
            color: #000;
            transform: translateY(-5px);
        }

        .stat-card i {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .stat-card h3 {
            font-size: 42px;
            font-weight: 700;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #fff;
            padding-bottom: 15px;
        }

        .view-btn {
            background: #000;
            color: #fff;
            border: 2px solid #fff;
            padding: 8px 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .view-btn:hover,
        .view-btn.active {
            background: #fff;
            color: #000;
        }

        .product-card {
            background: #000;
            border: 2px solid #fff;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            background: #fff;
            color: #000;
            padding: 40px;
            text-align: center;
            font-size: 64px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-body {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-category {
            font-size: 12px;
            text-transform: uppercase;
            opacity: 0.7;
            margin-bottom: 15px;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #fff;
        }

        .info-item .number {
            font-size: 24px;
            font-weight: 700;
            display: block;
        }

        .info-item .label {
            font-size: 11px;
            text-transform: uppercase;
        }

        .product-actions {
            display: flex;
            gap: 10px;
            margin-top: auto;
        }

        .btn-action {
            flex: 1;
            background: #000;
            color: #fff;
            border: 1px solid #fff;
            padding: 10px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-action:hover {
            background: #fff;
            color: #000;
        }

        .btn-action.btn-delete:hover {
            background: #f44336;
            border-color: #f44336;
        }

        .product-list-item {
            background: #000;
            border: 2px solid #fff;
            padding: 25px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .list-item-left {
            display: flex;
            align-items: center;
            gap: 30px;
            flex: 1;
        }

        .list-item-image {
            font-size: 48px;
            width: 80px;
            text-align: center;
        }

        .list-item-stats {
            display: flex;
            gap: 30px;
        }

        .hidden {
            display: none;
        }

        .modal-content {
            background: #000;
            border: 2px solid #fff;
        }

        .modal-content input,
        .modal-content select,
        .modal-content textarea {
            background: #000;
            border: 1px solid #fff;
            color: #fff;
            padding: 10px;
        }

        @media (max-width: 768px) {
            .search-row {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    @section('body')
    <div class="main-content">
        <div class="page-header">
            <h1>Product Management</h1>
            <button class="btn-custom" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="fas fa-plus"></i> Add Product</button>
        </div>

        <div class="search-container">
            <div class="search-row">
                <div class="search-field"><label>Product Name</label><input type="text" id="searchName" placeholder="Search..."></div>
                <div class="search-field"><label>Category</label>
                    <select id="searchCategory">
                        <option value="">All</option>
                        <option value="electronics">Electronics</option>
                        <option value="clothing">Clothing</option>
                        <option value="books">Books</option>
                    </select>
                </div>
                <div class="search-field"><label>Status</label>
                    <select id="searchStatus">
                        <option value="">All</option>
                        <option value="in-stock">In Stock</option>
                        <option value="low-stock">Low Stock</option>
                        <option value="out-of-stock">Out of Stock</option>
                    </select>
                </div>
                <button class="btn-custom" onclick="search()">Search</button>
                <button class="btn-custom" onclick="clear()">Clear</button>
            </div>
        </div>

        <div class="modal fade" id="addProduct">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-black p-4">
                    <form id="form" action="{{route('CreateProduct')}}" method="post">
                        @csrf
                        <h1 class="text-center mb-4">Add New Product</h1>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label>Name</label>
                                <input type="text" required name="title" class="w-100 py-2 ps-2">
                            </div>
                            <div class="col-md-6 mb-3"><label>Category</label>
                                <select name="category_id" class="w-100 py-2 ps-2">
                                    @foreach($allcategory as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label>Price</label><input type="number" required name="price" class="w-100 py-2 ps-2"></div>
                            <div class="col-md-6 mb-3"><label>Stock</label><input type="number" required name="stock" class="w-100 py-2 ps-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3"><label>Description </label><input type="text" required name="description" class="w-100 py-2 ps-2"></div>
                        </div>
                        <div class="d-flex gap-2 justify-content-end">
                            <button type="button" class="btn-custom" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn-custom">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <div class="stat-card"><i class="fas fa-box"></i>
                    <h3 id="total">{{$allproduct->count()}}</h3>
                    <p>Total</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-card"><i class="fas fa-check-circle"></i>
                    <h3 id="inStock">4</h3>
                    <p>In Stock</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-card"><i class="fas fa-exclamation-triangle"></i>
                    <h3 id="lowStock">1</h3>
                    <p>Low Stock</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-card"><i class="fas fa-times-circle"></i>
                    <h3 id="outStock">1</h3>
                    <p>Out of Stock</p>
                </div>
            </div>
        </div>

        <div class="section-header">
            <h2>All Products</h2>
            <div class="view-toggle">
                <button class="view-btn active" onclick="toggleView('grid')"><i class="fas fa-th"></i> Grid</button>
                <button class="view-btn" onclick="toggleView('list')"><i class="fas fa-list"></i> List</button>
            </div>
        </div>

        <div id="gridView">
            <div class="row">
                @if ($allproduct->count()>0)

                @foreach($allproduct as $myproduct)

                <div class="col-md-4 mb-4">
                    <div class="product-card" data-name="wireless headphones" data-category="electronics" data-status="in-stock">
                        <div class="product-image"><i class="fas fa-headphones"></i></div>
                        <div class="product-body">
                            <h5>{{$myproduct->title}}</h5>
                            <p class="product-category">{{$myproduct->category->name}}</p>
                            <div class="product-info">
                                <div class="info-item"><span class="number">${{$myproduct->price}}</span><span class="label">Price</span></div>
                                <div class="info-item"><span class="number">{{$myproduct->stock}}</span><span class="label">Stock</span></div>
                            </div>
                            <div class="product-actions">
                                <button class="btn-action" onclick="alert('View Product')">View</button>
                                <button class="btn-action" onclick="alert('Edit Product')">Edit</button>
                                <button class="btn-action btn-delete" onclick="deleteProduct(this)">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif


            </div>
        </div>

        <div id="listView" class="hidden">
          @foreach($allproduct as $myproduct)
            <div class="product-list-item" data-name="wireless headphones" data-category="electronics" data-status="in-stock">
                <div class="list-item-left">
                    <div class="list-item-image"><i class="fas fa-headphones"></i></div>
                    <div>
                        <h5>{{$myproduct->title}}</h5>
                        <p class="product-category">{{$myproduct->category->name}}</p>
                        <div class="list-item-stats"><span><strong>{{$myproduct->price}}</strong> Price</span><span><strong>45</strong> Stock</span></div>
                    </div>
                </div>
                <div class="product-actions">
                    <button class="btn-action" onclick="alert('View')">View</button>
                    <button class="btn-action" onclick="alert('Edit')">Edit</button>
                    <button class="btn-action btn-delete" onclick="deleteProduct(this)">Delete</button>
                </div>
            </div>

          @endforeach
        </div>
    </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('form').onsubmit = e => {
            e.preventDefault();
            alert('Product added!');
            bootstrap.Modal.getInstance(document.getElementById('addProduct')).hide();
            e.target.reset();
        };

        function toggleView(v) {
            document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
            event.target.closest('.view-btn').classList.add('active');
            document.getElementById('gridView').classList.toggle('hidden', v === 'list');
            document.getElementById('listView').classList.toggle('hidden', v === 'grid');
        }

        function search() {
            const name = document.getElementById('searchName').value.toLowerCase();
            const cat = document.getElementById('searchCategory').value;
            const status = document.getElementById('searchStatus').value;
            document.querySelectorAll('.product-card, .product-list-item').forEach(p => {
                const match = (!name || p.dataset.name.includes(name)) && (!cat || p.dataset.category === cat) && (!status || p.dataset.status === status);
                p.closest('.col-md-4, .product-list-item').style.display = match ? '' : 'none';
            });
            updateStats();
        }

        function clear() {
            document.getElementById('searchName').value = '';
            document.getElementById('searchCategory').value = '';
            document.getElementById('searchStatus').value = '';
            document.querySelectorAll('.col-md-4, .product-list-item').forEach(p => p.style.display = '');
            document.getElementById('total').textContent = '6';
            document.getElementById('inStock').textContent = '4';
            document.getElementById('lowStock').textContent = '1';
            document.getElementById('outStock').textContent = '1';
        }

        function deleteProduct(btn) {
            if (confirm('Delete this product?')) {
                const item = btn.closest('.col-md-4, .product-list-item');
                item.remove();
                document.querySelectorAll('[data-status="' + item.querySelector('[data-status]').dataset.status + '"]').length;
                updateStats();
                alert('Product deleted!');
            }
        }

        function updateStats() {
            const visible = p => p.closest('.col-md-4, .product-list-item').style.display !== 'none';
            const products = Array.from(document.querySelectorAll('.product-card, .product-list-item')).filter(visible);
            document.getElementById('total').textContent = products.length;
            document.getElementById('inStock').textContent = products.filter(p => p.dataset.status === 'in-stock').length;
            document.getElementById('lowStock').textContent = products.filter(p => p.dataset.status === 'low-stock').length;
            document.getElementById('outStock').textContent = products.filter(p => p.dataset.status === 'out-of-stock').length;
        }
    </script>
</body>

</html>