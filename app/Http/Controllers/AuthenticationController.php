<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

    protected $PVEAuthCookie;
    protected $CSRFPreventionToken;

    public function __construct()
    {
        $this->PVEAuthCookie = getenv('PVEAuthCookie');
        $this->CSRFPreventionToken = getenv('CSRFPreventionToken');
    }

    public function index()
    {

        return view('auth_pages.login');
    }
    public function registration()
    {
        return view('auth_pages.register');
    }

    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|max:36',

        ]);


        if ($validator->fails()) {

            return redirect('login')->withError($validator->errors()->all());
        } else {

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return Redirect('dashboard')->withSuccess('You have Successfully loggedin');
            } else {
                return Redirect('login')->withError('Invalid credentials!');
            }
        }
    }

    public function postRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number'=>'required|regex:/^\d{10,}$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:36',
            'password_confirmation' => [
                'required',
                'same:password',
            ],
        ]);
        if ($validator->fails()) {

            return redirect('registration')->withError($validator->errors()->all());
        } else {
            $data = $request->all();
            $check = $this->create($data);

            Auth::login($check);

            return redirect("login")->withSuccess('Great! You have Successfully registered');
        }
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone_number'=> $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect('login')->withSuccess('You have Successfully logged out.');
    }
    public function forgot_password()
    {
        return view('auth_pages.forgot-password');
    }

    public function update_password(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if (!$user) {

            return redirect()->back()->withError('Email does not match our records');
        } else {

            if (!Hash::check($credentials['password'], $user->password)) {
                return redirect()->back()->withError(['password' => 'Invalid Old Password']);
            }
            $user->password = Hash::make($request->password_confirmation);
            $user->save();
            return redirect('login')->withSuccess('Password updated successfully');
        }
    }
}