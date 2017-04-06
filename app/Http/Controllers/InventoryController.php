<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class InventoryController extends Controller
{
    /**
     * InventoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->inventory->products()->withPivot('amount')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create', ['products' => Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inventory = Auth::user()->inventory;
        $product = Product::find(Input::get('product'));

        $inventory->products()->save($product, ['amount' => Input::get('amount')]);

        return redirect('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $productId
     * @return int
     */
    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);
        $inventory = Auth::user()->inventory;
        $currentAmount = $inventory->products()->where('product_id', $productId)->first()->pivot->amount;

        if ($request->get('method') == "subtract" &&     $currentAmount - 1 == 0) {
            $inventory->products()->detach($product);
            return Response::HTTP_NO_CONTENT;
        }

        if ($request->get('method') == "subtract") {
            $currentAmount -= 1;
        } else {
            $currentAmount += 1;
        }


        $inventory->products()->updateExistingPivot($productId, ['amount' => $currentAmount]);
        return Response::HTTP_ACCEPTED;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
