<?php

namespace App\Http\Livewire\Dashboard\Pharmacy;

use App\Models\User;
use Livewire\Component;
use App\Models\Pharmacy;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use WithPagination , WithFileUploads;
  
    public bool $edit=false,$create=false,$submit=true;
    protected $paginationTheme = 'bootstrap';
    public Pharmacy $pharmacyRef ;
    public $pharmacy = ['name'=>"",'x'=>"",'y'=>"",'email'=>"",'phone'=>"",'password'=>"",'address'=>"",'photo'=>"",'id'=>''];
    protected $rules = [
        'pharmacy.name' => 'required|max:80',
        'pharmacy.x' => 'required|numeric',
        'pharmacy.y' => 'required|numeric',
        'pharmacy.email' => 'required|unique:users,email',
        'pharmacy.phone' => 'required|numeric',
        'pharmacy.address' => 'required|max:100',
        'pharmacy.photo' => 'image|max:1024',
        'pharmacy.password' => 'required|min:8',
    ];
    // public function updated($propertyName)
    // {
    //     if (
    //     isset($this->pharmacy['name'])&&
    //     isset($this->pharmacy['x']) &&
    //     isset($this->pharmacy['y']) &&
    //     isset($this->pharmacy['email']) &&
    //     isset($this->pharmacy['phone']) &&
    //     isset($this->pharmacy['password']) &&
    //     isset($this->pharmacy['address']) ) {
    //         $this->submit=true;
    //     }else {
    //         $this->submit=false;
    //     }
    //     if ($this->edit==true && $propertyName=='pharmacy.email') {

    //     }else{
    //         $this->validateOnly($propertyName);
    //     }
    // } 
    public function render()
    {
        $pharmacies=Pharmacy::paginate(10);
        // $this->clearInput();
        return view('livewire.dashboard.pharmacy.index',['pharmacies'=>$pharmacies]);
    }
    public function destroy(Pharmacy $pharmacy)
    {
        try {
            // dd($pharmacy,$pharmacy->user);

            // if (isset($pharmacy->user->image)) {
            //     unlink($pharmacy->user->image);
            // }
            User::find($pharmacy->user->id)->delete();
            $pharmacy->delete();

            Session::flash('done-message', ' تم الحذف بنجاح'); 
            Session::flash('alert-class', 'alert-success'); 

        } catch (\Throwable $th) {
           
            Session::flash('done-message', 'فشلة عملية الحذف'); 
            Session::flash('alert-class', 'alert-danger');
        }
       
    }
    public function create()
    {
        $this->create=true;
    }
    public function store()
    {
        $this->pharmacy=  $this->validate([
            'pharmacy.name' => 'required|max:80',
            'pharmacy.x' => 'required|numeric',
            'pharmacy.y' => 'required|numeric',
            'pharmacy.email' => 'required|unique:users,email',
            'pharmacy.phone' => 'required|numeric',
            'pharmacy.address' => 'required|max:100',
            'pharmacy.photo' => 'image|max:1024',
            'pharmacy.password' => 'required|min:8',
        ]);
        // dd($this->pharmacy);
         try {
            $this->pharmacy['pharmacy']['password']=Hash::make($this->pharmacy['pharmacy']['password']);
            if (isset($this->pharmacy['pharmacy']['photo'])) {
                $this->pharmacy['pharmacy']['image']=$this->uploadeImages( $this->pharmacy['pharmacy']['photo']);
            }
            // dd($this->pharmacy);
            $user=User::create($this->pharmacy['pharmacy']);
            $this->pharmacy['pharmacy']['user_id']=$user->id;
            $pharmacy=$user->pharmacy()->create($this->pharmacy['pharmacy']);
            $user->pharmacy_id=$pharmacy->id;
            $user->save();
            $this->clearInput();
            Session::flash('message', 'تم الاضافة بنجاح'); 
            Session::flash('alert-class', 'alert-success'); 
        } catch (\Throwable $th) {
            // $user->delete();
            dd($th);
            Session::flash('message', 'فشلة عملية الاضافة'); 
            Session::flash('alert-class', 'alert-danger');
        }
    }
   
    public function edit(Pharmacy $pharmacy)
    {
        $this->pharmacyRef=$pharmacy;
        $this->pharmacy['name']=$pharmacy->name;
        $this->pharmacy['x']=$pharmacy->x;
        $this->pharmacy['y']=$pharmacy->y;
        $this->pharmacy['email']=$pharmacy->user->email;
        $this->pharmacy['phone']=$pharmacy->user->phone;
        $this->pharmacy['address']=$pharmacy->address;
        $this->pharmacy['id']=$pharmacy->id;
        // $this->pharmacy['photo']=$pharmacy->user->image;
        $this->edit=true;
    }
    public function update()
    {


        $this->pharmacy=  $this->validate([
            'pharmacy.name' => 'required|max:80',
            'pharmacy.x' => 'required|numeric',
            'pharmacy.y' => 'required|numeric',
            'pharmacy.email' => 'required',
            'pharmacy.phone' => 'required|numeric',
            'pharmacy.address' => 'required|max:100',
            'pharmacy.photo' => 'max:1024',
            'pharmacy.password' => 'min:8',
        ]);

            try {
                if ($this->pharmacy['pharmacy']['password'] !="") {
                    $this->pharmacy['pharmacy']['password']=Hash::make($this->pharmacy['pharmacy']['password']);

                }else {
                    $this->pharmacy['pharmacy']['password']=$this->pharmacyRef->user->password;

                }  

                if ($this->pharmacy['pharmacy']['photo'] !="") {

                    $this->pharmacy['pharmacy']['image']=$this->uploadeImages( $this->pharmacy['pharmacy']['photo']);
                }else {
                    $this->pharmacy['pharmacy']['image']=$this->pharmacyRef->user->image;

                } 


                $this->pharmacyRef->user->update($this->pharmacy['pharmacy']);
                $this->pharmacyRef->update($this->pharmacy['pharmacy']);
                $this->edit=false;

                Session::flash('done-message', ' تم التعديل بنجاح'); 
                Session::flash('alert-class', 'alert-success'); 
    
                } catch (\Throwable $th) {
                
                    Session::flash('done-message', 'فشلة عملية التعديل'); 
                    Session::flash('alert-class', 'alert-danger');
                }
           
        
    }

    public function closeForm()
    {
        $this->create=false;
        $this->edit=false;
        $this->pharmacy['name']="";
        $this->pharmacy['x']="";
        $this->pharmacy['y']="";
        $this->pharmacy['email']="";
        $this->pharmacy['phone']="";
        $this->pharmacy['address']="";
        $this->pharmacy['password']="";
        $this->pharmacy['photo']="";

    }
    private function clearInput(){
        $this->pharmacy['name']="";
        $this->pharmacy['x']="";
        $this->pharmacy['y']="";
        $this->pharmacy['email']="";
        $this->pharmacy['phone']="";
        $this->pharmacy['address']="";
        $this->pharmacy['password']="";
        $this->pharmacy['photo']="";


    }
    private function uploadeImages( $request)
    { 
        return str_replace('public/','storage/',$request->store('/public/user/image') ) ;
    }
}
