<?php

namespace App\Http\Controllers\Api\V1\Transformer;

use App\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract {

    public function transform(Contact $model) {
        return [
            'first_name' => $model->first_name,
            'last_name' => $model->last_name,
            'email' => $model->email,
            'city' => $model->city,
            'country' => $model->country,
            'job_title'=> $model->job_title
        ];
    }
}
