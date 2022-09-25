<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaPayments extends Model
{
    use HasFactory;

    protected $fillable = [
        'MerchantRequestID',
        'CheckoutRequestID',
        'ResultCode',
        'ResultDesc',
        'Amount',
        'MpesaReceiptNumber',
        'TransactionDate',
        'PhoneNumber'];
}
