@extends('admin.layouts.app', ['title' => 'Food List'])

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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                            <tr>
                                <td>{{ ++$loop->index}}</td>
                                <td>{{ $food->title}}</td>
                                <td>{{ $food->desc}}</td>
                                <td>{{ $food->price}} Tk</td>
                                <td><img src="{{asset('food_image')."/".$food->image}}" alt="{{$food->image}}" style="width: 80px"></td>
                                <td>
                                    <div class="square-switch">
                                        <input type="checkbox" id="{{$food->id}}" class="status" switch="bool" {{ $food->status == 1 ? 'Checked' : ''}}>
                                        <label for="{{$food->id}}" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                </td>
                                {{-- <td>{{$food->status == 1 ? "Published" : 'Unpublished'}}</td> --}}


                                <td class="action">
                                    <a href="{{ route('foods.edit', $food->id)}}"><i class="fas fa-pen-square edit"></i></a>
                                    <form action="{{route('foods.delete', $food->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('foods.delete', $food->id)}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-trash delete"></i></a>
                                    </form>

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
