@if(session('success'))

  <div class="alert alert-success" style="background-color:	#B0E0E6">
    <a href="#" data-dismiss="alert" class="close" aria-label="close"></a>
      <strong>Success!</strong> {{ session('success') }}
      <a href="#" class="close" id="btn">&times;</a>
  </div>

  <script> 
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
  </script>

@endif

@if(session('fail'))

  <div class="alert alert-danger">
    <a href="#" data-dismiss="alert" class="close" aria-label="close"></a>
      <strong>Fail!</strong> {{ session('fail') }}
      <a href="#" class="close" id="btn">&times;</a>
  </div>

  <script> 
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
  </script>

@endif
