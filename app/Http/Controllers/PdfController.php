<?php
   
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Order;
use App\Models\Agent;
use Illuminate\Support\Facades\Auth;
use PDF;
use Redirect;
   
class PdfController extends Controller
{
   
    public function pdfForm()
    {
        return view('pdf_form');
    }
 
    public function pdfDownload(Request $request){
 
       request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
        ]);
      
         $data = 
         [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
         ];
       $pdf = PDF::loadView('pdf_download', $data);
   
       return $pdf->stream('tutsmake.pdf');
    }
    
 
}