<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\changePasswordRequest;
use App\Mail\SendMailUser;
use App\Models\ChangePassword;
use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function index()
    {
        $msg = Helper::getCustomMsg();
        return view('password.index', ['msg' => $msg]);
    }

    public function requestEmailPassword(Request $request)
    {
        $email = $request->email;
        $account = $request->type_account;

        if ($account == 0 || $account == 1) {
            $user = User::where('email', $email)->get()->first();
            $lib = Library::where('email', $email)->get()->first();
            if ($user && $account == 0) {
                $c = ChangePassword::create([
                    'id_user' => $user->id,
                    'email_user' => $user->email,
                    'user_or_lib' => 0
                ]);
                $link = 'http://127.0.0.1:8000/update-password/' . $c['id'];
                Mail::to($user->email)->send(new SendMailUser($user->nome, $link));
                Helper::setCustomMsg(['msg-success', 'Email enviado com sucesso!']);
            } else if ($lib && $account == 1) {
                $c = ChangePassword::create([
                    'id_user' => $lib->id,
                    'email_user' => $lib->email,
                    'user_or_lib' => 1
                ]);
                $link = 'http://127.0.0.1:8000/update-password/' . $c['id'];
                Mail::to($lib->email)->send(new SendMailUser($lib->nome, $link));
                Helper::setCustomMsg(['msg-success', 'Email enviado com sucesso!']);
            } else {
                Helper::setCustomMsg(['msg-danger', 'Email não cadastrado no sistema!']);
                return redirect()->route('changePassword');
            }
            
            return redirect()->route('login');
        }else{
            Helper::setCustomMsg(['msg-danger', 'Conta inválida!']);
            return redirect()->route('changePassword');
        }
    }

    public function update($id)
    {
        $request = ChangePassword::where('id', $id)->get()->first();
        if ($request && $request['used'] === 0) {
            return view('password.new', ['id' => $id]);
        }
        return redirect()->route('home');
    }

    public function save(changePasswordRequest $request)
    {
        $data = $request->all();

        $request = ChangePassword::where('id', $data['id'])->get()->first();
        if ($request) {
            if ($request['user_or_lib'] == 0) {
                $user = User::where('id', $request['id_user'])->get()->first();
                $user->update([
                    'password' => md5($data['password'])
                ]);
                $request->update([
                    'used' => 1
                ]);
                Helper::setCustomMsg(['msg-success', 'Senha alterada com sucesso!']);
            } else {
                $lib = Library::where('id', $request['id_user'])->get()->first();
                $lib->update([
                    'password' => md5($data['password'])
                ]);
                $request->update([
                    'used' => 1
                ]);
                Helper::setCustomMsg(['msg-success', 'Senha alterada com sucesso!']);
                return redirect()->route('loginLibrary');
            }
        }

        return redirect()->route('login');
    }
}
