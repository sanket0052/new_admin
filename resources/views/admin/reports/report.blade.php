@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
  <!-- Form-validation -->
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">{{ isset($data) ? $type.' File Listing' : $file }}</h3></div>
        <div class="panel-body">
          @if(isset($data) && !empty($data))
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div id="sidebar-menu">
                  {{ generateHtml($getData, $data) }}
                  {!! $getData !!}
                  <!-- <ul>
                    <li class="has_sub">
                      <a href="javascript:void(0);" class="waves-effect"><i class="md md-share"></i><span>Multi Level </span><span class="pull-right"><i class="md md-add"></i></span></a>
                      <ul>
                        <li class="has_sub">
                          <a href="javascript:void(0);" class="waves-effect"><span>Menu Level 1.1</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                          <ul style="">
                            <li><a href="javascript:void(0);"><span>Menu Level 2.1</span></a></li>
                            <li><a href="javascript:void(0);"><span>Menu Level 2.2</span></a></li>
                            <li><a href="javascript:void(0);"><span>Menu Level 2.3</span></a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="javascript:void(0);"><span>Menu Level 1.2</span></a>
                        </li>
                      </ul>
                    </li>
                  </ul> -->
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          @else
            <p>No Directory Exist.</p>
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
