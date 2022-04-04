<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\throwException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function edit(){
        return view('member.update');
    }
    public function update(Request $request){
        $request->validate([
            'user_image' => 'required|image|file',
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'confirmed',
             Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);
        if(Hash::check($request->current_password, auth()->user()->password)){
            $name = $request->file('user_image')->store('/uploads/avatars');
            auth()->user()->update([
                'user_image' => $name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('editProfile')->with('success', 'Profile updated successfully');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Current password is incorrect',
        ]);
        return redirect('/home')->with('status','Profile Berhasil Diupdate');
    }
}
