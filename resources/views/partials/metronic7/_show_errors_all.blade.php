@if ($errors->any())
@foreach ($errors->all(':message') as $error)
    <div>
        <li class="text-danger"><small>{{ $error }}</small></li>
    </div>
@endforeach
@endif
