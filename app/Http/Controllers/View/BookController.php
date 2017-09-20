<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Pdt_content;
use App\Entity\Pdt_images;

class BookController extends Controller
{
  public function toCategory($value='')
  {
  	$categorys = Category::whereNull('parent_id')->get();
    return view('category')->with('categorys',$categorys);
  }

  public function toProduct($category_id)
  {
  	$products = Product::where('category_id',$category_id)->get();
    return view('product')->with('products',$products);
  }

  public function toPdtContent($product_id)
  {
  	$product = Product::find($product_id);
  	$pdt_content = Pdt_content::where('product_id',$product_id)->first();
  	$pdt_images = Pdt_images::where('product_id',$product_id)->get();
  	return view('pdt_content')->with('product',$product)
  							  ->with('pdt_images',$pdt_images)
  							  ->with('pdt_content',$pdt_content);
  }

}