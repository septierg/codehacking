<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use MongoDB\Driver\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$users = User::all();
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //pulling out data from the DB to use it in a list

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
          //

        if(trim($request->password)== ''){
            $input =$request->except('password');
        }
        else{
            $input=$request->all();
            $input['password'] = bcrypt($request->password);
        }


          //creating data from request directly in the DB if its a picture
          if($file = $request->file('file')){

              //get the name of the photo and add the time to it
              $name = time().$file->getClientOriginalName();

              //move it to images folder if not create one
              $file->move('images', $name);

              //create a photo in the photo model
              $photo= Photo::create(['file' =>$name]);


              $input['file'] = $photo->file;
              //User::create($input);
              //dd($photo);
          }
          //if not create a request with out file
            // and encrypted it

            User::create($input);
            //dd($input);
            return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user= User::findOrFail($id);
        $role= Role::lists('name', 'id')->all();
        //dd($user);
        return view('admin.users.edit', compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //finding the user
      $user= User::findOrFail($id);
        if ($request->hasFile('file')) {
            //
            $input= $request->all();
            $file= $input['file'];

            $name= time().$file->getClientOriginalName();

            $file->move('images', $name);
            //return $name;
            //create a photo in the photo model
            $photo= Photo::create(['file' =>$name]);
            $input['file'] = $photo->file;
            $input['password'] = bcrypt($request->password);
            $user->update($input);
        }
            //
             //$input= $request->all();

            return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $user= User::findOrFail($id);
         unlink(public_path().$user->file);
         $user->delete();

        \Illuminate\Support\Facades\Session::flash('deleted_user','The user has been deleted');
         return redirect('/admin/users');

    }
}
