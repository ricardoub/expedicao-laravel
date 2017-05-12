<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskFormRequest extends FormRequest
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
      'name'       => 'required',
      'priority'   => 'required|numeric|min:1',
      'percentage' => 'required|numeric|min:0|max:100',
      'status'     => 'required|numeric|min:1'
    ];
  }
  public function messages()
  {
    return [
      'name.required'       => 'O campo nome é obrigatório',
      'priority.required'   => 'O campo prioridade é obrigatório',
      'priority.numeric'    => 'O campo prioridade deve ser numérico',
      'priority.min'        => 'O campo prioridade deve ser igual ou maior que 1',
      'percentage.required' => 'O campo porcentage é obrigatório',
      'percentage.numeric'  => 'O campo porcentage deve ser numérico',
      'percentage.min'      => 'O campo porcentage deve ser igual ou maior que 0',
      'percentage.max'      => 'O campo porcentage deve ser igual ou menor que 100',
      'status.required'     => 'O campo situação é obrigatório',
      'status.min'          => 'O campo situação deve ser selecionado',
    ];
  }

}
