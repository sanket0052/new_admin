<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportListing extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'report_listing';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'is_active', 'url_title'
	];

	public function user()
	{
		return $this->belongsToMany(User::class, 'report_user', 'report_id', 'user_id');
	}
}
