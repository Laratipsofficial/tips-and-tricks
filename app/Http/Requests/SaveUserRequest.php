<?php

namespace App\Http\Requests;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\File;

class SaveUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'name' => ['required'],
            // 'email' => ['required', 'email'],
            // 'password' => ['required'],

            // 'name' => ['required', Rule::unique(User::class)],
            // 'image' => ['required', (new File)->image()->max(2 * 1024)],
            // 'type' => ['required', new Enum(UserTypeEnum::class)],

            'name' => ['required', Rule::unique(User::class)],
            // 'image' => ['required', Rule::file()->image()->max(2 * 1024)],
            // 'type' => ['required', Rule::enum(UserTypeEnum::class)],
        ];
    }
}
