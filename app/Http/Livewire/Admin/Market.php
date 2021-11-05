<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Pasar;

class Market extends Component
{
    use WithFileUploads;

    public $status_create = false;
    public $status_edit = false;
    public $name,$deskripsi,$harga,$image,$action;

    public function createStatus()
    {
        $this->status_create = true;
    }

    public function cancel()
    {
        $this->status_create = false;
        $this->status_edit = false;
    }

    public function store()
    {
        $name = md5($this->image . microtime()).'.'.$this->image->extension();
        // Storing image on storage
        $this->image->storeAs('market',$name);

        Pasar::insert([
            'nama' => $this->name,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'image' => $name,
            'action' => $this->action,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        session()->flash('message','Berhasil Menambah data');
    }
    public function render()
    {
        $data = Pasar::get();
        return view('livewire.admin.market',['data' => $data]);
    }
}
