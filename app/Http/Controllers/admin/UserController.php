<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users()
    {
        $users = User::where('usertype', 0)->latest()->paginate(20);
        return view('admin.user.users',compact('users'));
    }
    
    public function admins()
    {
        $admins = User::where('usertype', 1)->latest()->paginate(20);
        return view('admin.user.admin',compact('admins'));
    }

    // status admin_create 
    public function admin_create($id)
    {
        $user=User::find($id);
        $user->usertype= "1";
        $user->update();
        return Redirect()->back()->with('success', 'Admin Updated');
    }


    // status user_create 
    public function user_create($id) 
    {
        $user = User::find($id);
        $user->usertype = "0";
        $user->update();
        return Redirect()->back()->with('success', 'User Updated');
    }

    //delete
   public function Delete($id){
    User::findOrFail($id)->delete();
       return Redirect()->back()->with('delete','User Deleted');
   }

     // ======================== edit ===================
     public function edit($id){
        //if findORFail use, do not show error
        $usertype = User::findOrFail($id);
        return view('admin.user.edit',compact('usertype'));
    }

       // ======================== update data =========================== 
       public function update(Request $request,$id){

        $usertype = User::findOrFail($id);
        $usertype->usertype=$request->usertype;
       
        $usertype->update();
        return Redirect('users')->with('success','User Update Successfully');
    }
    

   //searching users_search
   public function users_search(Request $request)
   {
       $users = User::where('usertype', 0)
       ->where('name','like','%'.$request->search.'%')
       ->orWhere('email','like','%'.$request->search.'%')
       ->orWhere('phone','like','%'.$request->search.'%')
       ->orWhere('address','like','%'.$request->search.'%')
       ->paginate(20);
       return view('admin.user.users',compact('users'));
   }

    //searching admins_search
    public function admins_search(Request $request)
    {
        $admins = User::where('usertype', 1)
        ->where('name','like','%'.$request->search.'%')
        ->orWhere('email','like','%'.$request->search.'%')
        ->orWhere('phone','like','%'.$request->search.'%')
        ->orWhere('address','like','%'.$request->search.'%')
        ->paginate(20);
        return view('admin.user.admin',compact('admins'));
    }

    public function user_autocomplete_search_ajax()
    {
        $users = User::where('usertype', 0)->get();
        $data = [];

        foreach ($users as $item) {
            $data[] = $item['name'];
            $data[] = $item['phone'];
            $data[] = $item['email'];
            $data[] = $item['address'];
        }
        return $data;
    }

    public function admin_autocomplete_search_ajax()
    {
        $users = User::where('usertype', 1)->get();
        $data = [];

        foreach ($users as $item) {
            $data[] = $item['name'];
            $data[] = $item['phone'];
            $data[] = $item['email'];
            $data[] = $item['address'];
        }
        return $data;
    }
}

//where('user_id', Auth::id())->