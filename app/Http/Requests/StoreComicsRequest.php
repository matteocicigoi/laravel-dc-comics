<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:90',
            'description' => 'required|min:15|max:5000',
            'thumb' => 'required|min:5|max:500',
            'price' => 'required|numeric|between:0,99.99',
            'series' => 'required|min:3|max:40',
            'sale_date' => 'required|date',
            'type' => 'required|min:1|max:20',
            'artists' => 'required|max:1000',
            'writers' => 'required|max:1000',
            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo del titolo è obbligatorio.',
            'title.min' => 'Il campo del titolo deve essere lungo almeno :min caratteri.',
            'title.max' => 'Il campo del titolo non deve superare i :max caratteri.',

            'description.required' => 'Il campo della descrizione è obbligatorio.',
            'description.min' => 'Il campo della descrizione deve essere lungo almeno :min caratteri.',
            'description.max' => 'Il campo della descrizione non deve superare i :max caratteri.',

            'thumb.required' => 'Il campo del immagine è obbligatorio.',
            'thumb.min' => 'Il campo del immagine deve essere lungo almeno :min caratteri.',
            'thumb.max' => 'Il campo del immagine non deve superare i :max caratteri.',

            'price.required' => 'Il campo del prezzo è obbligatorio.',
            'price.numeric' => 'Il campo del prezzo deve essere numerico.',
            'price.between' => 'Il campo del prezzo deve essere compreso tra 0 e 99.99.',

            'series.required' => 'Il campo delle serie è obbligatorio.',
            'series.min' => 'Il campo delle serie deve essere lungo almeno :min caratteri.',
            'series.max' => 'Il campo delle serie non deve superare i :max caratteri.',

            'sale_date.required' => 'Il campo della data è obbligatorio.',
            'sale_date.date' => 'Il campo della data deve essere una data valida.',

            'type.required' => 'Il campo del tipo è obbligatorio.',
            'type.min' => 'Il campo del tipo deve essere lungo almeno :min caratteri.',
            'type.max' => 'Il campo del tipo non deve superare i :max caratteri.',

            'artists.required' => 'Il campo degli artisti è obbligatorio.',
            'artists.max' => 'Il campo degli artisti deve essere lungo almeno :max caratteri.',

            'writers.required' => 'Il campo degli scrittori è obbligatorio.',
            'writers.max' => 'Il campo degli scrittori deve essere lungo almeno :max caratteri.',
        ];
    }
}
