<?php

namespace App\Http\Controllers;

use App\Donasi;
use App\Pengguna;
use App\DonasiAction;
use App\Bid;
use App\bidAction;
use App\Pasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class clientController extends Controller
{
    // get method in here
    public function index()
    {
        $user = Pengguna::where('id',1)->get();
        $donasi = Donasi::where('status',1)->whereDate('end', '>=', date('Y-m-d H:i:s'))->get();
        $total = DonasiAction::groupBy('donasi_id')->selectRaw('sum(sumbangan) as total,donasi_id as id')
        ->get();
        $lelang = Bid::where('status_tampil',1)
                ->whereDate('end','>=',date('Y-m-d H:i:s'))
                ->get();
        $high = bidAction::orderBy('harga','DESC')->first();
        $market = Pasar::get();
        return view('client.home',[
            'user' => $user,
            'donasi' => $donasi,
            'total' => $total,
            'lelang' => $lelang,
            'high' => $high,
            'pasar' => $market
        ]);
    }

    public function logout()
    {
        session()->flush();
        return redirect(route('client.login'));
    }

    public function loginIndex()
    {
        return view('client.login');
    }

    public function loginPost(Request $request)
    {
        $data = Pengguna::where('username',$request->username)->first();
        if($data)
        {
            if(Hash::check($request->password, $data->password)){
                $request->session()->put('loginClient',true);
                $request->session()->put('id_client',$data->id);
                return redirect(route('client.index'));
            }else{
                session()->flash('gagal','Username / Password salah');
                return redirect()->back();
            }
        }else{
            session()->flash('gagal','Username / Password salah');
            return redirect()->back();
        }   
    }

    public function donate()
    {
        return view('client.donate');
    }

    public function donateAct($id){
        return view('client.donation-action',['id' => $id]);
    }

    public function lelangAct($id){
        return view('client.lelang-action',['id' => $id]);
    }

    public function lelangIndex()
    {
        return view('client.lelang');
    }
}
