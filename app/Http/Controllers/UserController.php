<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('register',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100',
            'father_name'=>'|string|max:100',
            'email'=>'required|string|unique:users',
            'phone'=>'required|string|unique:users',
            'gender'=>'string|max:20',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',

        ]);
        if($request->file('image')){
            $image=$request->file('image');
            $extension=$image->getClientOriginalExtension();
            $filename= uniqid() .'.'. $extension;
            $image->move('public/images',$filename);
        
        }
        
        // $user= new \App\Models\User();
        // // dd($user);
        // $user->image=$filename;
        // $user->name=$request->name;
        // $user->father_name=$request->father_name;
        // $user->email->$request->email;
        // $user->phone->$request->image;
        // dd($user->save());
        $data['image'] = $filename;
        $data['name'] = $request->name;
        $data['father_name'] = $request->father_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['gender'] = 'female';
        User::create($data);
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
        // dd($request->all(),$id);
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            'father_name'=>'required',
            'phone'=>'required|unique:users,phone,'.$id,
             'gender'=>'required',
        ]);
        $users=User::find($id);
        if($request->has('image')){
            $image=$request->file('image');
            $extension=$image->getClientOriginalExtension();
            $filename= uniqid() .'.'. $extension;
            $image->move('public/images',$filename);
            $users['image'] = $filename;
        }

        
        
       
        // dd($users);
        $users['name']= $request->name;
        $users['email'] = $request->email;
        $users['father_name']= $request->father_name;
        $users['gender']= $request->gender;
        $users['phone']=$request->phone;
        $users->save();

return redirect('crud');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)

    {
        $data=user::find($id);
        return view('update' , ['data'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=User::find($id);
        $data->delete();
        return back();

    }
}
