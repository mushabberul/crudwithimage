<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdatRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::select(['id','name','email','number','photo'])->get();
        return view('pages.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileStoreRequest $request)
    {

        $profile = Profile::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'number'=>$request->number,
        ]);
        $this->singlePhoto($request,$profile->id);

        return redirect()->route('profile.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('pages.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdatRequest $request, $id)
    {
        $profile = Profile::find($id);
        $profile->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'number'=>$request->number,
        ]);
        $this->singlePhoto($request,$profile->id);

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        if('default.png' != $profile->photo){
            $photo_location = 'public/uploads/' . $profile->photo;
            unlink(base_path($photo_location));
        }
        $profile->delete();
        return back();
    }
    public function singlePhoto($request,$profile_id)
    {
        $profile = Profile::find($profile_id);
        
        if($request->file('photo')){
            if('default.png' != $profile->photo){
                $photo_location = 'public/uploads/' . $profile->photo;
                unlink(base_path($photo_location));
            }
        
        $uploaded_file = $request->file('photo');
        $photo_name = $profile_id . '.'. $uploaded_file->getClientOriginalExtension();
        $photo_location = 'public/uploads/' . $photo_name;

        Image::make($uploaded_file)->resize(600,600)->save(base_path($photo_location));
        $profile->update([
            'photo'=>$photo_name,
        ]);
        
      }  
    }
}
