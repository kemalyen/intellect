<?php

namespace App\Http\Controllers\Portal;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB; 
use App\Jobs\ProcessOrder;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('portal.orders.index');
    }

    public function view(Order $order)
    {
        $status = OrderStatus::all();
        $allowed_status = $status->whereNotIn('slug', ['CANCELED', 'APPROVED'])->pluck('id')->toArray();

        $orderlines = $order->order_lines()->orderBy('created_at', 'DESC')->get();

        return view('portal.orders.view', compact('order', 'orderlines','allowed_status'));
    } 

    public function data()
    {
        $user = Auth::user();
        $orders = DB::table('order_headers')
            ->join('users', 'order_headers.user_id', '=', 'users.id')
            ->join('order_status', 'order_headers.status', '=', 'order_status.id')
            ->where('order_headers.user_id', $user->id)
            //select columns for new virtual table. ID columns must be renamed, because they have the same title
            ->select(['users.name as user_name', 'order_headers.id', 'order_headers.order_date', 'order_status.name as status_name']);

        return datatables()->of($orders)->toJson();

    }
}