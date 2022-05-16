<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function viewCart(Request $request){
        return view('cart',[
            'carts' => $request->session()->get('carts')
        ]);
    }

    public function deleteCart(Request $request, EBook $ebook){
        $carts = $request->session()->get('carts');
        $i = 0;
        foreach ($carts as $cart) {
            if ($cart->id === $ebook->id) {
                unset($carts[$i]);
                $carts = array_values($carts);
            }
            $i++;
        }

        $request->session()->put('carts', $carts);
        return redirect('/view/cart');
    }

    public function addToCart(Request $request, EBook $ebook){

        $carts = $request->session()->get('carts');

        if (!$carts) {
            $carts=[];
        }
       
        array_push($carts, $ebook);

        $request->session()->put('carts', $carts);

        return redirect('/view/cart');
    }

    public function rent(Request $request){

        $carts = $request->session()->get('carts');

        foreach($carts as $ebook){
            $data = [
                'account_id' => Auth::user()->id,
                'ebook_id' => $ebook->id,
                'order_date' => Carbon::now()->toDateTimeString()
            ];

            Order::create($data);
        }

        $request->session()->forget('carts');

        return redirect('/success');
    }
}
