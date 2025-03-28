<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RoomModel;
use App\Models\CustomerModel;

class Customer extends Component
{
    public $customers = [];
    public $rooms = [];
    public $showModal = false;
    public $showModalDelete = false;
    public $id;
    public $name;
    public $phone;
    public $address;
    public $remark;
    public $roomId;
    public $createdAt;
    public $stayType;

    public function mount(){
        $this->fetchData();
        $this->createdAt = date('Y-m-d');
    }

    public function fetchData(){
        $this->customers = CustomerModel::where('status', 'use')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.customer');
    }
}