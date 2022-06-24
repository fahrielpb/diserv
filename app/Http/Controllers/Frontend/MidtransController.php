<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Category;
use Midtrans\Transaction;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Midtrans\Config as ConfigMidtrans;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    { 
        // set konfigurasi midtrans
        ConfigMidtrans::$serverKey = config('midtrans.serverKey');
        ConfigMidtrans::$isProduction = config('midtrans.isProduction');
        ConfigMidtrans::$isSanitized = config('midtrans.isSanitized');
        ConfigMidtrans::$is3ds = config('midtrans.is3ds');

        // buat instance midtrans notification / helper untuk mengambil notifikasi dari midtrans
        $notif = new \Midtrans\Notification();

        // pecah order id agar bisa diterima oleh database
        $order = explode('-', $notif->order_id); 

        // assign variable untuk memudahkan coding
        $status = $notif->transaction_status;
        $type = $notif->payment_type;
        $fraud = $notif->fraud_status;
        $order_id = $order[1];
        
        // cari transaksi berdasarkan ID
        $transaction =  Order::findOrFail($order_id);

        // error_log("Order ID $notif->order_id: "."transaction status = $status, fraud staus = $fraud");
        
        // handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card'){   
                if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $transaction->payment_status = 'CHALLENGE';
                } else {
                    $transaction->payment_status = 'SUCCESS';
                }
            }
        }
            else if ($status == 'settlement') {
                $transaction->payment_status = 'SUCCESS';
            }
            else if ($status == 'pending') {
                $transaction->payment_status = 'PENDING';
            }
            else if ($status == 'deny') {
                $transaction->payment_status = 'FAILED';
            }
            else if ($status == 'expire') {
                $transaction->payment_status = 'EXPIRED';
            }
            else if ($status == 'cancel') {
                $transaction->payment_status = 'FAILED';
            }

            // simpan transaksi
            $transaction->save();
        }
           
        

    public function finishRedirect(Request $request)
    {
        $categories = Category::get();
        return view('frontend.success', compact('categories'));
    }

    public function unfinishRedirect(Request $request)
    {
        $categories = Category::get();
        return view('frontend.unfinish', compact('categories'));
    }

    public function errorRedirect(Request $request)
    {
        $categories = Category::get();
        return view('frontend.failed', compact('categories'));
    }
}
