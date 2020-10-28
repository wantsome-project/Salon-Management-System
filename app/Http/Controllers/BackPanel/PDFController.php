<?php

namespace App\Http\Controllers\BackPanel;

use App\Customer;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceType;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF(Service $service)
    {

        $data = [
            "customer"     => $service->customer->user->name,
            "employee"     => $service->employee->user->name,
            "service_type" =>$service->serviceType->name,
            "amount" =>$service->serviceType->price,
            ];

        $pdf = PDF::loadView('back_panel.myPDF', $data);

        return $pdf->download('Invoice.pdf');
    }
}
