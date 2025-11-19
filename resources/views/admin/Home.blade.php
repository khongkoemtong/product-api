 @extends('admin.Main')
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
     @section('body')
     <div class="main-content">
         <div class="page-header">
             <h1>Product Dashboard</h1>
         </div>

       <div class="category-section">
    <h2>Categories</h2>
    <div class="row g-4">

        @foreach($allcategory as $category)
        <div class="col-md-4">
            <div class="category-card">
                <h5>{{ $category->name }}</h5>
                <p>{{ $CountProduct[$category->id] ?? 0 }} product{{ ($CountProduct[$category->id] ?? 0) > 1 ? 's' : '' }}</p>
            </div>
        </div>
        @endforeach

    </div>
</div>

         <!-- Products Table -->
         <div class="products-section ">
             <h2>Products</h2>
             <div class="table-responsive">
                 <table class="table table-bordered ">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Product Name</th>
                             <th>Category</th>
                             <th>Type</th>
                             <th>Price</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($allproduct as $myproduct)
                         <tr>
                             <td>{{$myproduct->id}}</td>
                             <td>{{$myproduct->title}}</td>
                             <td>{{$myproduct->category->name}}</td>

                             <td>{{$myproduct->description}}</td>
                             <td>${{$myproduct->price}}</td>
                         </tr>

                         @endforeach

                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     @endsection
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>