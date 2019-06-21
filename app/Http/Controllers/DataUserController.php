<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\DataUser;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datauser = datauser::orderBy('created_at', 'desc')->paginate(10);
        return view('datauser.index')->with('datauser', $datauser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datauser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'notelp' => 'required',
            'gender' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noImage.jpg';
        }
        
        $datauser = new DataUser;
        $datauser->name = $request->input('name');
        $datauser->email = $request->input('email');
        $datauser->dob = $request->input('dob');
        $datauser->notelp = $request->input('notelp');
        $datauser->gender = $request->input('gender');
        $datauser->user_id = auth()->user()->id;
        $datauser->cover_image = $fileNameToStore;
        $datauser->save();

        return redirect('/datauser')->with('success','Terima Kasih Telah Mengisi Form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datauser = datauser::find($id);
        return view('datauser.show')->with('datauser', $datauser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datauser = datauser::find($id);
        return view('datauser.edit')->with('datauser', $datauser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'notelp' => 'required',
            'gender' => 'required',
        ]);
        
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $datauser = DataUser::find($id);
        $datauser->name = $request->input('name');
        $datauser->email = $request->input('email');
        $datauser->dob = $request->input('dob');
        $datauser->notelp = $request->input('notelp');
        $datauser->gender = $request->input('gender');
        if($request->hasFile('cover_image')){
            $datauser->cover_image =  $fileNameToStore;
        }

        $datauser->save();
        return redirect('/datauser')->with('success','Form Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datauser = DataUser::find($id);

        if(auth()->user()->id !==$datauser->user_id){
            return redirect('/datauser')->with('error','Unauthorized Page');
        }

        if($datauser->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$datauser->cover_image);
        }

        $datauser->delete();
        return redirect('/datauser')->with('success','Form Deleted');
    }
}
