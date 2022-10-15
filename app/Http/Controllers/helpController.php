<?php

namespace App\Http\Controllers;

use App\Http\Requests\helpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\help;

class helpController extends Controller
{
    public function helpAdd(helpRequest $req)
    {
        $help = new help();
        $help->email = $req->input('email');
        $help->question = $req->input('question');
        $help->save();

        return redirect()->route('help')->with('success', 'Сообщение отправлено, ответ придёт к Вам на почту в ближайшее время!');
    }

    public function all()
    {
        $help = new help();
        $data = $help->all();

        return view('helpAll', [ 'data' =>  $data ]);

    }

    public function helpDelete($id)
    {
        DB::table('helps')->where('id', '=', $id)->delete();
        $data = DB::table('helps')->get();

        return view('helpAll', [ 'data' =>  $data ]);
    }
}
