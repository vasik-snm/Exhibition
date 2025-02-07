<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StallInfo extends Model
{
    protected $table = 'stall_infos';

    protected $fillable = [
        'user_name',
        'store_name',
        'user_address',
        'user_city',
        'user_zip_code',
        'user_phone',
        'user_whatsapp',
        'user_email',
        'user_collection',
        'user_insta_id',
        'main_option',
        'stall_type',
        'food_option',
        'extra_requirement',
        'extra_requirement_details',
        'promo_code',
        'Promo_code_details',
        'status',
        'payment_receipt',
        'total_amount',
        'final_amount',
        'transaction_no',
        'payment_mode',
        'logo_design',
        'extra_notes'

    ];
}
