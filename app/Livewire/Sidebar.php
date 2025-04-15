<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
   
    public $currentMenu = '';
    public $userLevel = '';

    public function mount(){
        //ใช้ป้องกันการเข้าเว็ปโดยไม่ล็อกอิน ใช้แบบนี้จะง่ายกว่าการไปทำกำหนดใน Route
        // $user_id = session()->get('user_id');

        // if(!isset($user_id)){
        //     return redirect()->to('/');
        // }

        $this->currentMenu = session()->get('currentMenu') ?? '';
        $this->userLevel = session()->get('user_level');
    }

    public function changeMenu($menu){
        session()->put('currentMenu', $menu);
        $this->currentMenu = $menu;

        return redirect()->to('/' . $menu);
    }

    public function render(){
        return view('livewire.sidebar');
    }

}