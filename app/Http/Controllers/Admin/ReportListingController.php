<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ReportListing;
use App\Http\Requests\ReportListingRequest;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class ReportListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.report-listing.index');
    }

    public function getData()
    {
        $reportListings = ReportListing::all();

        return Datatables::of($reportListings)
            ->addColumn('action', function ($report) {
                return view('admin.shared.datatable.action', [
                    'editUrl' => route('admin.report-listing.edit', $report->id),
                    'deleteUrl' => route('admin.report-listing.destroy', $report->id)
                ])->render();
            })
            ->removeColumn('updated_at')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.report-listing.form', [
            'reportListing' => null,
            'route' => 'admin.report-listing.store',
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportListingRequest $request)
    {
        $inputs = $request->all();

        $reportListing = ReportListing::create($inputs);

        return redirect('admin/report-listing')
            ->with('message', 'Reports Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
