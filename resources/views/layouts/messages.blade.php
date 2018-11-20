@if(session()->has('success'))
    <div class="form-group alert-success">
        <div class="success-payment">
            @foreach(session()->get('success') as $success)
                <p>{{ $success }}</p>
            @endforeach
        </div>
    </div>
@endif
