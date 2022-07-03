<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentController extends Controller
{
   
     public function receive()
    {
        $callback = new CallbackService;
 
        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();            
             
            if ($callback->isSuccess()) {
                if($notification->transaction_status == 'pending')
                {
                    Order::where('mid', $order->mid)->update([
                        'payment_status' => 2,
                    ]);                
                }
                else if($notification->transaction_status == 'settlement')
                {
                    Order::where('mid', $order->mid)->update([
                        'payment_status' => 3,
                    ]);                
                }
            }

            
            if ($callback->isExpire()) {
                Order::where('id', $order->id)->update([
                    'payment_status' => 3,
                ]);
                dd($order);
            }
 
            if ($callback->isCancelled()) {
                Order::where('id', $order->id)->update([
                    'payment_status' => 4,
                ]);
                dd($order);
            }
 
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
    
}
