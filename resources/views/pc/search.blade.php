@extends('front.layout')
@section('title','PC search')
@section('breadcrumb-title','Search PC')

@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('pc.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('pc.index')}}">PC</a></li>
    <li class="breadcrumb-item">Add</li>
@endsection

@section('content')
<div class="row mb-2 mt-2">
  <div class="col-sm-12">
      <a class="btn btn-primary float-right"
         href="{{ route('pc.create') }}">
          Register new PC
      </a>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h2 class="text-center display-4">Search</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                {{-- <form> --}}
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" id="pcSearchInput" placeholder="Search by ID or Phone Number">
                        <div class="input-group-append">
                            <button class="btn btn-lg btn-default" id="searchpc">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-8 mx-auto">
      
    </div>
</div>
@endsection

@section('scripts')
    <script>
      $('#searchpc').on('click',function(){
        jQuery('.mx-auto').html('');
        fetchPcOwner();
      });

      $(document).on('keypress',function(e) {
          if(e.which == 13) {
            jQuery('.mx-auto').html('');
            fetchPcOwner();
          }
      });

      function fetchPcOwner() {
        var searchInput = $('#pcSearchInput').val();
        var a = 1;
        $.ajax({
          type: "GET",
          url: "/searchpc",
          data: {svalue: searchInput},
          dataType: "json",
          success: function (response){
            if(Object.keys(response.pcSearch).length > 0){
              $.each(response.pcSearch, function(key, item){
                $('.mx-auto').append(
                  '<div class="card card-primary card-outline justify-content-center">\
                  <div class="card-body box-profile">\
                  <div class="text-center">\
                    <img class="profile-user-img img-fluid img-circle"\
                        src="{{ asset("app-assets/dist/img/default-150x150.png") }}"\
                        alt="User profile picture">\
                  </div>\
                  <h3 class="profile-username text-center"><span>'+item.first_name+' '+item.last_name+'</span></h3>\
                  <p class="text-muted text-center"><span>'+item.type.name+'</span></p>\
                  <ul class="list-group list-group-unbordered mb-3 pc">\
                    <li class="list-group-item">\
                      <b>Phone Number</b> <a class="float-right">'+item.phone_number+'</a>\
                    </li>\
                    <li class="list-group-item">\
                      <b>ID Number</b> <a class="float-right">'+item.id_number+'</a>\
                    </li>'
                );
                response.pcserial.forEach(element => {
                  $('.pc').append(
                    '<li class="list-group-item serial">\
                      <b>PC-'+(a++)+' Model</b>\
                      <a class="float-right">\
                        '+element.pc_name+'\
                      </a>\
                      <ul>\
                        <li class="list-group-item serial">\
                          <b>Serial Number</b>\
                          <a class="float-right">\
                            '+element.serial_number+'\
                          </a>\
                        </li>\
                      </ul>\
                    </li>'
                  );
                });
                $('.serial').append(
                    '</ul>\
                  </div>\
                  </div>'
                );
             });
            }
            else{
              $('.mx-auto').append(
                '<div class="card card-primary">\
                  <div class="text-center">\
                    <h5 style="color: red">There is no match!!!</h5>\
                  </div>\
                </div>'
              );
            }
          }
        });
      }
    </script>
@endsection