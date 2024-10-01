<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class BankQrCodeController extends Controller
{
    public function generateQRCode()
    {
        // Thay thế các thông tin dưới đây bằng thông tin chuyển khoản của bạn
        $bankDetails = [
            'name' => 'TPBank',
            'account_number' => '09219337975', // Số tài khoản
            'amount' => '10000',
            'note' => 'Ghi Chú',
        ];
    
        // Định dạng theo chuẩn
        $data = "bank:{$bankDetails['name']}?account={$bankDetails['account_number']}&amount={$bankDetails['amount']}&note={$bankDetails['note']}";
        // Tạo mã QR
        $qrCode = new QrCode($data);
        $qrCode->setSize(400); // Kích thước lớn hơn
        $qrCode->setMargin(10); // Lề của mã QR
    
        // Sử dụng PngWriter để tạo mã QR dưới dạng hình ảnh
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
    
        // Trả về mã QR dưới dạng hình ảnh
        return response($result->getString())
            ->header('Content-Type', 'image/png');
    }
    
}
