<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでProfile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create()
    {
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
    public function create_2(Request $request)
    {
        // Varidationを行う
        $this->Validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        
        // データベースに保存する
        $news->fill($form);
        $news->save();
        
        // admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }
}
