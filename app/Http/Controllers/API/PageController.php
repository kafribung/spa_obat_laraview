<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\PageRequest;

// Import Db Page
use App\Models\Page;

use Illuminate\Support\Facades\Validator;


class PageController extends Controller
{
    public function index()
    {
        $datas = Page::all();

        if (!empty($datas))
            return JsonFormatter::success($datas, 'Data berhasil ditampilkan');
        else
            return JsonFormatter::failed("Data gagal ditampilkan !");
    }

    public function strore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'obat'  => ['required', 'string', 'min:3','max:30', 'unique:pages,obat'],
            'stok'  => ['required', 'integer'],
            'harga' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);
        }
        // $nameImg = time().'.'.$request->file->getClientOriginalExtension();
        // $request->file()->storeAs('public/img', $nameImg);

        if (!empty($validator)) {
           $datas = Page::create([
                'obat' => $request->obat,
                'stok' => $request->stok,
                'harga' => $request->harga
            ]);
            return JsonFormatter::success($datas, 'Data berhasil ditampilkan');
        } else
            return JsonFormatter::failed($datas, "Data gagal ditampilkan !");
    }

    public function edit($id)
    {
        $datas = Page::findOrFail($id);

        if (!empty($datas)) {
             return JsonFormatter::success($datas, 'Data berhasil ditampilkan');
         } else
             return JsonFormatter::failed($datas, "Data gagal ditampilkan !");
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'obat'  => ['required', 'string', 'min:3','max:30'],
            'stok'  => ['required', 'integer'],
            'harga' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);
        }

        if (!empty($validator)) {
            $datas = Page::findOrFail($id)->update([
                'obat' => $request->obat,
                'stok' => $request->stok,
                'harga'=> $request->harga
             ]);
             return JsonFormatter::success($validator, 'Data berhasil ditampilkan');
         } else
             return JsonFormatter::failed($validator, "Data gagal ditampilkan !");

    }

    public function destroy($id)
    {
        if (!empty($id)) {
            $datas = Page::destroy($id);
            return JsonFormatter::success($datas, 'Data berhasil ditampilkan');
        } else
            return JsonFormatter::failed($datas, "Data gagal ditampilkan !");

    }
}
