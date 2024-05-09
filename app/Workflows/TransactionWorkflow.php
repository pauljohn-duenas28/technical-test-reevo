<?php

namespace App\Workflows;

use Workflow\ActivityStub;
use Workflow\Workflow;

class TransactionWorkflow extends Workflow
{
    public function execute()
    {
        try {
            $transactionId = yield ActivityStub::make(TransactionActivity::class);
            $this->addCompensation(fn () => ActivityStub::make(CancelTransactionAcitivity::class, $transactionId));
        } catch (\Throwable $th) {
            yield from $this->compensate();
            throw $th;
        }
    }
}
