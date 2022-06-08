<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;

class UserController extends Controller
{
    //
    public function view_user()
    {
        $users = DB::table('users')
                ->orderBy('name','asc')
                ->get();
        return view('users',['users'=>$users]);
    }

    public function insert_user(Request $request)
    {
        $noMatriks = $request->input('noMatriks');
        $users = DB::table('users')
                ->where('noMatriks', $noMatriks)
                ->first();

        if ($users === null)
        {
            $name = $request->input('name');
            $noMatriks = $request->input('noMatriks');
            $noKP = $request->input('noKP');

            DB::table('users')
            ->insert(['name'=>$name,'noMatriks'=>$noMatriks,'no_ic'=>$noKP,'status'=>'AKTIF']);

            return redirect()->back()->with('message_ins', 'Maklumat pengguna baru berjaya didaftarkan.');
        }
        else
        {
            return redirect()->back()->with('message_dup', 'Maklumat pengguna telah ada didalam sistem.');
        }
    }

    public function delete_user($id)
    {
        DB::table('users')
        ->where('noMatriks', $id)
        ->delete();

        return redirect()->back()->with('message_del', 'Maklumat pengguna berjaya dihapuskan.');
    }
}
