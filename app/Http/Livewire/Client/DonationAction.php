<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Donasi;
use App\DonasiAction;
use App\Pengguna;

class DonationAction extends Component
{
    public $idAct,$donasi;
    public $donate_status = false;

    public function showDonate()
    {
        $this->donate_status = true;
    }
    public function cancelDonate()
    {
        $this->donate_status = false;
    }
    public function donasiStore()
    {
        $user = Pengguna::where('id',session()->get('id_client'))->first(); //change with session,
        if($this->donasi > $user->saldo){
            session()->flash('gagal','Saldo anda tidak cukup');
            $this->resetForm();
        }else{
            $saldo = $user->saldo - $this->donasi;
            Pengguna::where('id',session()->get('id_client'))->update([
                'saldo' => $saldo
            ]);
            DonasiAction::insert([
                'donasi_id' => $this->idAct,
                'user_id' => session()->get('id_client'), //change with session
                'sumbangan' => $this->donasi,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $this->resetForm();
            session()->flash('message','Berhasil memberikan sumbangan');
        }
    }

    public function resetForm()
    {
        $this->donasi = '';
    }

    public function render()
    {
        $data = Donasi::where('id',$this->idAct)->get();
        $total = DonasiAction::where('donasi_id',$this->idAct)
        ->sum('sumbangan');
        return view('livewire.client.donation-action',['data' => $data,'total' => $total]);
    }
}
