@extends('admin.layouts.app')

@section('content')
  <!-- Form-validation -->
  <div class="row">
      <div class="col-sm-12">
          <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Company Detail</h3></div>
              <div class="panel-body">
                  {!! Form::model($company, [
                          'route' => $route,
                          'method' => $method,
                          'files' => true,
                          'id' => 'companyForm',
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
                                  <label for="name">Name *</label>
                                  {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                              </div>
                              <div class="form-group">
                                  <label for="email">Email *</label>
                                  {{ Form::text('email', null, ['class' => 'form-control', 'id' =>'email']) }}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group ">
                                  <label for="address">Address *</label>
                                  {{ Form::textarea('address', null, ['class' => 'form-control', 'id' =>'address', 'rows'=>'5']) }}
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label for="website">Website *</label>
                                  {{ Form::text('website', null, ['class' => 'form-control', 'id' =>'website']) }}
                              </div>
                              <div class="form-group">
                                  <label for="proffesion">Proffesion *</label>
                                  {{ Form::text('proffesion', null, ['class' => 'form-control', 'id' =>'proffesion']) }}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group ">
                                  <label for="phone">Phone *</label>
                                  {{ Form::text('phone', null, ['class' => 'form-control', 'id' =>'phone']) }}
                              </div>
                                  <label for="mobile">Mobile *</label>
                                  <div class="form-group ">
                                  {{ Form::text('mobile', null, ['class' => 'form-control', 'id' =>'mobile']) }}
                              </div>
                              <div class="form-group">
                                  <label for="logo">Logo *</label>
                                  {{ Form::file('logo', null, ['class' => 'form-control', 'id' =>'logo']) }}
                              </div>
                          </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-lg-10">
                                <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                <a href="{{ url('admin/company') }}" class="btn btn-default waves-effect" type="button">Cancel</a>
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
