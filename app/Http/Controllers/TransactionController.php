<?php

namespace App\Http\Controllers;

use App\Workflows\TransactionWorkflow;
use Illuminate\Http\Request;
use Workflow\WorkflowStub;

class TransactionController extends Controller
{
    public function order()
    {
        $workFlow = WorkflowStub::make(TransactionWorkflow::class);
        $workFlow->start();
        while ($workFlow->running());
        $workFlow->output();
    }
}
