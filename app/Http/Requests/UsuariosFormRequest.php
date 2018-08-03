<?php

namespace realestate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;
use realestate\User;

class UsuariosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $usuario = User::find($this->segment(2));
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'nombre' => 'required|string|max:255',
                    'usuario' => 'required|string|max:255|unique:users,usuario',
                    'email' => 'required|string|email|max:255|unique:users,email',
                    'password' => 'required|string|min:6|confirmed',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombre' => 'required|string|max:255',
                    'usuario' => 'required|string|max:255|unique:users,usuario,'.$usuario->id,
                    'email' => 'required|string|email|max:255|unique:users,email,'.$usuario->id,
                    'password' => 'string|min:6|confirmed',
                ];
            }
            default:break;
        }
    }
}
