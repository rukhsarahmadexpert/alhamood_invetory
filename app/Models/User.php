<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','role_user');
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_id','id');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }

    public function customer_advances()
    {
        return $this->hasMany('App\Models\CustomerAdvance');
    }

    public function drivers()
    {
        return $this->hasMany('App\Models\Driver');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Models\Supplier');
    }

    public function supplier_advances()
    {
        return $this->hasMany('App\Models\SupplierAdvance');
    }

    public function banks()
    {
        return $this->hasMany('App\Models\Bank');
    }

    public function countries()
    {
        return $this->hasMany('App\Models\Country');
    }

    public function states()
    {
        return $this->hasMany('App\Models\State');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function regions()
    {
        return $this->hasMany('App\Models\Region');
    }

    public function units()
    {
        return $this->hasMany('App\Models\Unit');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }

    public function purchase_details()
    {
        return $this->hasMany('App\Models\PurchaseDetail');
    }

    public function update_notes()
    {
        return $this->hasMany('App\Models\UpdateNote');
    }

    public function expense_categories()
    {
        return $this->hasMany('App\Models\ExpenseCategory');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function expenses()
    {
        return $this->hasMany('App\Models\Expense');
    }

    public function expense_details()
    {
        return $this->hasMany('App\Models\ExpenseDetail');
    }

    public function file_upload()
    {
        return $this->hasMany('App\Models\FileUpload');
    }

    public function sales()
    {
        return $this->hasMany('App\Models\Sale');
    }

    public function sale_Details()
    {
        return $this->hasMany('App\Models\SaleDetail');
    }

    public function meter_readers()
    {
        return $this->hasMany('App\Models\MeterReader');
    }

    public function meter_readings()
    {
        return $this->hasMany('App\Models\MeterReading');
    }

    public function meter_reading_details()
    {
        return $this->hasMany('App\Models\MeterReadingDetail');
    }

}
