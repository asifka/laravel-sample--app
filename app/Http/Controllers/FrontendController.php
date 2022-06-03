<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class FrontendController extends Controller
{
    public function homePage(){
        // if(auth()->check()){ 
        // }
        $name ="Asif";
        $age ="35";
    //     $users = User::all();
    //     $user = User::find(43);
    //     $user = User::where('user_id','=', 56)->first();
    //    // return $user->name;
    //     $users = User::whereIn('user_id',[25,73])->get();
        //return $users;
       // return $user->date_of_birth->format('d-M-Y'); // carbon date object
        // $users = User::active()->get();
        // $users = User::active()->count();
        // $users = User::active()->orderBy('name','ASC')->get();
        // $users = User::active()->latest()->get();
        // $users = User::active()->oldest()->get();
        //$users = User::active()->limit(10)->skip(5)->get();

        // $users = User::withTrashed()->active()->latest()->limit(10)->get();
       //  $users = User::withTrashed()->active()->latest()->paginate(10);
        //return $users;
        Log::Info("Query executed");
        session()->put('user_name','aka');
        session()->flash('today', date('d-M-Y'));
        if(cache()->has('users')){
            $users = cache()->get('users');
        }else{
            $users = User::withTrashed()->active()->latest()->paginate(10);//withCount('orders')->
            cache()->put('users',$users);
        }
       
        return view('welcome', compact('name','age','users'));
    }
    
    public function aboutUs(){
      //  return session()->get('user_name');
       //return route('about');
       return view('about_us'); 
    }

    public function contactUs(){
        return view('contact_us'); 
     }

     public function create(){
         //session()->forget('user_name');
         //session()->flush();
         return view('users.create');
     }

     public function save(){ 
       // $valid = validator()->make(request()->all(),['name'=>'required|min:10|max:15','email' => 'required']);
        //return $valid->fails();
        request()->validate(['name'=>'required|min:10|max:15','email' => 'required']);
        $name = request('name');
        $email = request('email'); 
        $dob = request('date_of_birth'); 
        $status = request('status'); 
        //return $dob;
       $user = User::create([
            'name' => $name,
            'email' => $email,
            'date_of_birth' => $dob,
            'status' => $status
        ]);

        User::firstOrCreate([
            'email' => request('email'),
        ],[
            'name' => request('name'),
            'date_of_birth' => request('date_of_birth'),
            'status' => request('status'),

        ]);

        User::updateOrCreate([
            'email' => request('email'),
        ],[
            'name' => request('name'),
            'date_of_birth' => request('date_of_birth'),
            'status' => request('status'),

        ]);
        
       // return $user->user_id;
        // $user = new User;
        // $user->name = $name;
        // $user->email = $email;
        // $user->date_of_birth = $dob;
        // $user->status = $status;
        // $user->save();

       // return "1 row inserted";
      

       Mail::to('asifkmuhammed@gmail.com')
            ->cc('chakru45678@gmail.com')
            ->bcc('puspan105@gmail.com')
            ->send(new UserCreatedMail($user));
      
        cache()->forget('users');
        
       return redirect()->route('home')
                ->with('message', 'User Created Successfully !!!');
    }

    public function edit($userId){
       $user = User::find(decrypt($userId));
        return view('users.edit',compact('user'));
    }

    public function view($userId){
        $user = User::find(decrypt($userId));
       // $user = User::has('address')->find(decrypt($userId));
        return view('users.view',compact('user'));
        // $address = UserAddress::find(1);
        // return view('users.view',compact('address'));


    }

    public function update(){

        // return request()->all();
        // return request()->except('_token','status');
        // return request()->only('name','email')

        $user = User::find(decrypt(request('user_id')));
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'date_of_birth' => request('date_of_birth'),
            'status' => request('status')
        ]);

        return redirect()->route('home')
                ->with('message','User updated Successfully !!');

    }

    public function delete($userId){

        $user= User::find(decrypt($userId))->delete();
        //User::destroy($userId);
        //User::truncate();
        return redirect()->route('home')
                ->with('message','User deleted Successfully !!');

    }

    public function forceDelete($userId){

        $user= User::withTrashed()->find(decrypt($userId))->forceDelete();
        return redirect()->route('home')
                ->with('message','User force deleted Successfully !!');

    }

    public function activate($userId){

        $user= User::withTrashed()->find(decrypt($userId))->restore();
        return redirect()->route('home')
                ->with('message','User Activated Successfully !!');

    }
}
