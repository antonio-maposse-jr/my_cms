@if ($errors->any())
    <div class="alert alert-danger fs-4">
        <div>
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-face-frown me-5"></i>
                <span >{{$errors->first()}}</span>
            </div>
        </div>
    </div>
@endif
