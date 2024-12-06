<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $table='bids';
    protected $fillable = ['id','project_id','company_name','bid_amount','deadline','bid_date'];
}