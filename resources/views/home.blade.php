<x-main>
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-6 d-flex justify-content-center text-white">Create URL</div>
        </div>
        <form action="{{ route('url.store') }}" method="POST">
            @csrf
            <div class="row">
                <label for="url" class="form-label">URL</label><br>
                <div class="col-8 mb-3 d-flex">
                    <div class="col-6">
                        <input type="text" class="form-control" id="url" name="url">
                    </div>
                    <div class="col-2 mb-3 ml-2">
                        <button type="submit" class="btn btn-primary">Short</button>
                    </div>
                </div>
            </div>
        </form>
        @isset($rnd)
        <a href="{{ url('') . '/' . $rnd }}" target="blank">{{ url('') . '/' . $rnd }}</a>
            
        @endisset
        <div>

        </div>
    </div>
</x-main>