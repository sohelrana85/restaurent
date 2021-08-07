@extends('admin.layouts.app', ['title' => 'User List'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>

            @endif
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 text-center">
                        <thead>
                            <tr>
                                <th>sl</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$loop->index}}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->user_type == 1 ? 'Admin' : 'User'}}</td>
                                <td>
                                    <form action="{{route('user.delete', $user->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('user.delete', $user->id)}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-trash delete"></i></a>
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
<script src="{{ asset('admin')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
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
@endpush
