<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Entity\Category;

class CategoryController extends Controller
{
  public function toCategory()
  {
    $categories = Category::all();
    foreach ($categories as $category) {
      if($category->parent_id != "" && $category->parent_id != null){
        $category->parent = Category::find($category->parent_id);
      }
    }
    return view('admin.category')->with('categories',$categories);
  }
  
}
