<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;
use App\Cart;
use App\Order;
use Session;
use App\Category;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id) 
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);
    	// dd($request->session()->get('cart'));
    	return redirect()->route('product.index');
    }

    public function getReduceByOne($id) 
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');  
    }

      public function getRemoveItem($id) 
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');  
    }

    public function getCart()
    {
    	if (!Session::has('cart')) {
    		return view('shop.shoppping-cart', ['products' => null]);
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.shoppping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shoppping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);  
    }

    public function postCheckout(Request $request)
    {
        // dd($request);
        if (!Session::has('cart')) {
            return redirect()->route('shop.shopppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->country = $request->input('country');
        $order->zipcode = $request->input('zip-code');
        $order->address = $request->input('address');

        // $order->save();
        Auth::user()->orders()->save($order);


        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased Products!');
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

            $product = new Product;
            $product->title = $request->title;
            $product->description = $request->description;

            $product->category_id = $request->category;

            $product->imagePath = $request->imagePath;
            $product->price = $request->price;
            $product->save();

            // redirect
            \Session::flash('message', 'Successfully created product!');
            // return \Redirect::to('admin.index');
            return redirect()->action('AdminController@index');
    
    }

    public function edit($id)
    {
        // get the nerd
        $product = Product::find($id);
        $categories = Category::all();
        // show the edit form and pass the nerd
        return \View::make('product.edit', ['categories' => $categories, 'product' => $product]);
    }

    public function update(Request $request, $id)
    {
            $product = Product::find($id);
            $product->title = $request->title;
            $product->description = $request->description;

            $product->category_id = $request->category;

            $product->imagePath = $request->imagePath;
            $product->price = $request->price;
            $product->save();

            // redirect
            \Session::flash('message', 'Successfully updated nerd!');
            return redirect()->action('AdminController@index');
    }


    public function destroy($id)
    {
        // delete
        $product = Product::find($id);
        $product->delete();

        // redirect
        \Session::flash('message', 'Successfully deleted the nerd!');
        return redirect()->action('AdminController@index');
    }
}
