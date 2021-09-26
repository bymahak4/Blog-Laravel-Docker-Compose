<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Autor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function autenticar(Request $request){
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        else{
            return view('login',['error' => "true"]);
        }
    }

    public function showProfile(Request $request, $idUsuario){
        $a = Autor::where("user_id",$idUsuario)->first();
        error_log($idUsuario);
        return view('perfil',['autor' => $a]);
    }


    public function createUser(Request $request){
        try {
            DB::beginTransaction();

            $u = new User();
            $u -> name = $request -> post("nombreUsuario");
            $u -> email = $request -> post("email");
            $u -> password = Hash::make($request -> post("password")); 
            $u -> save();


            $fileName = uniqid("photo_") . ".png";

            $a = new Autor();
            $a -> nombre = $request -> post("nombre");
            $a -> apellido = $request -> post("apellido");
            $a -> user_id = $u -> id;
            $a -> foto = "fotos/" . $fileName;
            
            $request->foto->storeAs('fotos', $fileName);


            $a -> save();
            
            DB::commit();
            return redirect()->intended('/');


        }
        catch (Throwable $e) {
            DB::rollback();
        }
    }
}
