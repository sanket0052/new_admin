<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'logo', 'address', 'website', 'email', 'phone', 'mobile', 'proffesion', 'directory_name'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model)
        {
            $model->created_by = \Auth::user()->id;
        });
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'company_user', 'company_id', 'user_id');
    }
}
