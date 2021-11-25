@extends('front.layout')
@section('title','PC Registration')
@section('breadcrumb-title','Add PC')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('pc.home')}}">Home</a></li>   
    <li class="breadcrumb-item"><a href="{{route('type.index')}}">PC</a></li>
    <li class="breadcrumb-item">Add</li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add new Person type</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'type.store']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null,['class'=>'form-control form-control-border', 'placeholder'=>'Add Name']) !!}
                                @error('name')
                                    <small class="errorName" style="color: red"><div id="startDate-error" class="error">{{$message}}</div></small>
                                @enderror
                            </div>
                        </div>
                    </div>
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
@endsection