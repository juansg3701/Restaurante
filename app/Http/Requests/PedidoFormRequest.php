<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class PedidoFormRequest extends Request
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
          
            'fecha'=>'required|max:45',
            'pago_total'=>'max:45',
            'cliente_id_cliente'=>'required|max:45',
            'tipo_pago_id_tpago'=>'required|max:45',
            'impuesto_id_impuesto'=>'required|max:45',
            'descuento_id_descuento'=>'required|max:45',
            'total_impuesto'=>'|max:45',
            'total_descuento'=>'|max:45',
            'estado'=>'required|max:45',

        ];
    }
}
