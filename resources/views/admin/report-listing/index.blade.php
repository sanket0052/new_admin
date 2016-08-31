@extends('admin.layouts.app')

@section('css')
    <!-- Plugin Css-->
    {!! Html::style(asset('assets/datatables/jquery.dataTables.min.css')) !!}
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <a href="{{ route('admin.report-listing.create') }}" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <table id="report-listing-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>URL Title</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- end: page -->

    </div> <!-- end Panel -->

@endsection

@section('js')
    <!-- Examples -->
    {!! HTML::script(asset('assets/datatables/jquery.dataTables.min.js')); !!}
    {!! HTML::script(asset('assets/datatables/dataTables.bootstrap.js')); !!}

    <script>
        var _oTable = $('#report-listing-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, 'desc' ]],
            ajax: '{!! route('admin.report-listing.getData') !!}',
            columns: [
                // {data: '', name: '', orderable: false, searchable: false, sClass: "text-center"},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'url_title', name: 'url_title'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
