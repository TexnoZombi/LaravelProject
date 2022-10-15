<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\adsRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ads;
use App\Models\role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class adsController extends Controller
{
    public function all()
    {
        $data = DB::table('ads')->get();

        if(Auth::check())
        {
            $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        } else 
        {
            $role = 'user';
        }

        return view('ads', [ 'data' =>  $data, 'title_page' => 'Список объявлений', 'role' => $role ]);
        
    }

    public function adsAdd()
    {
        return view('adsAdd');
    }

    public function adsAddSubmit(adsRequest $req)
    {
        DB::table('ads')->insert([
            'title' => $req->input('title'),
            'ads' => $req->input('ads'),
            'annotation' => $req->input('annotation'),
            'tel' => $req->input('tel'),
            'image'=>(( $req->file('image')) != null) ? $req->file('image')->getClientOriginalName() : $req->null,
            'published' => 0,
            'id_user_autors' => Auth::id(),
        ]);

        if ($req->file('image') != null) {
            $myimage = $req->file('image')->getClientOriginalName();
            $req->file('image')->move(public_path('images'), $myimage);
        }
        
        $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        return redirect()->route('adsAdd', [ 'role' => $role ])->with('success', 'Ваше объявление отправлено на модерацию!');
    }

    public function adsPublished()
    {
        $data = DB::table('ads')->where('published', '=', 1)->get();
        $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        return view('ads', [ 'data' =>  $data, 'title_page' => 'Опубликованные объявления', 'role' => $role ]);
    }

    public function adsNotPublished()
    {
        $data = DB::table('ads')->where('published', '=', 0)->get();
        if(Auth::check())
        {
            $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        } 
        else 
        {
            $role = 'user';
        }

        return view('ads', [ 'data' =>  $data, 'title_page' => 'Объявления на модерации', 'role' => $role ]);
    }
    
    public function adsView($id)
    {
        $data = DB::table('ads')->find($id);
        if(Auth::check())
        {
            $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        } 
        else 
        {
            $role = 'user';
        }

        return view('adsView', [ 'data' =>  $data, 'title_page' => 'Просмотр объявления', 'title' => 'Просмотр объявления', 'role' => $role]);
    }

    public function adsEdit($id)
    {
        if(Gate::allows('ads-user', $id) or Gate::allows('ads-admin')){
            $data = DB::table('ads')->find($id);
            return view('adsEdit', [ 'data' =>  $data, 'title_page' => 'Редактирование' ]);
        }
        else
        {
            $data = DB::table('ads')->get();
            $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
            return view('ads', [ 'data' =>  $data, 'title_page' => 'Список объявлений', 'role' => $role ]);
        }
    }

    public function adsEditSubmit($id, adsRequest $req)
    {
        DB::table('ads')
              ->where('id', $id)
              ->update(
                [
                    'title' => $req->input('title'),
                    'ads' => $req->input('ads'),
                    'annotation' => $req->input('annotation'),
                    'tel' => $req->input('tel'),
                    'image'=>(( $req->file('image')) != null) ? $req->file('image')->getClientOriginalName() : $req->null,
                ]
            );
        
        if ($req->file('image') != null) {
            $myimage = $req->file('image')->getClientOriginalName();
            $req->file('image')->move(public_path('images'), $myimage);
        }
        
        $data = DB::table('ads')->get();
        $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        return view('ads', [ 'data' =>  $data, 'title_page' => 'Список объявлений', 'role' => $role ]);
    }

    public function adsСheck($id)
    {
        DB::table('ads')
              ->where('id', $id)
              ->update(
                [
                    'published' => 1,
                ]
            );
        
        $data = DB::table('ads')->where('published', '=', 1)->get();
        $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        return view('ads', [ 'data' =>  $data, 'title_page' => 'Опубликованные объявления', 'role' => $role]);
    }

    public function adsDelete($id)
    {
        DB::table('ads')->where('id', '=', $id)->delete();
        $data = DB::table('ads')->get();
        $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        return view('ads', [ 'data' =>  $data, 'title_page' => 'Список объявлений', 'role' => $role ]);
    }

    public function adsSearch(Request $request)
    {
        $s = $request->s;
        $data = DB::table('ads')->WHERE('title', 'LIKE', '%' . $s . '%')->get();

        if(Auth::check())
        {
            $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        }
        else 
        {
            $role = 'user';
        }

        return view('ads', ['data' =>  $data, 'title_page' => 'Объявления по запросу','role' => $role] );
    }
}
