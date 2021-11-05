<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Donasi;

class Donation extends Component
{
    use WithFileUploads;

    public $name,$description,$end,$image;
    public $status_create = false;


    // validation
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
    public function create()
    {
        $this->status_create = true;
    }

    public function cancelCreate()
    {
        $this->status_create = false;
    }

    public function createStore()
    {
        $this->validate();
        // rename
        $name = md5($this->image . microtime()).'.'.$this->image->extension();
        // Storing image on storage
        $this->image->storeAs('donation',$name);

        $end = date('Y-m-d',strtotime($this->end));
        Donasi::insert([
            'judul' => $this->name,
            'pengguna_id' => session()->get('id_client'),
            'image' => $name,
            'status' => 0,
            'deskripsi' => $this->description,
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

    public function render()
    {
        $data = Donasi::where('status',session()->get('id_client'))
                ->whereDate('end','>=',date('Y-m-d H:i:s'))
                ->get();
        return view('livewire.client.donation',['data' => $data]);
    }
}
