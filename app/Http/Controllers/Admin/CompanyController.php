<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;
use App\Http\Requests\CompanyRequest;
use App\Http\Controllers\Controller;
use App\Models\Company;
use File;
use Yajra\Datatables\Datatables;

class CompanyController extends Controller
{
    public $user;

    public function __construct(){
        $this->user = $this->getUser(null, true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.company.index');
    }

    public function getData()
    {
        $companies = Company::all();

        return Datatables::of($companies)
            ->addColumn('action', function ($company) {
                return view('admin.shared.datatable.action', [
                    'editUrl' => route('admin.company.edit', $company->id),
                    'deleteUrl' => route('admin.company.destroy', $company->id)
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
        return view('admin.company.form', [
            'company' => null,
            'route' => 'admin.company.store',
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $inputs = $request->all();

        $dirName = str_random(6);
        $inputs['directory_name'] = $dirName;

        $result = $this->createRepository($dirName);

        $this->createReportDirectory($dirName);

        if($request->hasFile('logo')) {
            $logoPath = asset('logos');

            $logo = $request->file('logo');
            $logoExt = $logo->getClientOriginalExtension();
            $inputs['logo'] = str_random(5).strtotime('now').'.'.$logoExt;
            $logo->move(
                $logoPath, $inputs['logo']
            );
        }
        $company = Company::create($inputs);
        if($this->user['role']['id'] == config('role.roles.COMPANY_ADMIN')){
            $company->user()->sync([$this->user['id']]);
        }
        if($result){
            return redirect('admin/company')
                ->with('message', 'Company Created Successfully.');
        }else{
          return redirect('admin/company')
              ->with('message', 'Error accured while creating directory.');
        }
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
        $company = Company::find($id);

        return view('admin.company.form', [
              'company' => $company,
              'route' => ['admin.company.update', $company->id],
              'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $inputs = $request->all();
        $company = Company::find($id);
        $company->fill($inputs)->save();

        return redirect('admin/comany')
            ->with('message', 'Company Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo 'dsdds';
        exit;
        $company = Company::findOrFail($id);

        $company->delete();

        return redirect('admin/company');
    }

    public function createRepository($dirName)
    {
        $path = storage_path('/app/public/').$dirName;
        $result = File::makeDirectory($path, 0777, true);
        File::makeDirectory($path.'/logo', 0777, true);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function createReportDirectory($dirName)
    {
        $path = storage_path('/app/public/').$dirName;
        $reports = config('report.directory_name');
        foreach ($reports as $key => $value) {
            File::makeDirectory($path.'/'.$key, 0777, true);
        }
        return true;
    }
}
