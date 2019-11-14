<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    //
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        
        $uploader = new ImageUploadHandler();
        if ($request->avatar) {
            $request = $uploader->save($request->avatar, 'avatar', $user->id);
            if ($request) {
                $data['avatar'] = $request['path'];
            }
        }
        
        return redirect()->route("users.show", $user->id)->with('success', '个人资料更新成功');
    }
}
