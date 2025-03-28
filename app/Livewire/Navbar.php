<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Facades\Hash;

class Navbar extends Component{

    public $user_name;
    public $showModal = false;
    public $showModalEdit = false;
    public $username;
    public $password;
    public $password_confirm;
    public $errorUsername;
    public $errorPassword;

    public function editProfile(){
        $this->showModalEdit = true;

        $user = User::find(session()->get('user_id'));
        $this->username = $user->name;
    }

    public function updateProfile(){
        if($this->username == ''){
            $this->addError('username', 'Username is required');
            return;
        }

        if($this->password != $this->password_confirm){
            $this->addError('password_confirm', 'Password comfirm is not match');
            return;
        }

        $user = User::find(session()->get('user_id'));
        $user->name = $this->username;
        $user->password = $this->password ?? $user->password;
        $user->save();

        $this->showModalEdit = false;
    }

    public function mount(){
        $this->user_name = session()->get('user_name');
    }

    public function logout(){
        session()->flush();
        $this->redirect('/');
    }

    public function render(){
        return view('livewire.navbar');
    }

}

?>
