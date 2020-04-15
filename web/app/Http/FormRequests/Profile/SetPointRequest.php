<?php


    namespace App\Http\FormRequests\Profile;


    use App\Http\FormRequests\IRFormRequest;

    class SetPointRequest extends IRFormRequest
    {

        /**
         * @inheritDoc
         */
        public function rules()
        {
            return [
                'longitude' => 'numeric',
                'lattitude' => 'numeric',
                'address'   => 'required|unique:buildings,address',
            ];
        }

        /**
         * @inheritDoc
         */
        public function authorize()
        {
            return TRUE;
        }
    }
