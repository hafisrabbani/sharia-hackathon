<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Donasi;
class Donation extends Component
{
    public function accept($id)
    {
        Donasi::where('id',$id)->update([
            'verifikasi' => 1,
            'status' => 1,
            'verified_at' => date('Y-m-d H:i:s')
        ]);
        session()->flash('message','Berhasil Diverifikasi');
    }

    public function reject($id){
        Donasi::where('id',$id)->update([
            'verifikasi' => 0,
            'status' => 0,
        ]);
        session()->flash('message','Berhasil Tolak Diverifikasi');
    }
    public function render()
    {
        $data = Donasi::get(); 
        return view('livewire.admin.donation',['data' => $data]);
    }
}
