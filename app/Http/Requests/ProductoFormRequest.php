<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class ProductoFormRequest extends Request
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
        return [
          
            'nombre'=>'required|max:45',
            'cantidad'=>'max:45',
            'precio'=>'required|max:45',
            'descripcion'=>'required|max:45',
            'dia_id_dia'=>'required|max:45',
            'categoria_id_categoria'=>'required|max:45',
            'imagen'=>'|max:2000',
        ];
    }
}
