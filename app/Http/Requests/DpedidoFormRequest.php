<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class DpedidoFormRequest extends Request
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
            'cantidad'=>'required|max:45',
            'total'=>'max:45',
            'descuento'=>'max:45',
            'impuesto'=>'max:45',
            'producto_id_producto'=>'required|max:45',
            'impuesto_id_impuesto'=>'max:45',
            'pedido_id_pedido'=>'max:45',
            'descuento_id_descuento'=>'max:45',
        ];
    }
}
