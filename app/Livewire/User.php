<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Component {
    public $showModal = false;
    public $showModalDelete = false;
    public $id;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $level = 'user';
    public $listLevel = ['user', 'admin'];
    public $listUser = [];
    public $error = null;
    public $errorList = [];
    public $nameForDelete = null;

    public function mount() {
        $this->fetchData();
    }

    public function fetchData() {
        $this->listUser = UserModel::all();
    }

    public function openModal() {
        $this->showModal = true;
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->password_confirmation = null;
        $this->level = 'user';
        $this->error = [];
    }

    public function closeModal() {
        $this->showModal = false;
    }   

    public function save() {
        $errors = [];

        if (empty($this->name)) {
            $errors[] = 'กรุณากรอกชื่อ';
        }
    
        if (empty($this->email)) {
            $errors[] = 'กรุณากรอกอีเมล';
        }
    
        if (empty($this->password)) {
            $errors[] = 'กรุณากรอกรหัสผ่าน';
        }
    
        if (empty($this->password_confirmation)) {
            $errors[] = 'กรุณายืนยันรหัสผ่าน';
        }
    
        if (!empty($this->password) && !empty($this->password_confirmation) && $this->password !== $this->password_confirmation) {
            $errors[] = 'รหัสผ่านไม่ตรงกัน';
        }

        $existingUser = UserModel::where('name', $this->name)
        ->when($this->id, function ($query) {
            $query->where('id', '!=', $this->id);
        })
        ->first();

        if ($existingUser) {
            $errors[] = 'มีชื่อผู้ใช้นี้อยู่แล้วในระบบ';
        }

        if (!empty($errors)) {
            $this->error = $errors;
            return;
        }

        $user = new UserModel();
        $password = Hash::make($this->password);

        if ($this->id != null) {
            $user = UserModel::find($this->id);

            if ($this->password != null) {
                $user->password = $password;
            } else {
                $user->password = $user->password;
            }
        } else {
            $user->password = $password;
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->level = $this->level;
        $user->save();

        $this->fetchData();
        $this->closeModal();

        $this->id = null;
    }

    public function openModalEdit($id) {
        $this->id = $id;
        $this->showModal = true;

        $user = UserModel::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->level = $user->level;
        $this->password = null;
        $this->password_confirmation = null;
        $this->error = [];
    }

    public function closeModalEdit() {
        $this->showModal = false;
    }

    public function openModalDelete($id, $name) {
        $this->id = $id;
        $this->nameForDelete = $name;
        $this->showModalDelete = true;
    }

    public function closeModalDelete() {
        $this->showModalDelete = false;
    }

    public function delete() {
        UserModel::find($this->id)->delete();
        $this->fetchData();
        $this->closeModalDelete();
    }

    public function render() {
        return view('livewire.user');
    }
}