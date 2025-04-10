<div>
    <div class="content-header">ผู้เข้าพัก</div>
    <div class="content-body">
        <button class="btn-info" wire:click="openModal">
            <i class="fa-solid fa-plus mr-2"></i>
            เพิ่มผู้เข้าพัก
        </button>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th class="text-center">ชื่อ</th>
                    <th class="text-center">เบอร์โทร</th>
                    <th class="text-center">ห้องพัก</th>
                    <th class="text-center">วันที่เข้าพัก</th>
                    <th class="text-center">ประเภทการเข้าพัก</th>
                    <th class="text-center">ราคา</th>
                    <th class="text-center">หมายเหตุ</th>
                    <th class="text-center" width="150px">แก้ไข</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td class="text-center">{{ $customer->name }}</td>
                        <td class="text-center">{{ $customer->phone }}</td>
                        <td class="text-center">{{ $customer->room->name }}</td>
                        <td class="text-center">{{ date('d-m-Y', strtotime($customer->created_at)) }}</td>
                        <td class="text-center">{{ $customer->stay_type == 'd' ? 'รายวัน' : 'รายเดือน' }}</td>
                        <td class="text-center">{{ $customer->price }}</td>
                        <td class="text-center">{{ $customer->remark }}</td>
                        <td class="text-center">
                            <button class="btn-edit" wire:click="openModalEdit({{ $customer->id }})">
                                <i class="fa-solid fa-pencil mr-2"></i>
                            </button>
                            <button class="btn-delete" wire:click="openModalDelete({{ $customer->id }})">
                                <i class="fa-solid fa-times mr-2"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-modal wire:model="showModal" title="ผู้เข้าพัก">
        <div class="flex gap-2">
            <div class="w-1/2">
                <div>ชื่อ</div>
                <input type="text" wire:model="name" class="form-control" />
            </div>
            <div class="w-1/2">
                <div>เบอร์โทร</div>
                <input type="text" wire:model="phone" class="form-control" />
            </div>
        </div>
        <div class="flex gap-2 mt-3">
            <div class="w-1/3">
                <div>ห้องพัก</div>
                <select wire:model="roomId" class="form-control">
                    <option value="">เลือกห้องพัก</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id}}">
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/3">
                <div>วันที่เข้าพัก</div>
                <input type="date" wire:model="createdAt" class="form-control">
            </div>
            <div class="w-1/3">
                <div>ประเภทการเข้าพัก</div>
                <select wire:model="stayType" class="form-control">
                    <option value="d">รายวัน</option>
                    <option value="m">รายเดือน</option>
                </select>
            </div>
        </div>
        <div class="mt-3">ที่อยู่</div>
        <input type="text" wire:model="address" class="form-control">
        
        <div class="mt-3">หมายเหตุ</div>
        <input type="text" wire:model="remark" class="form-control">

        <div class="flex gap-2 mt-3 justify-center">
            <button class="btn-success" wire:click="save">
                <i class="fa-solid fa-check mr-2"></i>
                บันทึก
            </button>
            <button class="btn-danger" wire:click="closeModal">
                <i class="fa-solid fa-times mr-2"></i>
                ยกเลิก
            </button>
        </div>
    </x-modal>

    <x-modal wire:model="showModalEdit" title="แก้ไขห้องพัก">
        <div class="flex gap-2">
            <div class="w-1/2">
                <div>ชื่อ</div>
                <input type="text" wire:model="name" class="form-control" />
            </div>
            <div class="w-1/2">
                <div>เบอร์โทร</div>
                <input type="text" wire:model="phone" class="form-control" />
            </div>
        </div>
        <div class="flex gap-2 mt-3">
            <div class="w-1/3">
                <div>ย้ายห้องพัก</div>
                <select wire:model="roomId" class="form-control">
                    <option value="">เลือกห้องพัก</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id}}">
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/3">
                <div>วันที่เข้าพัก</div>
                <input type="date" wire:model="createdAt" class="form-control">
            </div>
            <div class="w-1/3">
                <div>ประเภทการเข้าพัก</div>
                <select wire:model="stayType" class="form-control">
                    <option value="d">รายวัน</option>
                    <option value="m">รายเดือน</option>
                </select>
            </div>
        </div>
        <div class="mt-3">ที่อยู่</div>
        <input type="text" wire:model="address" class="form-control">
        
        <div class="mt-3">หมายเหตุ</div>
        <input type="text" wire:model="remark" class="form-control">

        <div class="flex gap-2 mt-3 justify-center">
            <button class="btn-success" wire:click="update">
                <i class="fa-solid fa-check mr-2"></i>
                บันทึกgf
            </button>
            <button class="btn-danger" wire:click="showModalEdit = false">
                <i class="fa-solid fa-times mr-2"></i>
                ยกเลิก
            </button>
        </div>
    </x-modal>

    <x-modal-confirm showModalDelete="showModalDelete" title="ลบผู้เข้าพัก" text="คุณต้องการลบผู้เข้าพัก {{ $customerNameForDelete }} (ห้อง {{ $roomNameForDelete }}) หรือไม่ ?"
        clickConfirm="delete" clickCancel="closeModalDelete">
    </x-modal-confirm>
</div>