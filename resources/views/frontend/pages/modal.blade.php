<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Login From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{ old('email')}}" required autofocus />
                    </div>
                    <div class="form-group mb3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{ old('password')}}" required />
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <p>Don't have any account? <a style="color: rgb(255, 0, 0); text-decoration: underline" href="javascript:">Register</a></p>
                    <button type="submit" class="btn" style="background-color: #ff0000; color:white">LOG IN</button>
                </div>
            </form>
        </div>
    </div>
</div>
