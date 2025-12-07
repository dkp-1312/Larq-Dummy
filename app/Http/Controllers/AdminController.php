<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() 
    {
        return view('admin.index');
    }


    public function crud_panel() 
    {
        $user=User::where('usertype','user')->paginate(5);
        return view('admin.crud',compact('user'));
    }
    public function add_user(Request $request)
    {
        $data=new User;
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->password=$request->password;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->save();
        toastr()->closeButton()->info('User Added Successfully.');
        return redirect()->back();
    }
    public function delete_user($id)
    {
        $data=User::find($id);
        $data->delete();
        toastr()->closeButton()->error('User Deleted Successfully.');
        return redirect()->back();
    }
    public function edit_user($id)
    {
        $data=User::find($id);
        return view('admin.edit_user',compact('data'));
    }
    public function update_user(Request $request,$id)
    {
        $data=User::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->save();
        toastr()->closeButton()->success('User Updated Successfully.');
        return redirect('crud_panel');
    }



    public function category() 
    {
        $cate=Category::all();
        return view('admin.category',compact('cate'));
    }
    public function add_category(Request $request) 
    {
        $cat=new Category;
        $cat->category=$request->category;
        // $result=$sql("select category from Categories");
        $result=DB::table('categories')->where('category', $cat->category)->value('category');
        if($result!="")
        {
            toastr()->closeButton()->error('Category must be Unique.');
            return redirect()->back();
        }
        if($cat->category=="")
        {
            toastr()->closeButton()->warning('Category must not be Empty.');
            return redirect()->back();
        }
        $cat->save();
        toastr()->closeButton()->success('Category Added Successfully.');
        return redirect()->back();
    }
    public function delete_category($id) 
    {
        $data=Category::find($id);
        $data->delete();
        toastr()->closeButton()->success('Category Deleted Successfully.');
        return redirect()->back();
    }
    public function edit_category($id) 
    {
        $data=Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id) 
    {
        $data=Category::find($id);
        $data->category=$request->category;
        $data->save();
        toastr()->closeButton()->success('Category Updated Successfully.');
        return redirect('category');
    }

    
    public function add_product() 
    {
        $category=Category::all();
        return view('admin.add_product',compact('category'));
    }
    public function view_product() 
    {
        $product=Product::paginate(2);
        return view('admin.view_product',compact('product'));
    }
    public function upload_product(Request $request) 
    {
        $data=new Product;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->qty;
        $data->category=$request->category;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('photo/product',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        toastr()->closeButton()->success('Product Added Successfully.');
        return redirect()->back();
    }
    public function delete_product($id) 
    {
        $data=Product::find($id);
        $image_path=public_path('photo/product/'.$data->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $data->delete();
        toastr()->closeButton()->success('Product Deleted Successfully.');
        return redirect()->back();
    }
    public function update_product($id) 
    {
        $data=Product::find($id);
        $category=Category::all();
        return view('admin.update_product',compact('data','category'));
    }
    public function edit_product(Request $request,$id) 
    {
        $data=Product::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->qty;
        $data->category=$request->category;
        
        $image=$request->image;
        if($image)
        {
            $image_path=public_path('photo/product/'.$data->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('photo/product',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        toastr()->closeButton()->success('Product Updated Successfully.');
        return redirect('view_product');
    }
    public function product_search(Request $request) 
    {
        $search=$request->search;
        $product=Product::where('title','LIKE','%'.$search.'%')
        ->orWhere('category','LIKE','%'.$search.'%')
        ->paginate(3);
        return view('admin.view_product',compact('product'));    
    }

    public function view_order()
    {
        $data=Order::all();
        return view('admin.order',compact('data'));
    }
    public function on_the_way($id)
    {
        $data=Order::find($id);
        $data->status='On The Way';
        $data->save();
        toastr()->closeButton()->success('Status Updated Successfully.');
        return redirect()->back();
    }
    public function delivered($id)
    {
        $data=Order::find($id);
        $data->status='Delivered';
        $data->save();
        toastr()->closeButton()->success('Status Updated Successfully.');
        return redirect()->back();
    }
    public function print_pdf($id)
    {
        $data=Order::find($id);
        $data->status='Delivered';
        $data->save();
        toastr()->closeButton()->success('Status Updated Successfully.');
        return redirect()->back();
    }
}