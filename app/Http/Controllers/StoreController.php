<?php

namespace codecommerce\Http\Controllers;

use Illuminate\Http\Request;

use codecommerce\Http\Requests;
use codecommerce\Http\Controllers\Controller;

use codecommerce\Category;
use codecommerce\Product;

class StoreController extends Controller
{

  public function index()
  {

    $pfeatured = Product::featured()->get();
    $precommended = Product::recommended()->get();
    $categories = Category::all();
    return view('store.index', compact('categories','pfeatured', 'precommended'));
  }

  public function category($id)
  {
    $categories = Category::all();
    $category = Category::find($id);
    $products = Product::ofcategory($id)->get();

    return view('store.category', compact('categories','products','category'));
  }

  public function product($id)
  {
    $categories = Category::all();
    $product = Product::find($id);

    return view('store.product', compact('categories', 'product'));
  }

}
