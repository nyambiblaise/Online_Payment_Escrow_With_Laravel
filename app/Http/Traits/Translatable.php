<?php

namespace App\Http\Traits;

use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait Translatable
{
    public static function booted()
    {
        if (Auth::getDefaultDriver() != 'admin') {
            $lang = app()->getLocale();

            if($lang == 'en'){
                $lang ='us';
            }

            $languageId = Language::where('short_name', $lang)->first();


            $defaultLang = Language::first();

            static::addGlobalScope('language', function (Builder $builder) use ($languageId, $defaultLang) {
                $builder->where('language_id', $languageId->id);
            });
        }
    }
}
