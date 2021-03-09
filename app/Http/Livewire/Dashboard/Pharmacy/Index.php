<?php

namespace App\Http\Livewire\Dashboard\Pharmacy;

use Livewire\Component;
use App\Models\Pharmacy;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public bool $edit=false,$create=false;
    protected $paginationTheme = 'bootstrap';
    public $pharmacy = ['name','x','y','email','phone','password','address'];

    public function render()
    {
        $pharmacies=Pharmacy::paginate(1);
        
        return view('livewire.dashboard.pharmacy.index',['pharmacies'=>$pharmacies]);
    }
    public function destroy(Pharmacy $pharmacy)
    {
        dd($pharmacy);
        # code...
    }
    public function edit(Pharmacy $pharmacy)
    {
        // dd($this->pharmacy);
        $this->pharmacy['name']=$pharmacy->name;
        $this->pharmacy['x']=$pharmacy->x;
        $this->pharmacy['y']=$pharmacy->y;
        $this->pharmacy['email']=$pharmacy->user->email;
        $this->pharmacy['phone']=$pharmacy->user->phone;
        $this->pharmacy['address']=$pharmacy->address;
        
        $this->edit=true;
    }
}
