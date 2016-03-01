<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use App\Profile;
use App\User;

class ProfileController extends Controller
{

    public function index(){  
        $profile = Profile::findOrFail(Auth::user()->id);
        return view('profile.view', compact('profile'));
    }
    
    public function show($id){  
        $profile = Profile::findOrFail($id);
        return view('profile.view', compact('profile'));
    }

    public function create(){
        return view('profile.create');
    }

    public function store(){
        $profile = new Profile;
        $profile->fill(Input::all());
        $profile->save();
        return redirect('/profile/' . $profile->id);
    }
    
    public function edit($id){
        $profile = Profile::findOrFail($id);
        return view('profile.edit',compact('profile'));
    }

    public function update($id){
        $profile = Profile::findOrFail($id);
        $profile->fill(Input::all());
        $profile->save();
        return redirect('/profile/' . $id);
    }
    
    public function SearchProfile(){
        
            $data = Input::all();
            
            $profiles = Profile::where('name', 'LIKE' , '%' . $data['query'] . '%')->orderBy('name', 'desc')->take(10)->get(array('id','name', 'created_at'));
            
            return response()->json($profiles);
            
        
    }
}
