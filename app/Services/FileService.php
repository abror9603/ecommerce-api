<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Services\Service;

class FileService extends Service
{
    public function checkUserPhoto(RegisterRequest $request, $user)
    {
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('users/' . $user->id, 'public');

            $user->photos()->create([
                'full_name' => $request->file('photo')->getClientOriginalName(),
                'path' => $path,
            ]);
        }
    }
}