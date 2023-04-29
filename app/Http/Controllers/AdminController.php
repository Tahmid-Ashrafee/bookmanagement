<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;



class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();
    	return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
    	$data=new category;
    	$data->category_name=$request->category;
    	$data->save();
    	return redirect()->back()->with('message','Category Added Successfully');

    }

    public function delete_category($ID)
    {
        $data=category::where('ID',$ID)->delete();

        

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $category=category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->Description;
        $product->price=$request->Price;
        $product->quantity=$request->Quantity;
        $product->discount_price=$request->Discount_Price;
        $product->category=$request->Category;
      


        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
  
    }

    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }

    public function search_product()
    {
        $product=product::all();
        return view('admin.search_product',compact('product'));
    }
    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();

        

        return redirect()->back()->with('message','Product Deleted Successfully');
    }
    public function update_product($id)
    {
        $product=product::find($id);
        $category=category::all();

        return view('admin.update_product',compact('product', 'category'));

    }  

    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->Description;
        $product->category=$request->Category;
        $product->price=$request->Price;
        $product->discount_price=$request->Discount;
        $product->quantity=$request->Quantity;
        
        $image=$request->image;
        if($image){
        
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);

        $product->image=$imagename;

        }

        $product->save();
        return redirect()->back()->with('message','Product Updated Successfully');

    }   

    public function search(){

        $product=product::all();
        return view('admin.search',compact('search'));



    } 
    public function delete_order($id)
    {
        $order=order::find($id);
        $order->delete();

        

        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status="Delivered";
        $order->payment_status="Paid";
        $order->save();

        

        return redirect()->back();
    }
    public function show_user()
    {
        $user=user::all();
        // return view('admin.show_product');
        return view('admin.userlist',compact('user'));
    }

    public function show_admin()
    {
        $user=user::all();
        // return view('admin.show_product');
        return view('admin.adminlist',compact('user'));
    }

    
    

    

    
    

    public function product_search(Request $request)
    { 
      
      $search_text=$request->search;
      $product=product::where('title','LIKE',$search_text.'%')->orWhere('category','LIKE',"$search_text")->paginate(10);

        return view('admin.search_product', compact('product'));





        
    }
        

        



    





}

