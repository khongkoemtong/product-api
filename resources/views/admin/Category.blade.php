@extends('admin.Main')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .btn-custom:hover {
            background-color: black !important;
            color: white !important;
            border: 1px solid white !important;
            cursor: pointer;
        }


        .main-content {
            margin-left: 250px;
            padding: 40px;
            min-height: 100vh;
        }

        /* Page Header */
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

        .add-category-btn {
            background-color: #fff;
            color: #000;
            border: 2px solid #fff;
            padding: 12px 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .add-category-btn:hover {
            background-color: #000;
            color: #fff;
        }

        /* Stats Cards */
        .stats-section {
            margin-bottom: 50px;
        }

        .stat-card {
            background-color: #000;
            border: 2px solid #fff;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            height: 100%;
        }

        .stat-card:hover {
            background-color: #fff;
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
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
        }

        /* Category Grid */
        .category-grid {
            margin-bottom: 50px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #fff;
            padding-bottom: 15px;
        }

        .section-header h2 {
            font-size: 28px;
            font-weight: 600;
            margin: 0;
        }

        .view-toggle {
            display: flex;
            gap: 10px;
        }

        .view-btn {
            background-color: #000;
            color: #fff;
            border: 2px solid #fff;
            padding: 8px 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .view-btn:hover,
        .view-btn.active {
            background-color: #fff;
            color: #000;
        }

        /* Category Card */
        .category-card {
            background-color: #000;
            border: 2px solid #fff;
            padding: 0;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
        }

        .category-icon {
            background-color: #fff;
            color: #000;
            padding: 40px;
            text-align: center;
            font-size: 64px;
            transition: all 0.3s;
        }

        .category-card:hover .category-icon {
            background-color: #000;
            color: #fff;
        }

        .category-body {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .category-card h5 {
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .category-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #fff;
        }

        .info-item {
            text-align: center;
        }

        .info-item .number {
            font-size: 28px;
            font-weight: 700;
            display: block;
        }

        .info-item .label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .category-actions {
            display: flex;
            gap: 10px;
            margin-top: auto;
        }

        .btn-action {
            flex: 1;
            background-color: #000;
            color: #fff;
            border: 1px solid #fff;
            padding: 10px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-action:hover {
            background-color: #fff;
            color: #000;
        }

        .btn-action.btn-edit:hover {
            border-color: #4CAF50;
            background-color: #4CAF50;
            color: #fff;
        }

        .btn-action.btn-delete:hover {
            border-color: #f44336;
            background-color: #f44336;
            color: #fff;
        }

        /* List View */
        .category-list-item {
            background-color: #000;
            border: 2px solid #fff;
            padding: 25px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s;
        }

        .category-list-item:hover {
            background-color: #fff;
            color: #000;
        }

        .list-item-left {
            display: flex;
            align-items: center;
            gap: 30px;
            flex: 1;
        }

        .list-item-icon {
            font-size: 48px;
            width: 80px;
            text-align: center;
        }

        .list-item-info h5 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .list-item-stats {
            display: flex;
            gap: 30px;
        }

        .list-item-actions {
            display: flex;
            gap: 10px;
        }

        .hidden {
            display: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .page-header {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }

            .category-list-item {
                flex-direction: column;
                gap: 20px;
            }

            .list-item-left {
                flex-direction: column;
                width: 100%;
            }

            .list-item-actions {
                width: 100%;
            }

            .btn-action {
                flex: 1;
            }
        }
    </style>
</head>

<body>
    @section('body')
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1>Category Management</h1>
            <button class="add-category-btn" data-bs-toggle="modal" data-bs-target="#addcategory">
                <i class="fas fa-plus"></i> Add Category
            </button>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="addcategory" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-black text-white">

                    <form method="POST" action="{{ route('store') }}" class="p-4">
                        @csrf
                        <h1 class="text-center">Add More</h1>

                        <div>
                            <label class="form-label">Enter category name</label>
                            <input type="text" required placeholder="category name" name="name" class="w-100 py-2 ps-2 ">
                        </div>

                        <div class="mt-3 d-flex gap-2 justify-content-end">
                            <button type="button" class="btn-custom px-4 py-1 bg-light text-black" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn-custom px-4 py-1 bg-light text-black">Add</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="stats-section">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-layer-group"></i>
                        <h3>{{$allcategory->count()}}</h3>
                        <p>Total Categories</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-box"></i>
                        <h3>{{$allproduct->count()}}</h3>
                        <p>Total Products</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-star"></i>
                        <h3>5</h3>
                        <p>Active Categories</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-chart-line"></i>
                        <h3>89%</h3>
                        <p>Usage Rate</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="category-grid">
            <div class="section-header">
                <h2>All Categories</h2>
                <div class="view-toggle">
                    <button class="view-btn active" id="gridView">
                        <i class="fas fa-th"></i> Grid
                    </button>
                    <button class="view-btn" id="listView">
                        <i class="fas fa-list"></i> List
                    </button>
                </div>
            </div>

            <!-- Grid View -->
            <div id="gridViewContent">

                <div class="row">

                    @if($allcategory->count()>0)
                    @foreach($allcategory as $category)
                    <div class="col-md-4 mb-4">


                        <div class="category-card">
                            <div class="category-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <div class="category-body">
                                <h5>{{$category->name}}</h5>
                                <div class="category-info">
                                    <div class="info-item">
                                        <span class="number">{{$category->products->count()}}</span>
                                        <span class="label">Products</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="number">8</span>
                                        <span class="label">Subcategories</span>
                                    </div>
                                </div>
                                <div class="category-actions">
                                    <button class="btn-action btn-view">View</button>
                                    <button class="btn-action btn-edit">Edit</button>
                                    <button class="btn-action btn-delete">Delete</button>
                                </div>
                            </div>
                        </div>

                        


                    </div>
                    @endforeach
                    @else
                    <p>No data category</p>
                    @endif
                </div>

            </div>

            <!-- List View -->
            <div id="listViewContent" class="hidden">

                @if($allcategory->count()>0)
                @foreach($allcategory as $mydata)
                <div class="category-list-item">
                    <div class="list-item-left">
                        <div class="list-item-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="list-item-info">
                            <h5>{{$mydata->name}}</h5>
                            <div class="list-item-stats">
                                <span><strong>45</strong> Products</span>
                                <span><strong>8</strong> Subcategories</span>
                            </div>
                        </div>
                    </div>
                    <div class="list-item-actions">
                        <button class="btn-action btn-view">View</button>
                        <button class="btn-action btn-edit">Edit</button>
                        <button class="btn-action btn-delete">Delete</button>
                    </div>
                </div>

                @endforeach

                @endif




            </div>
        </div>
    </div>

    <script>
        // View Toggle Functionality
        const gridViewBtn = document.getElementById('gridView');
        const listViewBtn = document.getElementById('listView');
        const gridViewContent = document.getElementById('gridViewContent');
        const listViewContent = document.getElementById('listViewContent');

        gridViewBtn.addEventListener('click', function() {
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
            gridViewContent.classList.remove('hidden');
            listViewContent.classList.add('hidden');
        });

        listViewBtn.addEventListener('click', function() {
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
            listViewContent.classList.remove('hidden');
            gridViewContent.classList.add('hidden');
        });
    </script>

    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>