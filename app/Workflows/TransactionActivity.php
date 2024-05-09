<?php

namespace App\Workflows;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Workflow\Activity;

class TransactionActivity extends Activity
{
    public function execute()
    {
        $transaction = new Transaction();
        $transaction->status = 'pending';
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        return $transaction->id;
    }
}
