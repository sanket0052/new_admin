<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getAllPath($id=null, $flag=true)
    {
        $user = $this->getUser($id, $flag);
        $paths = [
            'storagePath' => storage_path(config('storage.storage_path.path')),
            'userDirName' => $user->directory_name,
            'companyDirName' => $user->company->first()->directory_name,
            'allReportPath' => config('report.directory_name')
        ];
        return $paths;
    }

    public function getUserDirectory($id)
    {

    }

    public function getUser($id=null, $flag=false)
    {
        return $flag == false ? User::with('company')->find($id) : \Auth::user();
    }
}
