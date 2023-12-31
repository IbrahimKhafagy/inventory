@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--------------------------------- multipule upload images----------------------->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-------------------------------edit inline--------------------------------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Inventory</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/Sub-Inv_Summary</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        All Details of products & QTY in This Inventory
                    </div>
                    <p class="mg-b-20"></p>
                    <hr>
                    <div id="wizard3">
                        <h3>General Sub Inventory Information</h3>
                        <section>
                            <div class="control-group form-group">
                                <label class="form-label">Name : {{ $inv->inv_name }}</label>

                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">Manager Name : {{ $inv->manager }}</label>

                            </div>

                            <div class="control-group form-group">
                                <label class="form-label">Manager Email : {{ $inv->Email }}</label>
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">Manager Phone: {{ $inv->Phone }}</label>
                            </div>
                            <div class="control-group form-group mb-0">
                                <label class="form-label">Address: {{ $inv->address }} </label>
                            </div>
                        </section>
                        <br>

                        <h3>Responsible Users </h3>
                        <Section>
                           {{--- <div>
                                <h6><a href="{{ url('users') }}/{{ $user_id }}">Ahmed</a>, <a href="">Ali</a> , <a href="">Mohamed</a>
                                </h6>
                            </div>--}}

                        </Section>
                        <br>
                        <hr>
                        <h3>The source of Stock QTY information </h3>
                        <section>
                            <!--div-->

                            <div class="col-xl-12">
                                <div class="card mg-b-20">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title mg-b-0">Inventory products Detailes</h4>
                                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table key-buttons text-md-nowrap">
                                                <thead>
                                                    <tr class="table-success" style="text-align: center">
                                                        <th class="border-bottom-0">id</th>
                                                        <th class="border-bottom-0">product Name</th>
                                                        <th class="border-bottom-0">Vendor</th>
                                                        <th class="border-bottom-0">Total QTY</th>
                                                        <th class="border-bottom-0">Unit price</th>
                                                        <th class="border-bottom-0"> Total price</th>
                                                        <th class="border-bottom-0">transfer from/ Create </th>
                                                        <th class="border-bottom-0">Date of transfer from </th>
                                                        <th class="border-bottom-0"> transfer/create By </th>
                                                    </tr>
                                                </thead>
                                          <tbody>
                                                    <?php $i = 0; ?>
                                                  @foreach ($products as $key => $products)
                                                       <?php $i++; ?>
                                                        <tr style="text-align: center">
                                                           <td>{{ $i }}</td>
                                                            <td> {{ $products->Product_name }}</td>
                                                            <td>{{ $products->Vendor }}</td>
                                                            <td>{{number_format( $products->inven->QTY),2 }}</td>
                                                            <td>{{number_format($products->Price),2 }}</td>
                                                            <td>{{ number_format($products->TotalPrice),2 }}</td>
                                                            <td>{{$products->From_inv == null ? 'Created' : 'Existing'}}</td>
                                                             <td>{{$products->created_at}}</td>
                                                        <td>{{$products->Created_by}}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/div-->
                            <hr>
                    </div>
                    </section>

                    <h2>Summary </h2>
                    <section>
                        <div class="table-responsive mg-t-20">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Numbers of products</td>
                                        {{-- <td class="text-left">{{ App\Models\products::count() }} products</td> --}}
                                        <td> {{ App\Models\products::where("inventory_id",$inv->id)->count() }} products</td>
                                    </tr>
                                    <tr>
                                        <td><span>All QTY</span></td>
                                        {{-- <td class="text-left text-muted"><span>{{number_format( App\Models\products::sum('QTY')),2 }}</span></td> --}}
                                        <td> {{ App\Models\products::where("inventory_id",$inv->id)->sum('QTY'),2 }} </td>
                                    </tr>
                                    <tr>
                                        <td><span>Number of Orders</span></td>

                                        <td class="price text-left mb-0"><span>4 Orders</span>
                                            <a class="btn btn-info " href="/Transfer"> More</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Orders by</span></td>

                                        <td class="price text-left text-muted"><span>Ahmed,Manager(position)</span></td>
                                    </tr>

                                    <tr>
                                        <td><span>Total price</span></td>

                                        <td class="price text-left">$265,235.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Last updated Date</span></td>

                                        <td class="price text-left">20/05/2023
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    {{-- <h3>Payment Details</h3>
                    <section>
                        <div class="form-group">
                            <label class="form-label">CardHolder Name</label>
                            <input type="text" class="form-control" id="name12" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Card number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-append">
                                    <button class="btn btn-info" type="button"><i class="fab fa-cc-visa"></i> &nbsp; <i
                                            class="fab fa-cc-amex"></i> &nbsp;
                                        <i class="fab fa-cc-mastercard"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group mb-sm-0">
                                    <label class="form-label">Expiration</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="MM" name="expiremonth">
                                        <input type="number" class="form-control" placeholder="YY" name="expireyear">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 ">
                                <div class="form-group mb-0">
                                    <label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
                                    <input type="number" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </section> --}}
                </div>
            </div>
        </div>
    </div>




    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <!----------------------- edit inline ajax---------------------------------------->



    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $.fn.poshytip = {
            defaults: null
        }
    </script>



    <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('.update_record').editable({
            url: "{{ route('Product.updateAjex1') }}",
            type: 'text',
            name: 'Product_name',
            pk: 1,
            title: 'Enter Field'





        });
    </script>
@endsection
