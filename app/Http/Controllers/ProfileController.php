<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use App\Profile;

class ProfileController extends Controller
{
    private $profileId;
    
    public function __construct(){
        
        //Fetch authenticated users profileId
        $this->profileId = Auth::user()->id;
        
    }
    
    public function ViewProfile($profileId = null){
        
        //If profile is not set use the authenticated users profileId
        if(!$profileId){
            $profileId = $this->profileId;
        }
        
        //Fetch profile date
        $profile = Profile::find($profileId);
        
        //Aggregate data
        $data = ['profile' => $profile];
        
        //Render view with data
        return view('profile.view', $data);
        
    }
    
    public function SearchProfile(){
        
            $data = Input::all();
            
            $profiles = Profile::where('name', 'LIKE' , '%' . $data['query'] . '%')->get(array('id','name', 'created_at'));
            
            return response()->json($profiles);
            
        
    }
}
