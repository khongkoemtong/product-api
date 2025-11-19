
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #000;
            border-right: 2px solid #fff;
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar h3 {
            color: #fff;
            margin-bottom: 30px;
            font-size: 24px;
            border-bottom: 2px solid #fff;
            padding-bottom: 10px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 15px;
        }

        .sidebar-menu a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 15px;
            border: 1px solid #fff;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: #fff;
            color: #000;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 40px;
        }

        .page-header {
            border-bottom: 2px solid #fff;
            padding-bottom: 20px;
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 36px;
        }

        /* Category Cards */
        .category-section {
            margin-bottom: 50px;
        }

        .category-section h2 {
            margin-bottom: 25px;
            font-size: 28px;
            border-bottom: 1px solid #fff;
            padding-bottom: 10px;
        }

        .category-card {
            background-color: #000;
            border: 2px solid #fff;
            padding: 25px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .category-card:hover {
            background-color: #fff;
            color: #000;
        }

        .category-card h5 {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .category-card p {
            margin: 0;
            font-size: 14px;
        }

        /* Products Table */
        .products-section h2 {
            margin-bottom: 25px;
            font-size: 28px;
            border-bottom: 1px solid #fff;
            padding-bottom: 10px;
        }

        .table {
            background-color: #000;
            color: #fff;
            border: 2px solid #fff;
        }

        .table thead {
            background-color: #000;
            border-bottom: 2px solid #fff;
        }

        .table th {
            border: 1px solid #fff;
            padding: 15px;
            font-weight: bold;
        }

        .table td {
            border: 1px solid #fff;
            padding: 15px;
        }

        .table tbody tr {
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background-color: #fff;
            color: #000;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                border-right: none;
                border-bottom: 2px solid #fff;
            }

            .main-content {
                margin-left: 0;
            }

            .wrapper {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Menu</h3>
            <ul class="sidebar-menu">
                <li><a href="{{route('home')}}" class="active">Dashboard</a></li>
                <li><a href="{{route('getdata')}}">Categories</a></li>
                <li><a href="{{route('productadminpage')}}">Products</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->

        @yield('body')

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>