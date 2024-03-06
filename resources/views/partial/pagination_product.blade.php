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
