<?php

namespace codecommerce\Http\Controllers;

use Illuminate\Http\Request;

use codecommerce\Category;
use codecommerce\Http\Requests;
use codecommerce\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
      $this->categoryModel = $categoryModel;
    }
    public function index()
    {
      $categories = $this->categoryModel->all();

      return view('categories.index',compact('categories'));
    }

    public function create()
    {

      return view('categories.create');
    }

    public function store(Requests\CategoryRequest $request)
    {
      $input = $request->all();

      $category = $this->categoryModel->fill($input);

      $category->save();

      return redirect()->route('categories');
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
      $this->categoryModel->find($id)->update($request->all());

      return redirect()->route('categories');
    }

    public function edit($id)
    {
      $category = $this->categoryModel->find($id);

      return view('categories.edit', compact('category'));
    }

    public function destroy($id)
    {
      $this->categoryModel->find($id)->delete();

      return redirect()->route('categories');
    }
}
