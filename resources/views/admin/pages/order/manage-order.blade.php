@extends('admin.layouts.app', ['title' => 'Order List'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>

            @endif
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" style="font-size: 12px">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Customer</th>
                                <th>Order No</th>
                                <th>Foods and Qty</th>
                                <th>Total Tk</th>
                                <th>Pay Method</th>
                                <th>D. Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ ++$loop->index}}</td>
                                <td>
                                    <p class="m-0"><b>Name:</b> {{ $order->name}}</p>
                                    <p class="m-0"><b>Phone:</b> {{ $order->phone}}</p>
                                    <p class="m-0"><b>Address:</b> {{ $order->shipping_address}}</p>
                                </td>
                                <td>{{ $order->order_no }}</td>
                                <td>
                                    @foreach ($order->order_details as $item)
                                    <div class="d-flex justify-content-between">
                                        <div>{{++$loop->index}}. {{$item->food_name}}</div>
                                        <div class="fw-bold">{{$item->quantity}}</div>
                                    </div>
                                    @endforeach
                                </td>
                                <td>{{ $order->sub_total }}</td>
                                <td>{{ $order->pay_status->payment_method}}</td>
                                <td>{{ $order->delivery_status->delivery_status}}</td>
                                <td class="action">
                                    <a href="{{ route('order.edit', $order->id)}}"><i class="fas fa-info-circle info"></i></a>
                                    <a href="{{ route('order.edit', $order->id)}}"><i class="fas fa-pen-square edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->
</div>
@endsection

@push('css')
<!-- DataTables -->
<link href="{{ asset('admin')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endpush

@push('js')
<!-- Required datatable js -->
<script src="{{ asset('admin')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script><!-- Buttons examples -->
<script src="{{ asset('admin')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin')}}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin')}}/assets/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('admin')}}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('admin')}}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('admin')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin')}}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('admin')}}/assets/js/pages/datatables.init.js"></script>

<script>
    $(document).on('click', '.status', function(e) {
        var id = $(this).attr('id');
        $.ajax({
            url: '/foods/' + id
            , method: 'GET'
            , data: {}
            , success: function(result) {
                toastr.success(result.message);
                console.log(result);
            }
        })
    })

</script>
@endpush
