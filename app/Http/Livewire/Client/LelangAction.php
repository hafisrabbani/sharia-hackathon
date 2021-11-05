<?php

namespace App\Http\Livewire\Client;

use App\Bid;
use App\bidAction;
use App\Pengguna;
use Livewire\Component;

class LelangAction extends Component
{
    public $idAct,$lelang;
    public $status_lelang =  false;
    public function showLelang()
    {
        $this->status_lelang = true;
    }

    public function cancelLelang()
    {
        $this->status_lelang = true;
    }

    public function lelangStore()
    {
        $user = Pengguna::where('id',session()->get('id_client'))->first();
        $high = bidAction::where('bid_id',$this->idAct)->orderBy('harga','DESC')->first();
        if($this->lelang < $high->harga){
            session()->flash('gagal','Harga Harus Lebih Tinggi');
                $this->resetForm();
            if($this->lelang > $user->saldo){
                session()->flash('gagal','Saldo anda tidak cukup');
            $this->resetForm();
            }
        }else{
            bidAction::insert([
                'pengguna_id' => session()->get('id_client'),
                'bid_id' => $this->idAct,
                'harga' => $this->lelang,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $this->resetForm();
            session()->flash('message','Berhasil menawar barang');
        }
    }

    public function resetForm()
    {
        $this->lelang = '';
    }
    public function render()
    {
        $data = Bid::where('id',$this->idAct)->get();
        $high = bidAction::where('bid_id',$this->idAct)->orderBy('harga','DESC')->first();
        return view('livewire.client.lelang-action',['data' => $data,'high' => $high]);
    }
}
