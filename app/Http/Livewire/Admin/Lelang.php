<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\bid;
class Lelang extends Component
{
    public function accept($id)
    {
        bid::where('id',$id)->update([
            'status_verif' => 1,
            'status_tampil' => 1
        ]);

        session()->flash('message','Berhasil verifikasi');
    }

    public function reject($id)
    {
        bid::where('id',$id)->update([
            'status_verif' => 0,
            'status_tampil' => 0
        ]);

        session()->flash('message','Berhasil tolak verifikasi');
    }
    public function render()
    {
        $data = Bid::get();
        return view('livewire.admin.lelang',['data' => $data]);
    }
}
