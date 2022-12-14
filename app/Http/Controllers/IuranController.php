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

class IuranController extends Controller
{
    function __construct ()
    {
        $options['secret_api_key']='xnd_production_UlOYPCqw7NmD9JNJK6RCAUXwmNm8KT23Xrlp7uxTkqGpP93ikIPLU7nWXGY';
        $this->server_domain = 'https://api.xendit.co';
        $this->secret_api_key = $options['secret_api_key'];
    }
    
    public function index()
    {
        $user = Auth::user();
        if(Auth::user())
        {
            $users = DB::table('users')->where('id', '=', $user->id)->get()->first();
            $mahasiswas = DB::table('mahasiswas')->where('npm', '=', $user->npm)->get()->first();
            $toga = DB::table('togas')->where('mahasiswa_id', '=', $mahasiswas->id)->get()->first();
            $prodis = DB::table('prodis')->where('id', '=', $mahasiswas->prodi_id)->get()->first();
            $alamat = DB::table('mahasiswas')->where('alamat', '=', $mahasiswas->alamat)->get()->first();
            $status_toga = DB::table('statuss')->where('id', '=', 2)->get()->first();
            $status_iuran = DB::table('statuss')->where('id', '=', 5)->get()->first();
            $pelunasan = DB::table('pelunasans')->where('mahasiswa_id', '=', $mahasiswas->id)->get()->first();



            $getInvoice = array('status' => 'Bla');


            if($mahasiswas->status_ambil_toga >= 2)
            {
                if(!empty($pelunasan))
                {
                    Xendit::setApiKey($this->secret_api_key);

                    $id = $pelunasan->invoice_id;
                    $getInvoice = \Xendit\Invoice::retrieve($id);
                    $exist_pelunasan = Pelunasan::whereMahasiswa_id($mahasiswas->id)->first();

                    if ($exist_pelunasan->status != $getInvoice['status'])
                    {
                        if($getInvoice['status'] == "SETTLED")
                        {
                            $datae_ambiltoga['status_iuran'] = 3;
                            $datae_pelunasan['status'] = $getInvoice['status'];

                            $id = $pelunasan->invoice_id;
                            $getInvoice = \Xendit\Invoice::retrieve($id);

                            $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                            Pelunasan::whereMahasiswa_id($mahasiswas->id)->update($datae_pelunasan);
                            if($updatestatus)
                            {
                                return view('home.iuran', ['users'=>$users,
                                                            'mahasiswas'=>$mahasiswas,
                                                            'prodis'=>$prodis,
                                                            // 'provinces' => $provinces,
                                                            'alamats' => $alamat,
                                                            // 'provinsis' => $provinsis,
                                                            // 'kotas' => $kota,
                                                            // 'kecamatans' => $kecamatan,
                                                            // 'kelurahans' => $kelurahan,
                                                            'status_toga' => $status_toga,
                                                            'status_iuran' => $status_iuran,
                                                            'pelunasan' => $pelunasan,
                                                            'getInvoices' => $getInvoice,
                                                            'togas'=>$toga]
                                );
                            }
                        } else if($getInvoice['status'] == "PAID" )
                        {
                            $datae_ambiltoga['status_iuran'] = 3;
                            $datae_pelunasan['status'] = $getInvoice['status'];
                            $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                            Pelunasan::whereMahasiswa_id($mahasiswas->id)->update($datae_pelunasan);
                            if($updatestatus)
                            {
                                return view('home.iuran', ['users'=>$users,
                                                        'mahasiswas'=>$mahasiswas,
                                                        'prodis'=>$prodis,
                                                        // 'provinces' => $provinces,
                                                        'alamats' => $alamat,
                                                        // 'provinsis' => $provinsis,
                                                        // 'kotas' => $kota,
                                                        // 'kecamatans' => $kecamatan,
                                                        // 'kelurahans' => $kelurahan,
                                                        'status_toga' => $status_toga,
                                                        'status_iuran' => $status_iuran,
                                                        'pelunasan' => $pelunasan,
                                                        'getInvoices' => $getInvoice,
                                                        'togas'=>$toga]
                                );
                            }
                        } else if($getInvoice['status'] == "PENDING")
                        {
                            $datae_ambiltoga['status_iuran'] = 1;
                            $datae_pelunasan['status'] = $getInvoice['status'];
                            $updatestatus =Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                            Pelunasan::whereMahasiswa_id($mahasiswas->id)->update($datae_pelunasan);

                            if($updatestatus)
                            {
                                return view('home.iuran', ['users'=>$users,
                                                            'mahasiswas'=>$mahasiswas,
                                                            'prodis'=>$prodis,
                                                            'alamats' => $alamat,
                                                            'status_toga' => $status_toga,
                                                            'status_iuran' => $status_iuran,
                                                            'pelunasan' => $pelunasan,
                                                            'getInvoices' => $getInvoice,
                                                            'togas'=>$toga]
                                );
                            }
                        } else if($getInvoice['status'] == "EXPIRED")
                        {
                            $datae_ambiltoga['status_iuran'] = 0;
                            $datae_pelunasan['status'] = $getInvoice['status'];
                            $updatestatus = Mahasiswa::whereNpm(Auth::user()->npm)->update($datae_ambiltoga);
                            Pelunasan::whereMahasiswa_id($mahasiswas->id)->update($datae_pelunasan);
                            if($updatestatus)
                            {
                                return view('home.iuran', ['users'=>$users,
                                                            'mahasiswas'=>$mahasiswas,
                                                            'prodis'=>$prodis,
                                                            // 'provinces' => $provinces,
                                                            'alamats' => $alamat,
                                                            // 'provinsis' => $provinsis,
                                                            // 'kotas' => $kota,
                                                            // 'kecamatans' => $kecamatan,
                                                            // 'kelurahans' => $kelurahan,
                                                            'status_toga' => $status_toga,
                                                            'status_iuran' => $status_iuran,
                                                            'pelunasan' => $pelunasan,
                                                            'getInvoices' => $getInvoice,
                                                            'togas'=>$toga]
                                );
                            }
                        }
                    } else
                    {
                        $datae_pelunasan['status'] = $getInvoice['status'];
                        Pelunasan::whereMahasiswa_id($mahasiswas->id)->update($datae_pelunasan);
                        return view('home.iuran', ['users'=>$users,
                                                    'mahasiswas'=>$mahasiswas,
                                                    'prodis'=>$prodis,
                                                    'alamats' => $alamat,
                                                    'status_toga' => $status_toga,
                                                    'status_iuran' => $status_iuran,
                                                    'pelunasan' => $pelunasan,
                                                    'getInvoices' => $getInvoice,
                                                    'togas'=>$toga]
                        );
                    }

                } else
                {
                    return view('home.iuran', ['users'=>$users,
                                                'mahasiswas'=>$mahasiswas,
                                                'prodis'=>$prodis,
                                                'alamats' => $alamat,
                                                'status_toga' => $status_toga,
                                                'status_iuran' => $status_iuran,
                                                'pelunasan' => $pelunasan,
                                                'getInvoices' => $getInvoice,
                                                'togas'=>$toga]
                    );
                }
            } else
            {
                return back()->with(['error' => 'Anda tidak melakukan pendataan toga!']);
            }
        } else
        {
            return redirect('/');
        }
    }

    public function editIuran()
    {
        $user = Auth::user();
        $mahasiswas = DB::table('mahasiswas')->where('npm', '=', $user->npm)->get()->first();
        if($mahasiswas->status_iuran == 2)
        {
            return back()->with(['error' => 'Anda sudah membuat invoice. Silakan muat ulang halaman dan lanjutkan pembayaran terlebih dahulu']);
        } else
        {
            $user = Auth::user();
            $editToga = DB::table('mahasiswas')->where('npm', $user->npm)->update(['status_iuran' => 0]);
                if($editToga)
                {
                    return back();
                } else
                {
                    return back()->with(['error' => 'Gagal']);
                }
            }
    }

    public function lockIuran(Request $request)
    {

        request()->validate([
			'size_toga' => 'required|string|min:1|max:255',
			'nomor_telepon' => 'required|string|min:1|max:15',
			'alamat' => 'required|string|min:1|max:255'
		]);

        

        $data_mahasiswa = new Mahasiswa;
        $exist_mahasiswa = Mahasiswa::whereNpm(Auth::user()->npm)->first();
        
        if($exist_mahasiswa->status_iuran == 0)
        {
            $user = Auth::user();
            $mahasiswas = DB::table('mahasiswas')->where('npm', '=', $user->npm)->get()->first();
            $editToga = DB::table('mahasiswas')->where('npm', $user->npm)->update(['status_iuran' => 1]);

            if($editToga)
            {
                Xendit::setApiKey($this->secret_api_key);

                $external_id = "".Auth::user()->id.".".Auth::user()->npm.".".Auth::user()->email;

                $params = [
                    'external_id' => $external_id,
                    'payer_email' => Auth::user()->email,
                    'description' => 'Iuran',
                    'amount' => 1,
                    'success_redirect_url' => 'siwi.wisuda.id/iuran',
                    'failure_redirect_url' => 'www.youtube.com',
                    'currency' => 'IDR',
                    'customer' => [
                        'given_names' => $mahasiswas->nama,
                        'email' =>Auth::user()->email,
                        'mobile_number' => $mahasiswas->nomor_telepon
                    ],
                    'items' => [
                        [
                            'name' => 'Toga',
                            'quantity' => 1,
                            'price' => 1,
                            'category' => 'Uniform',
                            'url' => 'wisudapknstan.id'
                        ]
                    ],
                    'fees' => [
                        [
                            'type' => 'ADMIN',
                            'value' => 0
                        ]
                    ],
                    'should_send_emai' => true,

                ];

                $createInvoice = \Xendit\Invoice::create($params);

                $data_mahasiswa = new Mahasiswa;
                $exist_mahasiswa = Mahasiswa::whereNpm(Auth::user()->npm)->first();

                $data_pelunasan = new Pelunasan;
                $exist_pelunasan = Pelunasan::whereMahasiswa_id($exist_mahasiswa->id)->first();

                if (!empty($exist_pelunasan))
                {
                    // if($exist_toga) {
                    if ($exist_pelunasan->order_id != $createInvoice['external_id'])
                    {
                        $datae_pelunasan['order_id'] = $createInvoice['external_id'];
                    } else
                    {
                        $datae_pelunasan['order_id'] = $createInvoice['external_id'];
                    }
                    
                    if ($exist_pelunasan->type != $createInvoice['amount'])
                    {
                        $datae_pelunasan['type'] = $createInvoice['amount'];
                    } else
                    {
                        $datae_pelunasan['type'] = $createInvoice['amount'];
                    }
                    
                    if ($exist_pelunasan->status != $createInvoice['status'])
                    {
                        $datae_pelunasan['status'] = $createInvoice['status'];
                    } else
                    {
                        $datae_pelunasan['status'] = $createInvoice['status'];
                    }

                    if ($exist_pelunasan->link_xendit != $createInvoice['invoice_url'])
                    {
                        $datae_pelunasan['link_xendit'] = $createInvoice['invoice_url'];
                    } else
                    {
                        $datae_pelunasan['link_xendit'] = $createInvoice['invoice_url'];
                    }
                    
                    if ($exist_pelunasan->invoice_id != $createInvoice['id'])
                    {
                        $datae_pelunasan['invoice_id'] = $createInvoice['id'];
                    } else
                    {
                        $datae_pelunasan['invoice_id'] = $createInvoice['id'];
                    }

                    Pelunasan::whereMahasiswa_id($exist_mahasiswa->id)->update($datae_pelunasan);
                } else
                {
                    $data_pelunasan->mahasiswa_id = $exist_mahasiswa->id;
                    $data_pelunasan->order_id = $createInvoice['external_id'];
                    $data_pelunasan->type = $createInvoice['amount'];
                    $data_pelunasan->status = $createInvoice['status'];
                    $data_pelunasan->link_xendit = $createInvoice['invoice_url'];
                    $data_pelunasan->invoice_id = $createInvoice['id'];
                    $data_pelunasan->save();
                }

                Log::info($createInvoice);

                return redirect($createInvoice['invoice_url']);
                var_dump($createInvoice);

            } else
            {
                return back()->with(['error' => 'Gagal mengunci data']);
            }
        } else
        {
            return back()->with(['error' => 'Anda telah memebuat invoice. Silakan lanjutkan pembayaran terlebih dahulu']);
        }
    }

    public function createIuran(Request $request)
    {
        //validasi
        request()->validate([
            'size_toga' => 'required|string|min:1|max:255',
            'nomor_telepon' => 'required|string|min:1|max:15',
            'alamat' => 'required|string|min:1|max:255',
        ]);

        ## preset awal

        //inisiasi
        $data_mahasiswa = new Mahasiswa;
        $exist_mahasiswa = Mahasiswa::whereNpm(Auth::user()->npm)->first();

        $data_alamat = new Alamat;
        $exist_alamat = Mahasiswa::whereMahasiswa_id($exist_mahasiswa->id)->first();

        $data_toga = new Toga;
        $exist_toga = Toga::whereMahasiswa_id($exist_mahasiswa->id)->first();


        ## periksa apakah ada data di database table mahasiswa
        if (!empty($exist_mahasiswa))
        {
            if ($exist_mahasiswa->alamat != $request->alamat)
            {
                $datae_mahasiswa['alamat'] = $request->alamat;
            } else
            {
                $datae_mahasiswa['alamat'] = $request->alamat;
            }
    
            if($exist_mahasiswa->status_iuran == 4)
            {
                Mahasiswa::whereNpm(Auth::user()->npm)->update(['status_iuran' => 3]);
            } else
            {
                Mahasiswa::whereNpm(Auth::user()->npm)->update(['status_iuran' => 1]);
            }

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
                Mahasiswa::whereMahasiswa_id($exist_mahasiswa->id)->update($datae_mahasiswa);

                return back()->with(['success' => 'Data berhasil diubah.']);

            }
            ## jika tidak ada data di database
            else
            {
                $data_toga->mahasiswa_id = $exist_mahasiswa->id;
                $data_toga->size_toga = $request->size_toga;
                $data_mahasiswa->nomor_telepon = $request->nomor_telepon;
                $data_toga->save();
                $data_mahasiswa->save();

                // Alamat::whereMahasiswa_id(Auth::user()->id)->update($datae_alamat);

                return back()->with(['success' => 'Data berhasil disimpan.']);
            }


        }
        ## jika tidak ada data di database table mahasiswa
        else
        {
            $data_alamat->mahasiswa_id = $exist_mahasiswa->id;
            // $data_alamat->provinsi = $request->provinsi;
            // $data_alamat->kota = $request->kota;
            // $data_alamat->kecamatan = $request->kecamatan;
            // $data_alamat->kelurahan = $request->kelurahan;
            $data_mahasiswa->alamat = $request->alamat;
            // $data_alamat->kode_pos = $request->kode_pos;
            $data_alamat->save();
            $data_mahasiswa->save();

            if($exist_mahasiswa->status_iuran == 4)
            {
                Mahasiswa::whereNpm(Auth::user()->npm)->update(['status_iuran' => 3]);
            } else
            {
                Mahasiswa::whereNpm(Auth::user()->npm)->update(['status_iuran' => 1]);
            }

            $data_toga->mahasiswa_id = $exist_mahasiswa->id;
            $data_toga->size_toga = $request->size_toga;
            $data_mahasiswa->nomor_telepon = $request->nomor_telepon;
            $data_toga->save();
            $data_mahasiswa->save();

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
                if ($exist_mahasiswa->nomor_telepon != $request->nomor_telepon) {
                    $datae_mahasiswa['nomor_telepon'] = $request->nomor_telepon;
                }
                else{
                    $datae_mahasiswa['nomor_telepon'] = $request->nomor_telepon;
                }
                Toga::whereMahasiswa_id($exist_mahasiswa->id)->update($datae_toga);
                return back()->with(['success' => 'Data berhasil disimpan.']);

            }
            ## jika tidak ada data di database
            else 
            {
                $data_toga->mahasiswa_id = $exist_mahasiswa->id;
                $data_toga->size_toga = $request->size_toga;
                $data_mahasiswa->nomor_telepon = $request->nomor_telepon;
                $data_toga->save();
                $data_mahasiswa->save();
                return back()->with(['success' => 'Data berhasil disimpan.']);
            }
        }
    }
}
