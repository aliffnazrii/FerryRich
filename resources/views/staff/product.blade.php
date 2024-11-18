@extends('layout.staff')

@section('title', 'Product List')


@section('content')
<main class="main-wrapper">
    <div class="main-content">


        <h6 class="mb-0 text-uppercase">Product List</h6>
        <hr>
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="row">
                    <div class="col-10"></div>

                    <div class="col  text-center">
                        <button type="button" class="btn btn-primary px-4 m-3" data-bs-toggle="modal"
                            data-bs-target="#AddProduct">Add</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-border">
                        <thead class="">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                            <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>RM{{$product->price}}</td>
                            <td>{{$product->name}}</td>
                            <td> <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                    data-bs-target="#ViewProduct{{$product->id}}">View</button></td>
                                    <div class="modal fade modal-xl" id="ViewProduct{{$product->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header py-2 ">
                                                    <h5 class="modal-title">Product Information</h5>
                                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                                        <i class="material-icons-outlined">close</i>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-body">
                                                        <form class="row g-3" method="post" action="{{route('products.update',$product->id)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                              <div class="col-md-12">
                                                                <label for="input1" class="form-label">Name</label>
                                                                <input type="text" value="{{$product->name}}" class="form-control" id="input1" name="name">
                                                              </div>
                                                              <div class="col-md-12">
                                                                <label for="input2" class="form-label">Description</label>
                                                                <textarea class="form-control" value="" id="input2" placeholder="Description" rows="3" name="description">{{$product->description}}</textarea>
                                                              </div>
                                                              <div class="col-md-12">
                                                                <label for="input3" class="form-label">Price</label>
                                                                <input type="number" class="form-control" value="{{ $product->price }}" id="input3" name="price" placeholder="Price" step="0.01">                                                              </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                          </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade modal-xl" id="AddProduct">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Add Product</h5>
                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <form class="row g-3" method="post" action="{{route('products.store')}}">
                            @csrf
                            <div class="modal-body">
                              <div class="col-md-12">
                                <label for="input1" class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="name" id="input1" name="name">
                              </div>
                              <div class="col-md-12">
                                <label for="input2" class="form-label">Description</label>
                                <textarea class="form-control" id="input2" placeholder="Description" rows="3" name="description"></textarea>
                              </div>
                              <div class="col-md-12">
                                <label for="input3" class="form-label">Price</label>
                                <input type="number" class="form-control" id="input3" placeholder="123.45" name="price" step="0.01" placeholder="Price">
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
   


    <!--bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/js/main.js"></script>

</main>
@endsection