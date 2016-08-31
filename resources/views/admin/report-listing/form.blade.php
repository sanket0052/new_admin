@extends('admin.layouts.app')

@section('css')
    {!! Html::style(asset('assets/timepicker/bootstrap-datepicker.min.css')) !!}
    {!! Html::style(asset('assets/select2/select2.css')) !!}
@endsection

@section('content')
  <!-- Form-validation -->
  <div class="row">
      <div class="col-sm-12">
          <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Report Listing</h3></div>
              <div class="panel-body">
                  {!!
                      Form::model($reportListing, [
                        'route' => $route,
                        'id' => 'reportListingForm',
                        'method' => $method
                      ])
                  !!}
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
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                              <label for="url_title">URL Name *</label>
                              {{ Form::text('url_title', null, ['class' => 'form-control', 'id' =>'url_title']) }}
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                              <label for="email">Description </label>
                              {{ Form::textarea('description', null, ['class' => 'form-control', 'id' =>'description']) }}
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="checkbox1">Status *</label>
                                <div class="checkbox checkbox-primary">
                                    {{ Form::checkbox('is_active', 1, true, ['id' => 'checkbox1', ]) }}
                                    <label for="checkbox1">Active</label>
                                </div>
                            </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                          <div class="col-lg-10">
                              <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                              <a href="{{ url('admin/report-listing') }}" class="btn btn-default waves-effect" type="button">Cancel</a>
                          </div>
                      </div>
                  {!! Form::close() !!}
              </div> <!-- panel-body -->
          </div> <!-- panel -->
      </div> <!-- col -->

  </div> <!-- End row -->
@endsection
@section('js')
    {!! HTML::script(asset('assets/timepicker/bootstrap-datepicker.js')); !!}
    {!! HTML::script(asset('assets/select2/select2.min.js')); !!}
    <!--form validation init-->
    <script type="text/javascript">
      // Select2
      jQuery(".select2").select2({
          width: '100%'
      });

    </script>
@endsection
