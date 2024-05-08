<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        //   $todayDate = /* '2023-10-15';  */ Carbon::now();
        // $orders = Order::whereDate('created_at', $todayDate)->get();
        $todayDate = Carbon::now()->format('y-m-d');
        $orders = Order::when($request->date != NULL, function ($q) use ($request, $todayDate) {
            if ($request->date) {
                return $q->whereDate('created_at', $request->date);
            }

            //   $q->whereDate('created_at', $todayDate);
        })->when($request->status != NULL, function ($q) use ($request) {
            $q->where('status_message', $request->status);
        })
            ->paginate(10);
        /*     if ($orders) {
            dd($orders);
        } */
        return view('admin.orders.index', compact('orders'));
    }
    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            return view('admin.orders.show', compact('order'));
        } else {
            return redirect('admin/orders')->with('message', 'order id not found');
        }
    }
    public function UpdateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orderId)->with('message', 'order status updated');
        } else {
            return redirect('admin/orders/' . $orderId)->with('message', 'order id not found');
        }
    }
    public function viewOrderinvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.show', compact('order'));
    }
    function generateinvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.show', $data);
        $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('invoice-id=' . $orderId . '-' . $todayDate . 'pdf');
    }
    function mailInvoice(int $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);

            Mail::to('$order->email')->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/' . $orderId)->with('message', 'Invoice Mail has sended' . $order->email);
        } catch (\Exception $e) {
            return redirect('admin/orders/' . $orderId)->with('message', 'Invoice Mail cant send');
        }
    }
}
