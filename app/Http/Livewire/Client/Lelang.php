<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Bid;
use Livewire\WithFileUploads;

class Lelang extends Component
{
    use WithFileUploads;
    public $name,$description,$user,$image,$end;
    public $status_create = false;

    protected function rules(): array{
        return [
            'name' => 'required',
            'description' => 'required',
            'end' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ];
    }

    protected $messages = [
        'name.required' => 'Nama donasi harus diisi',
        'description.required' => 'Deskripsi harus diisi',
        'end.required' =>  'Batas akhir harus diisi',
        'image.required' => 'Gambar harus diisi',
        'image.mimes' => 'Format gambar harus jpg/jpeg/png'
    ];

    // create method
    public function createStore()
    {
        $this->validate();
        // rename
        $name = md5($this->image . microtime()).'.'.$this->image->extension();
        // Storing image on storage
        $this->image->storeAs('lelang',$name);

        $end = date('Y-m-d',strtotime($this->end));
        Bid::insert([
            'name' => $this->name,
            'deskripsi' => $this->description,
            'pengguna_id' => session()->get('id_client'), //change with session,
            'image' => $name,
            'end' => $end,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]); 
        $this->resetForm();
        session()->flash('message','Sedang dalam proses verifikasi');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->image = '';
        $this->end = '';
        $this->description = '';
        $this->cancelCreate();
    }
    public function create()
    {
        $this->status_create = true;
    }

    public function cancelCreate()
    {
        $this->status_create = false;
    }

    public function render()
    {
        $data = Bid::where('status_tampil',session()->get('id_client'))
                ->whereDate('end','>=',date('Y-m-d H:i:s'))
                ->get();
        return view('livewire.client.lelang',['data' => $data]);
    }
}
