<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Symfony\Component\HttpFoundation\StreamedResponse;
use File;


class ReportsController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->user = $this->getUser(null, true);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.report.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function reports($type)
    {
        $role = $this->user->role()->first()->id;
        switch ($type) {
            case 'master-report':
                if($role == 1){
                    $this->masterReport();
                }else{
                    echo 'Your are not authorized';
                }
                break;
            case 'ledgeros':
                $data = $this->ledgerOSReport();
                return view('admin.reports.report', [
                    'listing' => true,
                    'data' => $data,
                    'type' => $type
                ]);
                break;
            case 'stock':
                $data = $this->stockSummaryReport();
                return view('admin.reports.report', [
                    'listing' => true,
                    'data' => $data,
                    'type' => $type
                ]);
                break;
            case 'ledger':
                $data = $this->ledgerReport();
                return view('admin.reports.report', [
                    'listing' => true,
                    'data' => $data,
                    'type' => $type
                ]);
                break;
            case 'sales':
                $data = $this->salesReport();
                return view('admin.reports.report', [
                    'listing' => true,
                    'data' => $data,
                    'type' => $type
                ]);
                break;
            case 'reorder':
                $data = $this->reorderReport();
                return view('admin.reports.report', [
                    'listing' => true,
                    'data' => $data,
                    'type' => $type
                ]);
                break;
            case 'price':
                $data = $this->priceReport();
                return view('admin.reports.report', [
                    'listing' => true,
                    'data' => $data,
                    'type' => $type
                ]);
                break;

            default:
                # code...
                break;
        }
        // $company = Company::get()->pluck('name', 'id')->toArray();
        //
        // $path = storage_path('app\public\setelite1');
        // $files = File::allFiles($path);
        // echo '<pre>';
        // foreach ($files as $file)
        // {
        //     echo (string)$file, "\n";
        // }
        // exit;
        //
        // array_unshift($company, 'Select Company');
        // return view('admin.report.index', [
        //     'company' => $company
        // ]);
    }

    public function export()
    {
        $masterReport = Company::with('user')->get();
        ob_end_clean();
        header( 'Content-Type: text/csv' );
        header( 'Content-Disposition: attachment;filename=demo.csv');

        $handle = fopen('php://output', 'w');

        fputcsv($handle, [
           'Company Name', 'Copany Access Key', 'User Name', 'User Access Key'
        ]);

        foreach ($masterReport as $row) {
            foreach ($row['user'] as $val) {
                $username = $val['name'];
                $userdir = $val['directory_name'];
            }
            fputcsv($handle, [
                $row['name'],
                $row['directory_name'],
                $username,
                $userdir,
            ]);
        }
        fclose($handle);
        $contLength = ob_get_length();
        return redirect('admin/reports');
    }

    public function masterReport()
    {
        $this->export();
    }

    public function ledgerOSReport()
    {
        $companyDirectory = \Auth::user()->load('company');
        $filesName = [];
        if(!empty($companyDirectory->company->first()->directory_name) && !empty($companyDirectory->directory_name)){
            $path = storage_path('app/public/').$companyDirectory->company->first()->directory_name.'/ledgeros/'.$companyDirectory->directory_name;
            $files = $this->getDirectoriesAndFiles($path);
        }
        return array_sort_recursive($files);
    }
    
    public function stockSummaryReport()
    {
        $companyDirectory = \Auth::user()->load('company');
        $filesName = [];
        if(!empty($companyDirectory->company->first()->directory_name) && !empty($companyDirectory->directory_name)){
            $path = storage_path('app/public/').$companyDirectory->company->first()->directory_name.'/stock/'.$companyDirectory->directory_name;
            $files = $this->getDirectoriesAndFiles($path);
        }
        return array_sort_recursive($files);
    }

    public function ledgerReport()
    {
        $companyDirectory = \Auth::user()->load('company');
        $filesName = [];
        if(!empty($companyDirectory->company->first()->directory_name) && !empty($companyDirectory->directory_name)){
            $path = storage_path('app/public/').$companyDirectory->company->first()->directory_name.'/ledger/'.$companyDirectory->directory_name;
            $files = $this->getDirectoriesAndFiles($path);
        }
        return array_sort_recursive($files);
    }

    public function salesReport()
    {
        $companyDirectory = \Auth::user()->load('company');
        $filesName = [];
        if(!empty($companyDirectory->company->first()->directory_name) && !empty($companyDirectory->directory_name)){
            $path = storage_path('app/public/').$companyDirectory->company->first()->directory_name.'/sales/'.$companyDirectory->directory_name;
            $files = $this->getDirectoriesAndFiles($path);
        }
        return array_sort_recursive($files);
    }

    public function reorderReport()
    {
        $companyDirectory = \Auth::user()->load('company');
        $filesName = [];
        if(!empty($companyDirectory->company->first()->directory_name) && !empty($companyDirectory->directory_name)){
            $path = storage_path('app/public/').$companyDirectory->company->first()->directory_name.'/reorder/'.$companyDirectory->directory_name;
            $files = $this->getDirectoriesAndFiles($path);
        }
        return array_sort_recursive($files);
    }

    public function priceReport()
    {
        $companyDirectory = \Auth::user()->load('company');
        $filesName = [];
        if(!empty($companyDirectory->company->first()->directory_name) && !empty($companyDirectory->directory_name)){
            $path = storage_path('app/public/').$companyDirectory->company->first()->directory_name.'/price/'.$companyDirectory->directory_name;
            $files = $this->getDirectoriesAndFiles($path);
        }
        return array_sort_recursive($files);
    }

    public function viewReports($type, $file)
    {   
        $companyDirectory = \Auth::user()->load('company');
        $path = storage_path('app/public/').$companyDirectory->company->first()->directory_name.'/'.$type.'/'.$companyDirectory->directory_name;
        $files = File::allFiles($path);
        $results = \Excel::load($path.'/'.$file)->get();
        // echo '<pre>';
        // print_r($results);
        // exit;
        return view('admin.reports.report', [
            'listing' => false,
            'dataExcel' => $results,
            'file' => $file,
            'type' => $type
        ]);
    }

    public function getDirectoriesAndFiles($path)
    {
        $directories = $this->isDirectory($path);

        $files = File::allFiles($path);

        foreach ($files as $file)
        {
            $pathInfo = pathinfo($file);
            $directory = array_values(explode('/', $pathInfo['dirname']));
            if(!in_array(end($directory), $directories)){
                if($pathInfo['dirname']  == $path){
                    $filesName[$pathInfo['basename']] = $pathInfo['dirname'];
                }
            }else{
                $filesName[end($directory)] = $this->getDirectoriesAndFiles($pathInfo['dirname']);
            }
        }
        return array_sort_recursive($files);
    }

    public function isDirectory($path)
    {
        $directories = File::directories($path);
        $dir = [];
        foreach ($directories as $key => $value) {
            $directory = array_values(explode('/', $value));
            $dir[] = end($directory);
        }
        return $dir;
    }
}
