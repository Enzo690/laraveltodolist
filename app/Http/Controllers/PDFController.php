<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function pdf(Request $request) {
        $users = DB::table("users")->get();
        view()->share('users',$users);
        if($request->has('download')){
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('pdfview');
            // download pdf
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }
}
