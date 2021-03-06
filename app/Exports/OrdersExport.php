<?php

namespace App\Exports;

use Corvus\Core\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class OrdersExport implements FromQuery
{
    use Exportable;

    public function __construct($account_id, $processed_date, $order_date)
    {
        $this->account_id = $account_id;
        $this->processed_date = $processed_date;
        $this->order_date = $order_date;
    }

    public function query()
    {
        $account_id = $this->account_id;
        $processed_date = $this->processed_date;
        $order_date = $this->order_date;

        $q = Order::query()
            ->join('users', 'order_headers.user_id', '=', 'users.id')
            ->join('order_status', 'order_headers.status', '=', 'order_status.id')
            ->select(
                'users.name as user_name',
                'order_headers.id',
                'order_headers.processed_date',
                'order_headers.order_date',

                'order_status.name as status_name'
                )
            ->where(function ($query) use ($account_id) {
                if ($account_id > 0){
                    $query->where('user_id', $account_id);
                }
            })
            ->where(function ($query) use ($processed_date) {
                if ($processed_date){
                    $query->whereDate('processed_date', $processed_date);
                }
            })
            ->where(function ($query) use ($order_date) {
                if ($order_date){
                    $query->whereDate('order_date', $order_date);
                }
            });

        return $q;
    }
}
