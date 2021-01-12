<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Orphanage;
use App\Profile;
use App\Payment;
use Str;
use Storage;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    public function redirectTo(){
        if(Auth::user()->type == 'orphanage'){
            return $this->redirectTo = '/orphanage';
        }
        else if(Auth::user()->type=='user'){
            return $this->redirectTo = '/';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        if($data['type'] == 'orphanage'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'orphanage_name' => ['required', 'string', 'max:255'],
                'payment_id' => 'required',
                'account_number' => 'required',
                'activity_media' => ['required','mimes:jpeg,png,jpg'],
                'building_media' => ['required','mimes:jpeg,png,jpg'],
                'structure_media' => ['required','mimes:pdf']
            ]);
        }
        else if($data['type'] == 'user'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['type'] == 'orphanage'){
            $user =  User::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])]);
            
            $activity_media = Storage::disk('public')->put('activity_media', $data['activity_media']);
            $structure_media = Storage::disk('public')->put('structure_media', $data['structure_media']);
            $building_media = Storage::disk('public')->put('building_media', $data['building_media']);
            Orphanage::create([
                'name' => $data['orphanage_name'],
                'payment_id' =>  $data['payment_id'],
                'user_id' => $user->id,
                'slug' => Str::slug($data['orphanage_name']).'-'.Str::random(20),
                'activity_media'=> $activity_media,
                'structure_media'=>$structure_media,
                'building_media' =>$building_media,
                'account_number' => $data['account_number'],
            ]);

            return $user;
        }
        else{
            $user =  User::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])]);
            Profile::create([
                'user_id' => $user->id
            ]);
            return $user;
        }

    
    }

    public function options(){
        return view('auth.register_options');
    }


    public function user(){
        return view('auth.register');
    }

    public function orphanage(){
        $payments = Payment::all();
        return view('auth.register_orphanage',compact('payments'));
    }
}
