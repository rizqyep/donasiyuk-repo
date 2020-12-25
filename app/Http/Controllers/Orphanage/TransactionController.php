<?php

namespace App\Http\Controllers\Orphanage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use Str;
use App\Orphanage;
class TransactionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(Request $request){
        $request->validate([
            'amount' => 'required'
        ]);

        $orphanage = Orphanage::find($request->orphanage_id);
        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->user_id = Auth::user()->id;
        $transaction->orphanage_id = $orphanage->id;
        $transaction->payment_slug = $orphanage->payment->slug;

        $transaction->save();
        $payment_token = Str::random(32);
        return redirect('/payment/instruction/'.$payment_token.'/'.$transaction->payment_slug.'/'.$orphanage->slug.'/'.$transaction->id);

        
    }
}
