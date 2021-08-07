@extends('admin.layouts.app', ['title' => 'Add Foods'])

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
                    <h4 class="card-title mb-4">Add Food</h4>

                    <form action="{{route('foods.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                                @error('title') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="desc" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="desc" id="desc" cols="30" rows="5" class="form-control @error('desc') is-invalid @enderror">{{ old('desc')}}</textarea>
                                @error('desc') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price')}}">
                                @error('price') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image <small>[w:284 x h:400]</small></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3">status</label>
                            <div class="col-sm-9">
                                <input type="radio" id="statusinput1" class="form-check-input" name="status" value="1">
                                <label for="statusinput1" class="form-check-label" style="margin-right: 20px">Active</label>
                                <input type="radio" id="statusinput2" class="form-check-input" name="status" value="0">
                                <label for="statusinput2" class="form-check-label">Inactive</label>
                                @error('status') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
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
