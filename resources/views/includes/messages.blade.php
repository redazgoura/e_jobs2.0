
<div class="row justify-content-center mt-3">
  <div class="col-md-8 text-center">

    @if (count($errors)> 0 )
  @foreach ($errors as $err)
      <div class="alert alert-danger">
        {{ $err }}
      </div>
  @endforeach
@endif

@if (session('success') )
  
      <div class="alert alert-success">
        {{ session('success')  }}
      </div>
 
@endif

@if (session('error') )
  
      <div class="alert alert-danger">
        {{ session('error')  }}
      </div>
 
@endif

  </div>
</div>
