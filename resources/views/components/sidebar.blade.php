@livewire('navbar')
<div class="sidebar">
    <div class="sidebar-header">
        <div class="text-center">99s Apartment 1.0</div>
    </div>
    <div class="sidebar-body">
        <div class="menu">
            <ul>
                <li>
                    <a href="/dashboard" wire:navigate>
                        <i class="fa-solid fa-chart-line me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li><i class="fa-solid fa-wallet me-2"></i>บันทึกค่าใช้จ่าย</li>
                <li><i class="fa-solid fa-house me-2"></i>ห้องพัก</li>
                <li><i class="fa-solid fa-user me-2"></i>Profile</li>
                <li><i class="fa-solid fa-gear me-2"></i>Setting</li>
                <li>
                    <a href="/company/index" wire:navigate>
                        <i class="fa-solid fa-building me-2"></i>
                        About Company
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>