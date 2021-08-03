@extends('admin.layouts.app', ['title' => 'Update Reservation'])

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('message'))
            <div class="alert alert-{{session('type')}}">{{session('message')}}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Update Reservation</h4>

                    <form action="{{route('reservation.update', $data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-sm-3 col-form-label">name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$data->name}}">
                                @error('name') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$data->email}}">
                                @error('email') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$data->phone}}">
                                @error('phone') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="number_of_guest" class="col-sm-3 col-form-label">Number of Guest</label>
                            <div class="col-sm-9">
                                <select name="number_of_guest" id="number_of_guest" class="form-select">
                                    <option>Select</option>
                                    <option value="1" {{$data->number_of_guest == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$data->number_of_guest == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$data->number_of_guest == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$data->number_of_guest == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$data->number_of_guest == 5 ? 'selected' : ''}}>5</option>
                                    <option value="6" {{$data->number_of_guest == 6 ? 'selected' : ''}}>6</option>
                                    <option value="7" {{$data->number_of_guest == 7 ? 'selected' : ''}}>7</option>
                                    <option value="8" {{$data->number_of_guest == 8 ? 'selected' : ''}}>8</option>
                                    <option value="9" {{$data->number_of_guest == 9 ? 'selected' : ''}}>9</option>
                                    <option value="10" {{$data->number_of_guest == 10 ? 'selected' : ''}}>10</option>
                                    <option value="11" {{$data->number_of_guest == 11 ? 'selected' : ''}}>11</option>
                                    <option value="12" {{$data->number_of_guest == 12 ? 'selected' : ''}}>12</option>
                                </select>
                                @error('number_of_guest') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="date" class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{$data->date}}">
                                @error('date') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="time" class="col-sm-3 col-form-label">Time</label>
                            <div class="col-sm-9">
                                <select name="time" id="time" class="form-select">
                                    <option>Select</option>
                                    <option value="Breakfast" {{$data->time == 'Breakfast' ? 'selected' : ''}}>Breakfast</option>
                                    <option value="Lunch" {{$data->time == 'Lunch' ? 'selected' : ''}}>Lunch</option>
                                    <option value="Dinner" {{$data->time == 'Dinner' ? 'selected' : ''}}>Dinner</option>
                                </select>
                                @error('time') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{$data->description}}</textarea>
                                @error('description') <p class="alert m-0 p-0 text-danger">{{ $message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="status1" class="col-sm-3">status</label>
                            <div class="col-sm-9">
                                <select name="status" id="1" class="form-control">
                                    <option>Select</option>
                                    <option value="pending" {{$data->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                    <option value="confirm" {{$data->status == 'confirm' ? 'selected' : ''}}>Confirm</option>
                                    <option value="rejected" {{$data->status == 'rejected' ? 'selected' : ''}}>Rejected</option>
                                </select>
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
