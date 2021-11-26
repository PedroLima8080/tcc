<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Library;
use Illuminate\Http\Request;

class LibsController extends Controller
{
    public function sla()
    {
        $libraries = Library::all();
        $msg = Helper::getCustomMsg();
        return view('teste', ['libraries' => $libraries, 'msg' => $msg]);
    }

    public function getLibraryByCnpj(Request $request)
    {
        $data = $request->all();
        $cnpj = $data['cnpj'];
        try {
            $lib = Library::where('cnpj', $cnpj)->first();
           
            return response(['lib' => $lib, 'success' => true]);
        } catch (\PDOException $e) {
            return response(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function confirmLib($id)
    {
        $lib = Library::where('id', $id)->first();
        if ($lib) {
            $lib->update([
                'valida' => 1
            ]);
            Helper::setCustomMsg(['msg-success', 'Biblioteca ativada com sucesso!']);
        } else {
            Helper::setCustomMsg(['msg-danger', 'Falha ao ativar biblioteca!']);
        }
        return response(['status' => 'success', 'lib' => $lib]);
    }

    public function declineLib($id)
    {
        $lib = Library::where('id', $id)->first();
        if ($lib) {
            $lib->update([
                'valida' => 0
            ]);
            Helper::setCustomMsg(['msg-success', 'Biblioteca desativada com sucesso!']);
        } else {
            Helper::setCustomMsg(['msg-danger', 'Falha ao desativar biblioteca!']);
        }
        return response(['status' => 'success', 'lib' => $lib]);
    }
}
