@extends('front.layout')
@section('title','PC Registration')
@section('breadcrumb-title','Add PC')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('pc.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('pc.index')}}">PC</a></li>
    <li class="breadcrumb-item">Add</li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add new PC owner</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'pc.store']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('first_name', 'First Name') !!}
                                {!! Form::text('first_name', null,['class'=>'form-control form-control-border', 'placeholder'=>'Enter First Name']) !!}
                                @error('first_name')
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('last_name', 'Last Name') !!}
                                {!! Form::text('last_name', null,['class'=>'form-control form-control-border', 'placeholder'=>'Enter Last Name']) !!}
                                @error('last_name')
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('id_number', 'ID Number') !!}
                                {!! Form::text('id_number', null,['class'=>'form-control form-control-border', 'placeholder'=>'Enter ID Number']) !!}
                                @error('id_number')
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Person Type</label>
                                {!! Form::select('person_type', $pt, null, ['class'=>'form-control select2', 'style'=>'width: 100%; color: red']) !!}
                                {{-- <select class="form-control select2" style="width: 100%;" name="person_type" style="color: red">
                                    <option>student</option>
                                    <option>staff</option>
                                    <option>other</option>
                                </select> --}}
                                @error('person_type')
                                    <small class="errorName"><div id="startDate-error" class="error">{{$message}}</div></small>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('phone_number', 'Phone Number') !!}
                                {!! Form::text('phone_number', null,['class'=>'form-control form-control-border', 'placeholder'=>'Enter PC Phone Number']) !!}
                                @error('phone_number')
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            
                            <div class="form-group">
                                {!! Form::label('pc_model', 'PC Model') !!}
                                {!! Form::text('pc_model', null,['class'=>'form-control form-control-border', 'placeholder'=>'Enter PC Serial Number']) !!}
                                @error('pc_model')
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>
                                @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('serial_number', 'Serial Number') !!}
                                {!! Form::text('serial_number', null,['class'=>'form-control form-control-border', 'placeholder'=>'Enter PC Serial Number']) !!}
                                @error('serial_number')
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>
                                @enderror
                            </div>
                        </div> --}}
                    </div>
                    <div class="pcmodel">
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-tool" id="pc">
                                <h5>
                                  <i class="fas fa-plus"></i>
                                    Add PC
                                </h5>
                            </button>
                        </div>
                        {{-- <h3 class="card-title"> --}}
                            {{-- <i class="far fa-chart-bar"></i> --}}
                            {{-- Add New PC
                        </h3> --}}
      
                      {{-- <div class="card-tools"> --}}
                        
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="far fa-chart-bar"></i>
                                        Line Chart
                                    </h3>
                  
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                      <i class="fas fa-times"></i>
                                    </button>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div id="line-chart" style="height: 300px;"></div>
                                </div>
                                <!-- /.card-body-->
                              </div>
                        </div>
                    </div> --}}
                </div>
                <div class="card-footer float-left">
                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                  </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('app-assets/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- <script>
        $('.select2').select2()
    </script> --}}
    <script>
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    </script>

    <script>
        var count = 1;
        var f = 1;
        $('#pc').on('click',function(){
            // console.log($('.pcmodel').children().length);
            fetchpc(count++);
        });
        

        function fetchpc(i){
            var a = i;
            // console.log(count++);
            $(".pcmodel").append(
                '<div class="card card-primary card-outline">\
                    <div class="card-header">\
                        <h3 class="card-title">\
                            PC-'+(f++)+'\
                        </h3>\
                    </div>\
                    <br>\
                    <div class="row">\
                        <div class="col-md-6">\
                            <div class="form-group">\
                                <label for="pc_model-'+a+'">PC Model</label>\
                                <input type="text" name="pc_model['+a+']" class="form-control form-control-border" placeholder="Enter PC Model" id="pc_model-'+a+'">\
                                @error("pc_model['+a+']")\
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>\
                                @enderror\
                            </div>\
                        </div>\
                        <div class="col-md-6">\
                            <div class="form-group">\
                                <label for="serial_number-'+a+'">Serial Number</label>\
                                <input type="text" name="serial_number['+a+']" class="form-control form-control-border" placeholder="Enter PC Serial Number" id="serial_number-'+a+'">\
                                @error("serial_number['+a+']")\
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>\
                                @enderror\
                            </div>\
                        </div>\
                    </div>\
                </div>'
            );
        }
    </script>
@endsection