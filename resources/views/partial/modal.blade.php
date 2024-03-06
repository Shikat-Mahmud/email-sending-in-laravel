
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="post" id="addProductForm">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <div class="errMsgContainer"></div>
        <br>

          <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
          </div>

          <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price">
          </div>

          <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success add_product">Add Product</button>
        </div>
      </div>
    </div>
  </form>
</div>