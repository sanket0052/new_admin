<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\Role;
use File;
use App\Models\Company;
use App\Models\ReportListing;
use App\Models\User;

class UserController extends Controller
{

	public $user;

	public $path;

	public function __construct()
	{
		$this->path = storage_path('/app/public/');

		$this->user = $this->getUser(null, true);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('admin.user.index');
	}

	public function getData()
	{
		$user = $this->getUser(null, true);
		if($user->role->id == config('role.roles.SUPER_ADMIN')){
			$users = User::with('company', 'role')
				->where('id', '<>', $user->id)
				->get();
		}else if($user->role->id == config('role.roles.COMPANY_ADMIN')){
			$users = User::with('company', 'role')
				->where('id', '<>', $user->id)
				->where('created_by', $user->id)
				->get();
		}

		return Datatables::of($users)
			->addColumn('company', function ($user) {
				return isset($user->company) ? $user->company->first()['name'] : null;
			})
			->addColumn('role', function ($user) {
				return isset($user->role) ? $user->role->title : null;
			})
			->addColumn('action', function ($user) {
				return view('admin.shared.datatable.action', [
					'editUrl' => route('admin.user.edit', $user->id),
					'deleteUrl' => route('admin.user.destroy', $user->id)
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
		if($this->user['role']['id'] == config('role.roles.SUPER_ADMIN')){
			$reports = ReportListing::get()->pluck('name', 'id')->toArray();
			$role = Role::get()->pluck('title', 'id')->toArray();
			$company = Company::get()->pluck('name', 'id')->toArray();
		}else if($this->user['role']['id'] == config('role.roles.COMPANY_ADMIN')){
			$reports = ReportListing::get()->pluck('name', 'id')->toArray();
			$role = Role::get()->pluck('title', 'id')->toArray();
			$userId = $this->user['id'];
			$company = Company::with([
				'user' => function($query) use ($userId){
					$query->where('user_id', '=', $userId);
				}
			])
			->get()
			->pluck('name', 'id')->toArray();
		}
		return view('admin.user.form',[
			'new_user' => null,
			'route' => 'admin.user.store',
			'method' => 'POST',
			'role' => $role,
			'reports' => $reports,
			'company' => $company,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(UserRequest $request)
	{

		$inputs = $request->all();

		$inputs['birth_date'] = $inputs['birth_date'];
		$inputs['password'] = bcrypt($inputs['password']);

		if(isset($inputs['company_id'])){
			$companyDirName = Company::find($inputs['company_id']);
		}

		if($inputs['role_id'] != 1 && $inputs['role_id'] != 2){
			$dirName = str_random(6);
			$this->createDirectory($companyDirName->directory_name, $dirName);
			$inputs['directory_name'] = $dirName;
		}
		$user = User::create($inputs);

		if(isset($inputs['report_id'])){
			$user->report()->sync($inputs['report_id']);
		}

		if(isset($inputs['company_id'])) {
			$user->company()->sync([$inputs['company_id']]);
		}

		return redirect('admin/user')
			->with('message', 'User Created Successfully.');
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
		if($this->user['role']['id'] == config('role.roles.SUPER_ADMIN')){
			$reports = ReportListing::get()->pluck('name', 'id')->toArray();
			$role = Role::get()->pluck('title', 'id')->toArray();
			$company = Company::get()->pluck('name', 'id')->toArray();
		}else if($this->user['role']['id'] == config('role.roles.COMPANY_ADMIN')){
			$reports = ReportListing::get()->pluck('name', 'id')->toArray();
			$role = Role::get()->pluck('title', 'id')->toArray();
			$userId = $this->user['id'];
			$company = Company::with([
				'user' => function($query) use ($userId){
					$query->where('user_id', '=', $userId);
				}
			])
			->get()
			->pluck('name', 'id')->toArray();
		}
		$user = User::with('report', 'role', 'company')->find($id);
		$selectedReport = $user->report->pluck('id')->toArray();
		$selectedCompany = $user->company->pluck('id')->first();

		return view('admin.user.form', [
			'new_user' => $user,
			'route' => ['admin.user.update', $user->id],
			'method' => 'PUT',
			'role' => $role,
			'reports' => $reports,
			'company' => $company,
			'selectedCompany' => $selectedCompany,
			'selectedReport' => $selectedReport
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserRequest $request, $id)
	{
		// echo '<pre>';
		// print_r($request->all());
		// exit;
		$inputs = $request->all();

		$user = User::findOrFail($id);

		if(isset($inputs['company_id'])){
			$companyDirName = Company::find($inputs['company_id']);
		}

		if(!empty($inputs['password']) && isset($inputs['password'])){
			$inputs['password'] = bcrypt($inputs['password']);
		}else{
			unset($inputs['password']);
		}

		$user->fill($inputs)->save();

		if(isset($inputs['report_id'])){
			$user->report()->sync($inputs['report_id']);
		}

		if(isset($inputs['company_id'])) {
			$user->company()->sync([$inputs['company_id']]);
		}

		return redirect('admin/user')
			->with('message', 'User Update Successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		// $paths = $this->getAllPath($id, false);
		$user = User::with('company', 'role')->findOrFail($id);
		if($user->role->id == config('role.roles.COMPANY_ADMIN')) {

		} else if($user->role->id == config('role.roles.COMPANY_USER')) {
			// echo '<prE>';
			// print_r($user);
			// exit;
			foreach ($user->company as $key => $value) {
				$path = $this->path.$value->directory_name;
				$reports = config('report.directory_name');
				foreach ($reports as $key => $value) {
					File::deleteDirectory($path.'/'.$key.'/'.$user->directory_name);
				}
			}
			$user->delete();
		}
		return redirect('admin/user')->with('message', 'User Deleted Successfully.');
	}

	public function createDirectory($companyDirName, $userDirName)
	{
		$path = $this->path.$companyDirName;
		$reports = config('report.directory_name');
		foreach ($reports as $key => $value) {
			File::makeDirectory($path.'/'.$key.'/'.$userDirName, 0777, true);
		}
		return true;
	}
}
