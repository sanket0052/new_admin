@extends('admin.layouts.app')

@section('css')
    {!! Html::style(asset('assets/timepicker/bootstrap-datepicker.min.css')) !!}
    {!! Html::style(asset('assets/select2/select2.css')) !!}
@endsection

@section('content')
  <!-- Form-validation -->
  <div class="row">
      <div class="col-sm-12">
          {!!
              Form::model($new_user, [
                'route' => $route, 'files' => true,
                'id' => 'userForm',
                'method' => $method
              ])
          !!}
              <div class="panel panel-default">
                  <div class="panel-heading"><h3 class="panel-title">User Detail</h3></div>
                  <div class="panel-body">
                      {{ csrf_field() }}
                      <div class="row">
                          <div class="col-lg-12">
                              @if($errors->any())
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
                              <div class="form-group">
                                  <label for="password">Password *</label>
                                  {{ Form::password('password', ['class' => 'form-control', 'id' =>'password']) }}
                              </div>
                              <div class="form-group">
                                  <label for="password_confirmation">Confirm Password *</label>
                                  {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' =>'password_confirmation']) }}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group ">
                                  <label for="contact_no">Contact No. *</label>
                                  {{ Form::text('contact_no', null, ['class' => 'form-control', 'id' =>'contact_no']) }}
                              </div>
                              <div class="form-group ">
                                <label>Birth Date</label>
                                <div class="input-group">
                                    {{ Form::text('birth_date', null, ['class' => 'form-control', 'id' =>'datepicker']) }}
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div><!-- input-group -->
                              </div>
                              <div class="form-group ">
                                  <label for="role_id">Role *</label>
                                  {{ Form::select('role_id', $role, null, ['class' => 'select2', 'id' =>'role_id']) }}
                              </div>
                              <div class="form-group ">
                                  <label for="company_id">Company *</label>
                                  {{ Form::select('company_id', $company, isset($selectedCompany) ? $selectedCompany : null, ['class' => 'select2', 'id' =>'company_id']) }}
                              </div>
                          </div>
                      </div>
                  </div> <!-- panel-body -->
              </div> <!-- panel -->
              <div class="panel panel-default">
                  <div class="panel-heading"><h3 class="panel-title">Reports</h3></div>
                  <div class="panel-body">
                      <div class="row">

                          @foreach($reports as $key => $value)
                          <div class="col-lg-2">
                              <div class="form-group">
                                  <div class="checkbox checkbox-primary">
                                      {{ Form::checkbox(
                                          'report_id[]',
                                          $key,
                                          isset($selectedReport) ? in_array($key, $selectedReport) ? true : false : null,
                                          [
                                            'id' => 'checkbox'.$key
                                          ]
                                      ) }}
                                      <label for="checkbox{{$key}}">{{ $value }}</label>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                      </div>
                      <hr/>
                      <div class="form-group">
                          <div class="col-lg-10">
                              <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                              <a href="{{ url('admin/company') }}" class="btn btn-default waves-effect" type="button">Cancel</a>
                          </div>
                      </div>
                  </div> <!-- panel-body -->
              </div> <!-- panel -->
          {!! Form::close() !!}
      </div> <!-- col -->

  </div> <!-- End row -->
@endsection
@section('js')
    {!! HTML::script(asset('assets/timepicker/bootstrap-datepicker.js')); !!}
    {!! HTML::script(asset('assets/select2/select2.min.js')); !!}
    <!--form validation init-->
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#datepicker').datepicker({
                startDate: '-10y',
                format: 'yyyy-mm-dd'
            }).on('change', function() {
                jQuery('.datepicker').hide();
            });
        });
        // Select2
        jQuery(".select2").select2({
            width: '100%'
        });

    </script>
@endsection
