@extends('admin.layouts.app')

@section('content')
    <!-- Start Widget -->
    <div class="row">
        @foreach($reports as $key => $value)
          <div class="col-md-2 col-sm-2 col-lg-3">
              <a href="{{ url('admin/report/'.$key) }}">
                  <div class="mini-stat clearfix bx-shadow">
                      <span class="mini-stat-icon bg-info"><i class="fa fa-file-text"></i></span>
                      <div class="tiles-progress">
                          <div class="m-t-20">
                              <h5 class="text-uppercase">{{ $value }}</h5>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
        @endforeach
    </div>
    <!-- End row-->

@endsection
