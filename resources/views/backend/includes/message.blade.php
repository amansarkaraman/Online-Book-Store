
@if ($message = Session::get('success'))
    <div class="alert alert-success pt-3">
        <h6>{{ $message }}</h6>
    </div>
@endif

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
