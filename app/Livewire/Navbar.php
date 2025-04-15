<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\clear;

class Navbar extends Component{

    public $user_name;
    public $showModal = false;
    public $showModalEdit = false;
    public $username;
    public $password;
    public $password_confirm;
    public $errorUsername;
    public $errorPassword;
    public $saveSuccess = false;
    public $userLevel = '';

    public function editProfile(){
        $this->showModalEdit = true;

        $user = User::find(session()->get('user_id'));
        $this->username = $user->name;
        $this->saveSuccess = false;
        // $this->clearErrors();
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

        // $this->showModalEdit = false;
        $this->resetForm();
        $this->saveSuccess = true;

        // $this->clearErrors();
    }

    public function resetForm() {
        // $this->username = '';
        $this->password = '';
        $this->password_confirm = '';
    }

    public function mount(){
        $this->user_name = session()->get('user_name');
        $this->userLevel = session()->get('user_level');
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
