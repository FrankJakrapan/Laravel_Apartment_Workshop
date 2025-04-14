<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Signin extends Component
{
    public $username;
    public $password;
    public $errorUsername;
    public $errorPassword;
    public $error = null;

    public function signIn(){
        $this->errorUsername = null;
        $this->errorPassword = null;
        $this->error = null;

        $validator = Validator::make([
            'username' => $this->username,
            'password' => $this->password
        ], [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
                $this->errorUsername = $validator->errors()->get('username')[0] ?? null;
                $this->errorPassword = $validator->errors()->get('password')[0] ?? null;
        } else {
            $user = User::where('name', $this->username)->first();
            
            if($user && Hash::check($this->password, $user->password)){

                // Auth::loginUsingId($user->id);
                session()->put('user_id', $user->id);
                session()->put('user_name', $user->name);
                session()->put('user_level', $user->level);

                $this->redirect('/dashboard');
            }else{
                $this->error = 'Username or password is incorrect';
            }
        }

    }

    public function render()
    {
        return view('livewire.signin');
    }
}
