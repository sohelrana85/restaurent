@extends('admin.layouts.app', ['title' => 'Add Chefs'])

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>
            @endif

            {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            @endif --}}

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Chefs</h4>

                    <form action="{{route('chefs.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                                @error('name') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="speciality" class="col-sm-3 col-form-label">Spefiality</label>
                            <div class="col-sm-9">
                                <input type="text" name="speciality" id="speciality" class="form-control @error('speciality') is-invalid @enderror" value="{{old('speciality')}}">
                                @error('speciality') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            {{-- <div class="card" style="border: 1px solid #cacaca;">

                <form action="">
                    <div class="card-header">
                        <h4>Add Food</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="desc" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer" style="text-align: right">
                        <input type="reset" value="Clear" class="btn btn-outline-warning">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div> --}}
        </div>

    </div>
    <!-- end row -->
</div>
@endsection
