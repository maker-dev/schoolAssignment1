<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {

        $orders =
            Client::select('clients.NomCli', 'orders.DateOrd', 'order__details.OrderQuantity', 'products.NomPro', "orders.NumOrd", "products.CodePro")
            ->join('orders', 'clients.CodeCli', '=', 'orders.client_code')
            ->join('order__details', 'order__details.order_num', '=', 'orders.NumOrd')
            ->join('products', 'products.CodePro', '=', 'order__details.product_code')
            ->orderBy('orders.DateOrd', "desc")
            ->paginate(10);

        return view("order.index", compact("orders"));
    }

    public function addOrder()
    {
        $products = Product::all();
        return view("order.create", compact("products"));
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            "ClientCode" => "bail|required|min:8|max:8|exists:clients,CodeCli",
            "ProductCode" => "bail|required",
            "ProductQuantity" => "bail|required|integer"
        ]);
        $product = Product::find($request->ProductCode);
        $randomId = fake()->unique()->regexify("[A-Z0-9]{8}");
        while (Order::where('NumOrd', $randomId)->count() > 0) {
            $randomId = fake()->unique()->regexify("[A-Z0-9]{8}");
        }
        $order = Order::create([
            "NumOrd" => $randomId,
            "DateOrd" => now(),
            "client_code" => $request->ClientCode
        ]);

        $product->orders()->attach($order, ["OrderQuantity" => $request->ProductQuantity]);

        return redirect()->route("order.index");
    }

    public function modifyOrder($id)
    {
        $products = Product::all();
        $order    = Order::find($id);
        $client   = $order->client;
        $productOrder  = $order->products;

        return view("order.modify", compact("products", "client", "productOrder"));
    }

    public function updateOrder(String $id, Request $request)
    {
        $request->validate([
            "ProductCode" => "bail|required",
            "ProductQuantity" => "bail|required|integer"
        ]);
        Order::find($id)->update([
            "DateOrd" => now()
        ]);
        $order   = Order::find($id);
        $order->products()->wherePivote("product_code", "=", $request->ProductCode)->detach();
        $order->products()->attach($request->ProductCode, ['OrderQuantity' => $request->ProductQuantity]);
        return redirect()->route("order.index");
    }

    public function destroyOrder(Request $request)
    {
        $order = Order::find($request->numord);
        $order->products()->wherePivote("product_code", "=", $request->numpro)->detach();
        return redirect()->route("order.index");
    }
}
