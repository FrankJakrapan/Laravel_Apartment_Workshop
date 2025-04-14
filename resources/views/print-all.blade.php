@foreach($billings as $billing)
    <div style="page-break-after: always; padding: 40px; font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f7f8fa; border-radius: 10px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h3 style="font-size: 30px; color: #333; font-weight: bold;">ใบแจ้งค่าเช่า</h3>
            <h4 style="font-size: 22px; color: #777;">{{ $organization->name }}</h4>
            <p style="color: #888; font-size: 16px;">ของเดือน {{ date('m/Y', strtotime($billing->created_at)) }}</p>
        </div>

        <div style="margin-bottom: 30px;">
            <div><strong style="color: #555;">ห้องที่:</strong> <span style="color: #333;">{{ $billing->room->name }}</span></div>
            <div><strong style="color: #555;">ชื่อผู้เช่า:</strong> <span style="color: #333;">{{ $billing->getCustomer()->name }}</span></div>
            <div><strong style="color: #555;">เบอร์โทรศัพท์:</strong> <span style="color: #333;">{{ $billing->getCustomer()->phone }}</span></div>
        </div>

        <table width="100%" cellpadding="8" cellspacing="0" style="margin-top: 20px; border-collapse: collapse; font-size: 14px; background-color: #ffffff; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <thead style="background-color: #4e73df; color: white;">
                <tr>
                    <td style="text-align: left; padding: 12px 20px; font-weight: bold;">รายการ</td>
                    <td style="text-align: right; padding: 12px 20px; font-weight: bold; width: 120px;">ราคา</td>
                </tr>
            </thead>
            <tbody>
                <tr style="background-color: #f9f9f9;">
                    <td style="padding-left: 20px;">ค่าเช่า</td>
                    <td style="text-align: right; padding-right: 20px;">{{ number_format($billing->amount_rent) }}</td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td style="padding-left: 20px;">ค่าน้ำ</td>
                    <td style="text-align: right; padding-right: 20px;">{{ number_format($billing->amount_water) }}</td>
                </tr>
                <tr style="background-color: #f9f9f9;">
                    <td style="padding-left: 20px;">ค่าไฟ</td>
                    <td style="text-align: right; padding-right: 20px;">{{ number_format($billing->amount_electric) }}</td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td style="padding-left: 20px;">ค่าอินเตอร์เน็ต</td>
                    <td style="text-align: right; padding-right: 20px;">{{ number_format($billing->amount_internet) }}</td>
                </tr>
                <tr style="background-color: #f9f9f9;">
                    <td style="padding-left: 20px;">ค่าฟิตเนส</td>
                    <td style="text-align: right; padding-right: 20px;">{{ number_format($billing->amount_fitness) }}</td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td style="padding-left: 20px;">ค่าซักรีด</td>
                    <td style="text-align: right; padding-right: 20px;">{{ number_format($billing->amount_wash) }}</td>
                </tr>
                <tr style="background-color: #f9f9f9;">
                    <td style="padding-left: 20px;">ค่าเก็บขยะ</td>
                    <td style="text-align: right; padding-right: 20px;">{{ number_format($billing->amount_bin) }}</td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td style="padding-left: 20px;">ค่าอื่นๆ</td>
                    <td style="text-align: right; padding-right: 20px;">{{ number_format($billing->amount_etc) }}</td>
                </tr>
            </tbody>
            <tfoot style="background-color: #4e73df; color: white;">
                <tr>
                    <td style="text-align: right; padding-right: 20px; font-weight: bold;">รวม</td>
                    <td style="text-align: right; padding-right: 20px; font-weight: bold;">{{ number_format($billing->sumAmount()) }}</td>
                </tr>
            </tfoot>
        </table>

        <div style="text-align: center; margin-top: 40px;">
            <p style="font-size: 12px; color: #777;">ใบแจ้งค่าเช่านี้ใช้สำหรับการอ้างอิงเท่านั้น</p>
        </div>
    </div>
@endforeach

<script>
    window.print();
</script>
