<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

trait HelperTrait
{
    public string $validationPhone = 'regex:/^((\+)?(\d)(\s)?(\()?[0-9]{3}(\))?(\s)?([0-9]{3})(\-)?([0-9]{2})(\-)?([0-9]{2}))$/';
    public string $validationPassword = 'required|confirmed|min:3|max:50';
    public string $validationDate = 'regex:/^(\d{2})\/(\d{2})\/(\d{4})$/';

    public function saveCompleteMessage()
    {
        session()->flash('message', trans('admin.save_complete'));
    }

    public function getRequestValidation()
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => $this->validationPhone,
//            'text' => 'max:300',
            'i_agree' => 'required|accepted'
        ];
    }

    private $metas = [
        'meta_description' => ['name' => 'description', 'property' => false],
        'meta_keywords' => ['name' => 'keywords', 'property' => false],
        'meta_twitter_card' => ['name' => 'twitter:card', 'property' => false],
        'meta_twitter_size' => ['name' => 'twitter:size', 'property' => false],
        'meta_twitter_creator' => ['name' => 'twitter:creator', 'property' => false],
        'meta_og_url' => ['name' => false, 'property' => 'og:url'],
        'meta_og_type' => ['name' => false, 'property' => 'og:type'],
        'meta_og_title' => ['name' => false, 'property' => 'og:title'],
        'meta_og_description' => ['name' => false, 'property' => 'og:description'],
        'meta_og_image' => ['name' => false, 'property' => 'og:image'],
        'meta_robots' => ['name' => 'robots', 'property' => false],
        'meta_googlebot' => ['name' => 'googlebot', 'property' => false],
        'meta_google_site_verification' => ['name' => 'google-site-verification', 'property' => false],
    ];

    public function processingFile(Request $request, $field, $path, $newFileName)
    {
//        $fileName = $request->file($field)->getClientOriginalName();
//        $fileName = $request->file($field)->getClientOriginalExtension();
        if ($request->hasFile($field)) $request->file($field)->move(base_path('public/'.$path), $newFileName);
    }
}
