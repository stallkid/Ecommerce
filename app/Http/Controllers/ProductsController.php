<?php

namespace codecommerce\Http\Controllers;

use Illuminate\Http\Request;

use codecommerce\ProductImage;
use codecommerce\Category;
use codecommerce\Product;
use codecommerce\Http\Requests;
use codecommerce\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
  private $productsModel;

  public function __construct(Product $productsModel)
  {
    $this->middleware('auth');
    $this->productsModel = $productsModel;
  }
    public function index()
    {
      $products = $this->productsModel->paginate(10);

      return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Category $category)
     {

       $categories = $category->lists('name', 'id');

       return view('products.create', compact('categories'));
     }

     public function store(Requests\ProductsRequest $request)
     {
       $input = $request->all();

       $products = $this->productsModel->fill($input);

       $products->save();

       return redirect()->route('products');
     }

     public function update(Requests\ProductsRequest $request, $id)
     {
       $this->productsModel->find($id)->update($request->all());

       return redirect()->route('products');
     }

     public function edit($id, Category $category)
     {
       $categories = $category->lists('name', 'id');

       $products = $this->productsModel->find($id);

       return view('products.edit', compact('products', 'categories'));
     }

     public function destroy($id)
     {
       $this->productsModel->find($id)->delete();

       return redirect()->route('products');
     }

     public function images($id)
     {

       $products = $this->productsModel->find($id);

       return view('products.images', compact('products'));
     }

     public function CreateImage($id)
     {
       $product = $this->productsModel->find($id);

       return view('products.create_image', compact('product'));
     }

     public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
     {
       $file = $request->file('image');

       $extension = $file->getClientOriginalExtension();

       $image = $productImage::create(['product_id'=>$id,'extension'=>$extension]);

       Storage::disk('public_local')->put($image->id.'.'.$extension, file::get($file));

       return redirect()->route('products.images',['id'=>$id]);
     }

     public function destroyImage(ProductImage $productImage, $id)
     {
       $image = $productImage->find($id);

       if(file_exists(public_path() . '/uploads'.$image->id.'.'.$image->extension))
       {
        Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
       }

       $product = $image->product;
       $image->delete();

       return redirect()->route('products.images',['id'=>$id]);
     }

}
