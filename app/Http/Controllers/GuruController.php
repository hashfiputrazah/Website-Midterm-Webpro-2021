<?php

namespace App\Http\Controllers;


use App\Models\GuruModel;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
    }
 
public function index()

{
    $data = [
        'guru' => $this->GuruModel->allData(),
    ];

   return view('v_guru', $data);
}
    public function detail($id_guru)
    {
        if(!$this->GuruModel->detailData($id_guru)){
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detailData($id_guru),
        ];
    
       return view('v_detailguru', $data);
    }
    public function add()
    {
        return view('v_addguru');
    }
    public function insert()
    {
        request()->validate([
            'nip' => 'required|unique:tbl_guru,nip|min:4 max:5',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
            
        ],
        [
            'nip.reuired'=>'wajib diisi!!',
            'nip.unique'=>'nip ini sudah ada !!!',
            'nip.min'=>'minimal 4 karakter ',
            'nip.max'=>'maximal 5 karakter',
            'nama_guru.required'=>'wajib diisi!!',
            'mapel.required'=>'wajib diisi!!',
            'foto_guru.required'=>'wajib diisi!!',

    ]);

        $file = Request()->foto_guru;
        $fileName = Request()->nip.'.'.$file->extension();
        $file->move(public_path('foto_guru'),$fileName);

        $data = [
                'nip' =>Request()->nip,
                'nama_guru' =>Request()->nama_guru,
                'mapel' =>Request()->mapel,
                'foto_guru' =>Request()->$fileName,
        ];

        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan','data berhasil di tambahkan');
    }

}