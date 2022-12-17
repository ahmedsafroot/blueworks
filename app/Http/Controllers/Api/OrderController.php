<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Models\DeliveryOrder;
use App\Models\DineinOrder;
use App\Models\Item;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use GeneralTrait;
    //
    public function store(OrderRequest $request){
        if(empty($request->items) || !is_array($request->items) ||count($request->items)==0){
            return $this->returnErrorMessage('items should be array',422);
        }
        $order=Order::create([
           'type'=>$request->type
        ]);
        if($request->type==1){
            DineinOrder::create([
                'order_id'=>$order->id,
                'table_number'=>$request->table_number,
                'service_charger'=>$request->service_charger,
                'waiter_name'=>$request->waiter_name
            ]);
        }elseif ($request->type==2){
            DeliveryOrder::create([
                'order_id'=>$order->id,
                'delivery_fees'=>$request->delivery_fees,
                'customer_phone'=>$request->customer_phone,
                'customer_name'=>$request->customer_name
            ]);
        }
        foreach ($request->items as $item){
            ItemOrder::create([
                'order_id'=>$order->id,
                'item_id'=>$item['item_id'],
                'number_items'=>$item['number_items'],
                'item_price'=>Item::find($item['item_id'])->price,
            ]);
        }

        $order_details=Order::with('dineInOrder')->with('deliveryOrder')->with('items_orders')->find($order->id);
        return $this->returnData('order',$order_details,"created successfully",201);
    }
}
