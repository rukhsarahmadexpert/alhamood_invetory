<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];
    protected $primaryKey = 'id';
    protected $table = 'sales';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_id','id');
    }

    public function sale_details()
    {
        return $this->hasMany('App\Models\SaleDetail','sale_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id','id');
    }

    public function update_notes()
    {
        return $this->hasMany('App\Models\UpdateNote','RelationId')->where('RelationTable','=','sales');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\FileUpload','RelationId')->where('RelationTable','=','sales');
    }
}
