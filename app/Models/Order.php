<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'requests';
    
    protected $fillable = [
        'user_id',
        'service_id', 
        'name',
        'phone',
        'email',
        'problem_description',
        'status', 
    ];
    
    public function service() {
        return $this->belongsTo(Service::class);
    }
}