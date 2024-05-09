<?php

namespace App\Workflows;

use App\Models\Transaction;
use Workflow\Activity;

class CancelTransactionAcitivity extends Activity
{
    public function execute()
    {
        $transaction = new Transaction();
        $transaction->status = 'cancel';
        $transaction->save();
    }
}
