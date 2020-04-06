<?php


namespace App\FormRequests;


use Illuminate\Foundation\Http\FormRequest;

abstract class IRFormRequest extends FormRequest
{
    /**
     * @return mixed
     */
    abstract public function rules();

    /**
     * @return mixed
     */
    abstract public function authorize();

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

}
