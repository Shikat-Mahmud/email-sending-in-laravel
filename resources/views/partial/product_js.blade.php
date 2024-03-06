    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            // add product
            $(document).on('click', '.add_product', function (e) {
                e.preventDefault();

                let name = $('#name').val();
                let email = $('#email').val();
                let price = $('#price').val();
                let description = $('#description').val();

                $.ajax({
                    url:"{{ route('products.store')}}",
                    method:'post',
                    data:{name:name,email:email,price:price,description:description},
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#addModal form').trigger('reset');

                            $('#addModal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('.table').load(location.href+' .table');
                        }
                    },error:function (err) {
                        let error = err.responseJSON;

                        $.each(error.errors, function (index, value) {
                            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    }
                });
            });

            // Edit Product
            $(document).on('click', '.update-product-form', function (e) {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let email = $(this).data('email');
                let price = $(this).data('price');
                let description = $(this).data('description');

                $('#up_id').val(id);
                $('#up_name').val(name);
                $('#up_email').val(email);
                $('#up_price').val(price);
                $('#up_description').val(description);
            });


            // Update Product
            $(document).on('click', '.update_product', function (e) {
                e.preventDefault();

                let up_id = $('#up_id').val();
                let up_name = $('#up_name').val();
                let up_email = $('#up_email').val();
                let up_price = $('#up_price').val();
                let up_description = $('#up_description').val();

                let action = $('#updateProductForm').attr('action');
                $.ajax({
                    url: "{{ url('products') }}/" + up_id,
                    method: 'put',
                    data: {name: up_name, email: up_email, price: up_price, description: up_description},
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#updateModal form').trigger('reset');
                            $('#updateModal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('.table').load(location.href + ' .table');
                        }
                    },
                    error: function(err) {
                        let error = err.responseJSON;

                        $.each(error.errors, function (index, value) {
                            $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                        });
                    }
                });
            });

            // Delete Product
            $(document).on('click', '.delete-product', function (e) {
                e.preventDefault();

                let productId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('products') }}/" + productId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function (res) {
                                if (res.status == 'success') {
                                    $('.table').load(location.href + ' .table');
                                }
                            },
                            error: function (err) {
                                console.log(err);
                            }
                        });
                    }
                });
            });

            //search product

            $(document).on('submit', '#searchForm', function(e){
                e.preventDefault();

                let query = $('#searchInput').val();

                $.ajax({
                    url: "{{ route('products.search') }}",
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function (response) {
                        $('.table-data').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });


            //paginator
            // $(document).on('click', '.pagination a', function(e){
            //     e.preventDefault();

            //     let page = $(this).attr('href').split('page=')[1];
            //     product(page);
            // });

            // function product(page){
            //     $.ajax({
            //         url: "/pagination/paginate-data?page=" + page,
            //         success: function(response){
            //             $('.table-data').html(response.html);
            //         },
            //         error: function(xhr, status, error){
            //             console.log(error);
            //         }
            //     });
            // }


        });
    </script>
