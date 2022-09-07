<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mahasiswa;
use App\Toga;
use Exception;
use App\Province;
use App\City;
use App\District;
use App\Village;
use App\Alamat;
use Xendit\Xendit;
use Illuminate\Support\Facades\Log;
use App\Pelunasan;

class TogaController extends Controller
{
    function __construct () {
      $options['secret_api_key']='xnd_production_UlOYPCqw7NmD9JNJK6RCAUXwmNm8KT23Xrlp7uxTkqGpP93ikIPLU7nWXGY';
      $this->server_domain = 'https://api.xendit.co';
      $this->secret_api_key = $options['secret_api_key'];
    }

    public function index()
    {
        $user = Auth::user();
        if(Auth::user())
        {
            $users = DB::table('users')->where('id', '=', $user->id)->get()
            ->first();
            $mahasiswas = DB::table('mahasiswas')->where('npm', '=', $user->npm)->get()
            ->first();
            $toga = DB::table('togas')->where('mahasiswa_id', '=', $mahasiswas->id)->get()
            ->first();
            $prodis = DB::table('prodis')->where('id', '=', $mahasiswas->prodi_id)->get()
            ->first();
            $alamat = DB::table('mahasiswas')->where('alamat', '=', $mahasiswas->alamat)->get()
            ->first();
            $status_toga = DB::table('statuss')->where('id', '=', 2)->get()->first();

            if($mahasiswas->status_registrasi == 2)
            {
                return view('home.toga',[  
                                            'users'=>$users,
                                            'mahasiswas'=>$mahasiswas,
                                            'prodis'=>$prodis,
                                            'alamats' => $alamat,
                                            'status_toga' => $status_toga,
                                            'togas'=>$toga
                                        ]
                );
            } else
            {
                return back()->with(['error' => 'Mohon selesaikan pendaftaran wisuda terlebih dahulu.']);
            }
        } else
        {
            return redirect('/');
        }
    }

    public function editToga()
    {
        $user = Auth::user();
        $mahasiswas = DB::table('mahasiswas')->where('npm', '=', $user->npm)->get()->first();
        if($mahasiswas->status_ambil_toga == 2)
        {
            return back()->with(['error' => 'Anda sudah membuat invoice. Silakan muat ulang halaman dan lanjutkan pembayaran terlebih dahulu']);
        } else
        {
            $user = Auth::user();
            $editToga = DB::table('mahasiswas')->where('npm', $user->npm)->update(['status_ambil_toga' => 0]);
                if($editToga)
                {
                    return back();
                } else
                {
                    return back()->with(['error' => 'Gagal']);
                }
        }
    }

    public function lockToga(Request $request)
    {
        request()->validate([
			'size_toga' => 'required|string|min:1|max:255',
			// 'nomor_telepon' => 'required|string|min:1|max:15',
			// 'alamat' => 'required|string|min:1|max:255',
			// 'kode_pos' => 'required|string|min:1|max:5'
		]);

        $user = Auth::user();
        $editToga = DB::table('mahasiswas')->where('npm', $user->npm)->update(['status_ambil_toga' => 2]);

        if($editToga)
        {
            return back()->with(['success' => 'Data berhasil dikunci']);
        } else
        {
            return back()->with(['error' => 'Gagal Mengunci Data']);
        }
    }


    public function createToga(Request $request)
    {
        //validasi
        request()->validate([
			'size_toga' => 'required|string|min:1|max:255'
		]);

        ## preset awal

        //inisiasi
        $data_mahasiswa = new Mahasiswa;
        $exist_mahasiswa = Mahasiswa::whereNpm(Auth::user()->npm)->first();

        $data_alamat = new Alamat;
        $exist_alamat = Alamat::whereMahasiswa_id($exist_mahasiswa->id)->first();

        $data_toga = new Toga;
        $exist_toga = Toga::whereMahasiswa_id($exist_mahasiswa->id)->first();


        ## periksa apakah ada data di database table mahasiswa
        if (!empty($exist_mahasiswa))
        {
            
            if (!empty($exist_toga))
            {
                // if($exist_toga) {
                if ($exist_toga->size_toga != $request->size_toga)
                {
                    $datae_toga['size_toga'] = $request->size_toga;
                } else
                {
                    $datae_toga['size_toga'] = $request->size_toga;
                }

                Toga::whereMahasiswa_id($exist_mahasiswa->id)->update($datae_toga);
                Mahasiswa::whereNpm(Auth::user()->npm)->update(['status_ambil_toga' => 1]);
                return back()->with(['success' => 'Data berhasil diubah.']);

            }
            ## jika tidak ada data di database
            else
            {
                $data_toga->mahasiswa_id = $exist_mahasiswa->id;
                $data_toga->size_toga = $request->size_toga;
                $data_toga->save();

                return back()->with(['success' => 'Data berhasil disimpan.']);
            }


        }
        ## jika tidak ada data di database table mahasiswa
        else
        {
            $data_alamat->mahasiswa_id = $exist_mahasiswa->id;
            $data_mahasiswa->alamat = $request->alamat;
            $data_alamat->save();
            $data_mahasiswa->save();

            $data_toga->mahasiswa_id = $exist_mahasiswa->id;
            $data_toga->size_toga = $request->size_toga;
            $data_toga->save();
            $data_mahasiswa->save();

            if (!empty($exist_toga))
            {
                if ($exist_toga->size_toga != $request->size_toga)
                {
                    $datae_toga['size_toga'] = $request->size_toga;
                } else
                {
                    $datae_toga['size_toga'] = $request->size_toga;
                }

                
                Toga::whereMahasiswa_id($exist_mahasiswa->id)->update($datae_toga);
                return back()->with(['success' => 'Data berhasil disimpan.']);

            }
            ## jika tidak ada data di database
            else
            {
                $data_toga->mahasiswa_id = $exist_mahasiswa->id;
                $data_toga->size_toga = $request->size_toga;
                $data_toga->save();
                $data_mahasiswa->save();
                return back()->with(['success' => 'Data berhasil disimpan.']);

            }
        }
    }
}
