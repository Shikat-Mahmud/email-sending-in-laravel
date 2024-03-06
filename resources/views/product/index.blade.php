<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>AJAX CRUD</title>
  </head>
  <body>

    <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-12">
            <h2 class="my-5"> <a href="{{ route('products.index')}}" class="text-decoration-none text-reset">Products</a></h2>

            <a href="#" class="btn btn-primary my-3" data-toggle="modal" data-target="#addModal">Add Product</a>

            <!-- <input type="text" name="search" id="search" class="my-3 form-control" placeholder="Search here..."> -->
            <form id="searchForm" class="my-3 text-right">
              <input type="text" id="searchInput" name="query" placeholder="Search...">
              <button type="submit" class="btn btn-primary">Search</button>
          </form>

            <div class="table-data">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($products as $key=>$product)
                <tr>
                      <th scope="row">{{ $key+1 }}</th>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->email }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->description }}</td>
                      <td class="d-flex">
                          <a href="#" 
                          class="btn btn-info update-product-form" 
                          data-toggle="modal" 
                          data-target="#updateModal"
                          data-id="{{ $product->id }}"
                          data-name="{{ $product->name }}"
                          data-email="{{ $product->email }}"
                          data-price="{{ $product->price }}"
                          data-description="{{ $product->description }}"
                          >Edit</a>

                          <a href="#" class="btn btn-danger ml-2 delete-product" data-id="{{ $product->id }}">Delete</a>

                      </td>
                  </tr>
              @endforeach
             
                
                </tbody>
            </table>

            {!! $products->links() !!}

            </div>
        </div>
    </div>
    </div>

    @include('partial.modal')
    @include('partial.update_modal')
    @include('partial.product_js')

  </body>
</html>