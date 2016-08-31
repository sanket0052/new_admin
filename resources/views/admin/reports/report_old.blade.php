@extends('admin.layouts.app')

@section('content')
  <!-- Form-validation -->
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">{{ isset($data) ? $type.' File Listing' : config('report.report_title.'.$type).' - '.$file }}</h3></div>
        <div class="panel-body">
          @if($listing == true)
            @if(isset($data) && !empty($data))
              <div class="list-group">
                  @foreach ($data as $key => $value)
                    <a href="{{ url('admin/report/view/'.$type.'/'.$key) }}" class="list-group-item">{{ $key }}</a>
                  @endforeach
              </div>
            @else
              <p>No Directory Exist.</p>
            @endif
          @endif
          @if(isset($dataExcel))
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table class="table">
                    @if($type == 'ledger')
                      @foreach ($dataExcel as $key => $value)
                        <tbody> 
                          @foreach ($value as $ke => $va)
                            @if($ke==0)
                              <tr>
                                @foreach($va as $k => $val)
                                  <th>{{ ucwords(str_replace('_', ' ', $k)) }}</th>
                                @endforeach
                              </tr>
                            @else
                              <tr>
                                @foreach($va as $k => $val)
                                  <td>{{ $val }}</td>
                                @endforeach
                              </tr>
                            @endif
                          @endforeach
                        <tbody>
                      @endforeach
                    @elseif($type == 'stock')
                      <tbody>
                        @foreach ($dataExcel as $key => $value)
                          @if($key==0)
                            <tr>
                              @foreach ($value as $ke => $va)
                                @if($ke != 'parent')
                                  <th>{{ ucwords(str_replace('_', ' ', $ke)) }}</th>
                                @endif
                              @endforeach
                            </tr>
                          @endif
                          <tr>
                            @if($value->parent != 'Yes')
                              @foreach ($value as $ke => $va)
                                @if($ke != 'parent')
                                  <td>{{ $va }}</td>
                                @endif
                              @endforeach
                            @else
                              @foreach ($value as $ke => $va)
                                @if($ke != 'parent') 
                                  <th>{{ ucwords($va) }}</th>
                                @endif
                              @endforeach
                            @endif
                          </tr>
                        @endforeach
                      <tbody>
                    @elseif($type == 'extra')
                      <tbody>
                        @foreach ($dataExcel as $key => $value)
                          @if($key==0)
                            <tr>
                              @foreach ($value as $ke => $va)
                                @if($ke != 'parent')
                                  <th>{{ ucwords(str_replace('_', ' ', $ke)) }}</th>
                                @endif
                              @endforeach
                            </tr>
                          @endif
                          <tr>
                            @if($value->parent != 'Yes')
                              @foreach ($value as $ke => $va)
                                @if($ke != 'parent')
                                  <td>{{ $va }}</td>
                                @endif
                              @endforeach
                            @else
                              @foreach ($value as $ke => $va)
                                @if($ke != 'parent') 
                                  <th>{{ ucwords($va) }}</th>
                                @endif
                              @endforeach
                            @endif
                          </tr>
                        @endforeach
                      <tbody>
                    @elseif($type == 'sales')
                      <tbody>
                        @foreach ($dataExcel as $key => $value)
                          @if($key==0)
                            <tr>
                              @foreach ($value as $ke => $va)
                                <th>{{ ucwords(str_replace('_', ' ', $ke)) }}</th>
                              @endforeach
                            </tr>
                          @endif
                          <tr>
                            @foreach ($value as $ke => $va)
                              <td>{{ $va }}</td>
                            @endforeach
                          </tr>
                        @endforeach
                      <tbody>
                    @elseif($type == 'reorder')
                      <tbody>
                        @foreach ($dataExcel as $key => $value)
                          @if($key==0)
                            <tr>
                              @foreach ($value as $ke => $va)
                                <th>{{ ucwords(str_replace('_', ' ', $ke)) }}</th>
                              @endforeach
                            </tr>
                          @endif
                          <tr>
                            @foreach ($value as $ke => $va)
                              <td>{{ $va }}</td>
                            @endforeach
                          </tr>
                        @endforeach
                      <tbody>
                    @elseif($type == 'price')
                      <tbody>
                        @foreach ($dataExcel as $key => $value)
                          @if($key==0)
                            <tr>
                              @foreach ($value as $ke => $va)
                                <th>{{ ucwords(str_replace('_', ' ', $ke)) }}</th>
                              @endforeach
                            </tr>
                          @endif
                          <tr>
                            @foreach ($value as $ke => $va)
                              <td>{{ $va }}</td>
                            @endforeach
                          </tr>
                        @endforeach
                      <tbody>
                    @endif
                  </table>
                </div>
              </div>
            </div>
          @endif
        </div> <!-- panel-body -->
      </div> <!-- panel -->
    </div> <!-- col -->
  </div> <!-- End row -->
@endsection
@section('js')
@endsection
