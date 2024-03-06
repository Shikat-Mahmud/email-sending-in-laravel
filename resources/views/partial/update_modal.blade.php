<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
<form action="{{ isset($product) ? route('products.update', $product->id) : '#' }}" method="post" id="updateProductForm">
    @csrf
    @method('PUT')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" id="up_id">

                    <div class="form-group">
                        <label for="up_name">Product Name:</label>
                        <input type="text" class="form-control" name="name" id="up_name" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label for="up_email">Email:</label>
                        <input type="text" class="form-control" name="name" id="up_email" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label for="up_price">Price:</label>
                        <input type="text" class="form-control" name="price" id="up_price" placeholder="Price">
                    </div>

                    <div class="form-group">
                        <label for="up_description">Description:</label>
                        <input type="text" class="form-control" name="description" id="up_description" placeholder="Description">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success update_product">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div>