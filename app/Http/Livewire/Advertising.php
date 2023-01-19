<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Advertising as AD;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Advertising extends Component
{
    use WithPagination , WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $advertising = ['text'=>"",'photo'=>""];
    public AD $advertisingRef ;

    public bool $edit=false,$create=false,$submit=true;
    public function render()
    {
       $advertisings= auth()->user()->pharmacy->advertisings;
        return view('livewire.advertising',compact('advertisings'));
    }
    public function create()
    {
        $this->create=true;
    }
    public function store()
    {
        $this->advertising=  $this->validate([
            'advertising.text' => 'required',
            'advertising.photo' => 'required|image|max:1024',

        ]);
        if (isset($this->advertising['advertising']['photo'])) {
            $this->advertising['advertising']['image']=$this->uploadeImages( $this->advertising['advertising']['photo']);
        }
        try {
            $this->advertising['advertising']['pharmacy_id']=auth()->user()->pharmacy->id;
            // dd($this->advertising['advertising']);
            AD::create($this->advertising['advertising']);
            $this->clearInput();
            $this->dispatchBrowserEvent('success-tost',['action'=>"الحفظ"]);
            Session::flash('message', 'تم الاضافة بنجاح'); 
            Session::flash('alert-class', 'alert-success');
        } catch (\Throwable $th) {
            Session::flash('message', 'فشلة عملية الاضافة'); 
            Session::flash('alert-class', 'alert-danger');
        }
         
    }
    public function edit(AD $advertising)
    {
        $this->advertisingRef=$advertising;
        $this->advertising['text']=$advertising->text;
        $this->edit=true;
    }
    public function update()
    {


        $this->advertising=  $this->validate([
            'advertising.text' => 'required',
            'advertising.photo' => 'image|max:1024',

        ]);

            try {
                if ($this->advertising['advertising']['photo']!="") {
                    $this->advertising['advertising']['image']=$this->uploadeImages( $this->advertising['advertising']['photo']);
                }else {
                    $this->advertising['advertising']['image']=$this->advertisingRef->image;

                } 
                $this->advertising['advertising']['pharmacy_id']=auth()->user()->pharmacy->id;
                $this->advertisingRef->update($this->advertising['advertising']);
                $this->edit=false;
                $this->dispatchBrowserEvent('success-tost',['action'=>"التعديل"]);

                Session::flash('done-message', ' تم التعديل بنجاح'); 
                Session::flash('alert-class', 'alert-success'); 
    
                } catch (\Throwable $th) {
                    $this->dispatchBrowserEvent('error-tost',['action'=>"التعديل"]);

                    Session::flash('done-message','فشلة عملية التعديل'); 
                    Session::flash('alert-class', 'alert-danger');
                }
           
        
    }


    public function destroy(AD $advertising)
    {
        try {

            $advertising->delete();
            Session::flash('done-message', ' تم الحذف بنجاح'); 
            Session::flash('alert-class', 'alert-success'); 

        } catch (\Throwable $th) {
           
            Session::flash('done-message', 'فشلة عملية الحذف'); 
            Session::flash('alert-class', 'alert-danger');
        }
       
    }

    public function closeForm()
    {
        $this->create=false;
        $this->edit=false;
        $this->advertising['text']="";

    }
    private function clearInput(){
        $this->advertising['text']="";
        $this->advertising['photo']="";
    }
    private function uploadeImages( $request)
    { 
        return str_replace('public/','storage/',$request->store('/public/Advertising/image') ) ;
    }
}
