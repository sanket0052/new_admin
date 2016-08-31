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
                        <a href="{!! route('admin.user.create') !!}" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <table id="user-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Role</th>
                        <th>Company</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div><!-- end: page -->
    </div> <!-- end Panel -->
@endsection

@section('js')
    <!-- Examples -->
    {!! HTML::script(asset('assets/datatables/jquery.dataTables.min.js')); !!}
    {!! HTML::script(asset('assets/datatables/dataTables.bootstrap.js')); !!}

    <script>
        var _oTable = $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, 'desc' ]],
            ajax: '{!! route('admin.user.getData') !!}',
            columns: [
                // {data: '', name: '', orderable: false, searchable: false, sClass: "text-center"},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'contact_no', name: 'contact_no'},
                {data: 'role', name: 'role'},
                {data: 'company', name: 'company'},
                {data: 'created_by', name: 'created_by'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
