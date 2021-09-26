<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function Inicio(Request $request){
        $p = DB::table('posts') -> 
                orderBy('created_at','desc') -> 
                simplePaginate(3);
        return view('inicio', [ "posts" => $p ]);
    }

    public function newPost(Request $request){
        $p = new Post();
        $p -> titulo = $request -> post('titulo');
        $p -> cuerpo = $request -> post('cuerpo');
        $p -> autor = Auth::user()->name;

        $p -> save();

        return redirect()->intended('/');
    }


    public function editPostForm(Request $request){
        $p = DB::table('posts') -> 
                where('id',$request -> get('id'))->first();

        return view('crearPost',[ "post" => $p ]);
    }
    public function editPost(Request $request){
        $p = Post::where('id',$request -> post('id')) ->first();

        $p -> titulo = $request -> post('titulo');
        $p -> cuerpo = $request -> post('cuerpo');

        $p -> save();
        return redirect()->intended('/');

    }
}
