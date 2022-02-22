@extends('front.layout')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ count($data['pc']) }}</h3>
          <p>Registered PC</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('pc.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
        @foreach ($data['pctype'] as $pctype)
            {{-- {{ dump(count($pctype->persons)) }} --}}
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="{{ $pctype->name == 'student' ? 'small-box bg-warning': ($pctype->name == 'staff' ? 'small-box bg-success': 'small-box bg-danger') }}">
                    <div class="inner">
                        <h3>{{ round((count($pctype->persons)/count($data['pc']))*100, 2) }}<sup style="font-size: 20px">%</sup></h3>
            
                        <p>{{ $pctype->name }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route($pctype->name.'.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    {{-- <a href="{{ route('pc.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
        @endforeach
  </div>
  <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Latest Registered PC's</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th>ID</th>
            <th>Person Full Name</th>
            <th>Person type</th>
            <th>No of PC</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($data['pclatest'] as $item)
                <tr>
                    <td><a href="pages/examples/invoice.html">{{ $item->id }}</a></td>
                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                    <td><span class="{{ $item->type->name == 'student' ? 'badge badge-warning': ($item->type->name == 'staff' ? 'badge badge-success': 'badge badge-danger') }} ">{{ $item->type->name }}</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">{{ count($item->pcTypes) }}</div>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{ route('pc.create') }}" class="btn btn-sm btn-info float-left">Register new PC</a>
      <a href="{{ route('pc.index') }}" class="btn btn-sm btn-secondary float-right">View All PC</a>
    </div>
    <!-- /.card-footer -->
  </div>
@endsection