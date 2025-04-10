<div>
    <div class="content-header">
        <div>
            <div>บันทึกค่าใช้จ่าย</div>
        </div>
    </div>
    <div class="content-body">
        <div class="flex">
            <button class="btn-info mr-2" wire:click="openModalPayLog">
                <i class="fa-solid fa-plus mr-2 "></i>
                เพิ่มค่าใช้จ่าย
            </button>
            <button class="btn-info" wire:click="openModalPay">
                <i class="fa-solid fa-list mr-2"></i>
                รายการค่าใช้จ่าย
            </button>
        </div>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th class="text-center">วันที่</th>
                    <th class="text-center">รายการ</th>
                    <th class="text-center">หมายเหตุ</th>
                    <th class="text-center">ยอดเงิน</th>
                    <th class="text-center" width="150px">แก้ไข</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($payLogs as $payLog)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($payLog->pay_date)) }}</td>
                        <td>{{ $payLog->name }}
                            @if ($payLog->status == 'delete')
                                <span class="text-danger">*** ถูกลบ ***</span>
                            @endif
                        </td>
                        <td>{{ $payLog->remark }}</td>
                        <td>{{ number_format($payLog->amount) }}</td>
                        <td>
                            <button class="btn-edit" wire:click="openModalPayLogEdit({{ $payLog->id }})">
                                <i class="fa-solid fa-pencil mr-2"></i>
                            </button>

                            @if ($payLog->status == 'use')
                                <button class="btn-delete" wire:click="openModalPayLogDelete({{ $payLog->id }})">
                                    <i class="fa-solid fa-times mr-2"></i>
                                </button>
                            @endif

                            @if ($payLog->status == 'delete')
                                <button class="btn-success" wire:click="openModalPayLogRestore({{ $payLog->id }})">
                                    <i class="fa-solid fa-check mr-2"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>