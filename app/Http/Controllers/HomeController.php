<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(){
        $search = request('search');
  
        if($search){
           $events = Event::where([
             ['title','like','%'.$search.'%'] 
           ])->get();
         
  
        }else{
  
           $events = Event::all();
           
        }
       
        return view('welcome', compact('events','search') );
     }
     
}
