<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Scholar;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        //dd($data);

        $warns = [
            'required' => 'Required',
            'min'=> 'To Short :attribute',
            'max' => 'To Long',
            'numeric' => 'Numbers Only',

        ];

        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'suffix' => ['string', 'max:255'],
            'middleName' => ['string', 'max:255'],
            'surname' => ['required','string', 'max:255'],
            'birthday'=> ['required','string', 'max:255'],
            'gender'=> ['required','string', 'max:255'],
            'civilStatus'=> ['required','string', 'max:255'],
            'religion'=> ['string', 'max:255'],
            'street'=> ['string', 'max:255'],
            // 'HouseNumber'=> ['required','string', 'max:255'],
            'barangay'=> ['required','string', 'max:255'],
            'district'=> ['required','string', 'max:255'],
            'city'=> ['required','string', 'max:255'],
            'yearStart'=> ['required','numeric', 'max:3000', 'min:1900'],
            'contactNumber'=> ['required', 'numeric','min:1000000000', 'max:99999999999'],
            'scholarEmail' => ['required','string','email', 'max:255', 'unique:scholars'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],  $warns);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);

        return Scholar::create();
    }
}
