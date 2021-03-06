<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;
use App\Http\Resources\Products;
use App\Http\Resources\Orders;
use Log;
use Corvus\Core\Models\Order;
use Corvus\Core\Models\OrderStatus;
use App\Jobs\ProcessOrder;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = \App::make('user');
        $orders = $user->orders()->paginate();

        return Orders::collection($orders);
    }

    public function show(Order $order)
    {
        $user = \App::make('user');

        if ($order->user_id <> $user->id){
            return response()->json(null, 404);
        }
        return new Orders(Order::with('order_lines')->find($order->id));
    }

    public function create(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;

        $orderlines = [];
        $lines = $request->get("products");
        $order = Order::create(['user_id' => $user->id, 'order_date' => Carbon::now(), 'status' => 1, 'ref_id' => $request->ref_id]);
        $order_id = $order->id;
        $_status = OrderStatus::where('slug', 'NEW_ORDER')->first();

        Log::debug('Order Id:'. $order_id);

        foreach($lines as $line){
            $orderlines[] = [
                'product_sku' => $line['sku'],
                'quantity' => $line['quantity'],
                'order_header_id' => $order_id,
                'status' => $_status->id,
                'created_at' => Carbon::now()
            ];
        }

        DB::table('order_lines')->insert($orderlines);
        ProcessOrder::dispatch($order);
        return response()->json(['order_id' => $order_id], 201);
    }
}
