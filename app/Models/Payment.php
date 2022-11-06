<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  const NEW_PAYMENT = 'new';
  const AUTHORIZE = 'authorize';
  const CONFIRMED = 'confirmed';
  const COMPLETE = 'complete';
  const FAILED = 'failed';

  const CREDIT_CARD = 'credit_card';
  const PAYPAL = 'paypal';

  protected $table = 'payments';

  protected $fillable = [
    'amount', 'order_id', 'payment_method', 'state', 'fingerprint', 'transaction_reference', 'token', 'payer_id', 'response_details',
    'card_type', 'card_name', 'card_expiry', 'card_last_digits'
  ];

  public function order()
  {
    return $this->belongsTo(Order::class, 'order_id');
  }
}
