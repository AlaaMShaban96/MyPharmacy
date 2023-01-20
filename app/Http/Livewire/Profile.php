<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;

class Profile extends Component
{
    use WithFileUploads;
    // public $photo;
    public $user=['name','password','username','x','y'];
    protected $rules = [
        'user.name' => 'required',
        'user.password' => 'required|min:8',
        'user.username' => 'required',
    ];
    protected $messages = [
        'user.password.required' => 'يجب كتابة كلمة السر ', 
        'user.password.min' => 'يجب كتابة كلمة السر مكونة على الاقل من 8 حروف', 
        'user.username.required'=>'يجب كتابة اسم المستخدم',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    } 
    public function render()
    {
     
        // dd(auth()->user()->pharmacy->name);
        return view('livewire.profile');
    }
    public function mount()
    {
        // dd(auth()->user()->pharmacy);
        $this->user['name']=auth()->user()->pharmacy->name;
        $this->user['username']=auth()->user()->name;
        $this->user['x']=auth()->user()->pharmacy->x;
        $this->user['y']=auth()->user()->pharmacy->y;
    }
    public function save()
    {  
        // $this->validate([
        //     'photo' => 'image|max:3024', // 1MB Max
        // ]);
        auth()->user()->name=$this->user['username'];
        auth()->user()->pharmacy->name=$this->user['name'];
        auth()->user()->pharmacy->x=$this->user['x'];
        auth()->user()->pharmacy->y=$this->user['y'];
        auth()->user()->pharmacy->save();
        auth()->user()->save();
        $this->user['name']=auth()->user()->pharmacy->name;
        $this->user['username']=auth()->user()->name;
        $this->user['x']=auth()->user()->pharmacy->x;
        $this->user['y']=auth()->user()->pharmacy->y;
        // $this->photo->store('photos');
        Session::flash('message', 'تم التعديل بنجاح '); 
        Session::flash('alert-class', 'alert-success'); 
        
    }
}
