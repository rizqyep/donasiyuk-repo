<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Transaction;
use App\Donation;
use Storage;
use Auth;
use App\Orphanage;

class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function show($payment_token , $payment_slug, $orphanage_slug, Transaction $transaction){
        $payment = Payment::where('slug', $payment_slug)->first();
        $orphanage = $transaction->orphanage;
        return view('payment.show', compact('payment', 'orphanage', 'transaction'));
    }

    public function create(Request $request){
        $data = $request->validate([
            'proof' => 'required|mimes:jpeg,png,jpg',
            'amount' => 'required'
        ]);
        
        $proof = Storage::disk('public')->put('payment_proofs', $data['proof']);
        
        $orphanage = Orphanage::find($request->orphanage_id);
        $donation = new Donation();
        $donation->user_id = Auth::user()->id;
        $donation->orphanage_id = $request->orphanage_id;
        $donation->payment_id = $orphanage->payment->id;
        $donation->amount = $data['amount'];
        $donation->proof = $proof;
        $donation->save();

        return redirect('/payment/complete');
        
    }

    public function complete(){
        return view('payment.complete');
    }
}
