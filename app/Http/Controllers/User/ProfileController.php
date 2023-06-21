<?php

namespace App\Http\Controllers\User;

use App\Models\Zh_user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        //Метод find возвращает модель, у которой есть первичный ключ, соответствующий переданному ключу.
        //а можно передать не один ключ, а несколько массивом и получим несколько записей из БД
        $userId = 1;
        $user = Zh_user::query()
            ->where('status', 'A')
            ->where('user_type', 'U')
            ->findOrFail($userId,
                    [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'telegram',
                    ]);

        return view('profile.index', compact('user'));
    }

    public function edit(Request $request)
    {
        // dd($request);
        // $user = $request->user();это когда будет авторизация, то получать айди юзера вот так
        $user = Zh_user::query()
            ->findOrFail(1);

        $validatedUserData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:100', 'email', Rule::unique('zh_users')->ignore($user->id)],
            'current_password' => ['nullable', 'required_with:new_password', 'string', 'current_password'],
            'new_password' => ['nullable', 'string', 'min:7', 'max:50'],
            'phone' => ['nullable', 'string', Rule::unique('zh_users', 'phone')->ignore($user)],
            'telegram' => ['nullable', 'string', 'max:128'],
            
        ]);

        // Отсеивание, какие данные нужны для обновления в запросе
        $dataToUpdate = getUpdateData($validatedUserData);
        // }

        // вопрос с тем, как заполнять поля для обновления, чтобы не перезаписывать всё
        $user->update($dataToUpdate);

        return view('profile.index', compact('user'));
    }
}
