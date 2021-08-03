@extends('admin.layouts.app', ['title' => 'Update Chefs'])

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Update Chefs</h4>
                    <form action="{{route('chefs.update', $chefs->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$chefs->name}}">
                                @error('name') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="speciality" class="col-sm-3 col-form-label">Spefiality</label>
                            <div class="col-sm-9">
                                <input type="text" name="speciality" id="speciality" class="form-control @error('speciality') is-invalid @enderror" value="{{$chefs->speciality}}">
                                @error('speciality') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                            <div class="col-sm-3" style="text-align:center;">
                                <img src="{{asset('chefs_image').'/'.$chefs->image}}" alt="" style="width: 120px">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3">status</label>
                            <div class="col-sm-9">
                                <input type="radio" id="statusinput1" class="form-check-input" name="status" value="active" {{$chefs->status == 'active' ? 'checked' : ''}}>
                                <label for="statusinput1" class="form-check-label" style="margin-right: 20px">Active</label>
                                <input type="radio" id="statusinput2" class="form-check-input" name="status" value="inactive" {{$chefs->status == 'inactive' ? 'checked' : ''}}>
                                <label for="statusinput2" class="form-check-label">Inactive</label>
                                @error('status') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>

    </div>
    <!-- end row -->
</div>
@endsection
