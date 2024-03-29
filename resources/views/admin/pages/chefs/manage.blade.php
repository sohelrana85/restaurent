@extends('admin.layouts.app', ['title' => 'Chefs List'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>

            @endif
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>sl</th>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chefs as $chef)
                            <tr>
                                <td>{{ ++$loop->index}}</td>
                                <td>{{ $chef->name}}</td>
                                <td>{{ $chef->speciality}}</td>
                                <td><img src="{{asset('chefs_image')."/".$chef->image}}" alt="{{$chef->image}}" style="width: 80px"></td>
                                <td class="{{ ($chef->status == 'active') ? 'text-success' : 'text-danger'}}">{{ $chef->status}}</td>
                                <td class="action">
                                    <a href="{{ route('chefs.edit', $chef->id)}}"><i class="fas fa-pen-square edit"></i></a>

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
