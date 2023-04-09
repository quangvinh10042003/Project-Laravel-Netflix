<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Timeline;
use App\Models\release_date;
use App\Models\Ticket;
use App\Models\Order;
use App\Models\PasswordReset;
use App\Helper\Cart;
use App\Mail\VerifyOrder;
use Mail;
class CartController extends Controller
{
    public function delete($id, Cart $cart)
    {
        $cart->delete($id);
        return redirect()->back()->with('yes','Bạn đã xóa vé thành công');
    }

    public function clear(Cart $cart)
    {
       $cart->clear();
       return redirect()->back()->with('yes','Bạn đã xóa hết hộp vé');
    }
    public function checkout(){

        return view('checkout');
    }
    public function order_checkout(){
        $form_data = request()->only('name','email','phone','cardNumber','cvv','order_note','film_id','timeline_id','quantity','chair');
        $form_data['account_id'] = auth('acc')->id();
        $token = \Str::random(50);
        $form_data['token'] = $token;
        $order = Order::create($form_data);
        // try {
           
            Mail::to(request('email'))->send(new VerifyOrder($order,$token));
            return redirect()->route('home.verify')->with('yes','Hãy vào email để xác nhận đơn hàng.');
        // } catch (\Throwable $th) {
        //     Order::where('id',$order->id)->delete();
        //     return redirect()->back()->with('no', 'Thanh toán ko thành công');
        // }
    }
    public function verifyOrder($token, Cart $cart){
        $order =  Order::where('token', $token)->firstOrFail();
        $order->update(['token' => null, 'status' => 1]);
        PasswordReset::where('token', $token)->delete();
        $arrNumber = explode(' - ', $order->chair);
        foreach($arrNumber as $key => $value){
            $tick = Ticket::isTicketQueryByPrimaryKey($order->film_id,$order->timeline_id,$value)->update(['status'=> 0]);
        }
        $dataCart = [];
        $dataCart['name'] = $order->film->name;
        $dataCart['timeline'] = $order->timeline->timeline;
        $dataCart['image'] = $order->film->image;
        $dataCart['number'] = $order->chair;
        $dataCart['time'] = date("d/m/Y H:i");
        $cart->create($dataCart);
        $idDate = $order->timeline->release_dates->id;
        return redirect()->route('home.ticket',
        [
            'idFilm' => $order->film_id,
            'idDate' => $idDate,
            'idTimeline' => $order->timeline_id,
            'slug'=> \Str::slug($order->film->name),
            'slugDate' => \Str::slug($order->timeline->release_dates->release_date)
        ])->with('yes','Bạn đã mua vé xem phim thành công');
    }
}

// xử lí ticket 

// $data = [];
//         $tick = [];
//         $dataCart['number'] = '';
//         $arrNumber = json_decode($formData['arr']);
//         foreach($arrNumber as $key => $value){
//             $data['film_id'] = $formData['film_id'];
//             $data['timeline_id'] = $formData['timeline_id'];
//             if(count($arrNumber) - $key == 1){
//                 $dataCart['number'] .= " $value ";
//             }else{
//                 $dataCart['number'] .= " $value - ";
//             }
                
//             $tick = Ticket::isTicketQueryByPrimaryKey($data['film_id'],$data['timeline_id'],$value)->first();
//             Ticket::isTicketQueryByPrimaryKey($data['film_id'],$data['timeline_id'],$value)->update(['status'=> 0]);
//         }
        
//        