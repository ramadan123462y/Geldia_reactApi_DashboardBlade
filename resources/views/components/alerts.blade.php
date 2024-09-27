<div>

    @if ($errors->any())


        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Danger!</strong> {{ $error }}
            </div>
        @endforeach


    @endif
</div>
