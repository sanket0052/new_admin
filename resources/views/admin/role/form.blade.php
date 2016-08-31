@extends('admin.layouts.app')

@section('content')
  <!-- Form-validation -->
  <div class="row">
      <div class="col-sm-12">
          <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Role Detail</h3></div>
              <div class="panel-body">
                  {!! Form::model($role, [
                          'route' => $route,
                          'method' => $method,
                          'novalidate' => 'novalidate'
                      ])
                  !!}
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-lg-12">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title">Title *</label>
                                {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="checkbox1">Status *</label>
                                <div class="checkbox checkbox-primary">
                                    {{ Form::checkbox('status', 1, true, ['id' => 'checkbox1', ]) }}
                                    <label for="checkbox1">Active</label>
                                </div>
                            </div>
                          </div>
                      </div>
                      <hr/>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                              <a href="{{ url('admin/role') }}" class="btn btn-default waves-effect" type="button">Cancel</a>
                          </div>
                      </div>
                  {!! Form::close() !!}
              </div> <!-- panel-body -->
          </div> <!-- panel -->
      </div> <!-- col -->

  </div> <!-- End row -->
@endsection
@section('js')

@endsection
