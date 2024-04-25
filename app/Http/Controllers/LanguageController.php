<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage($lang)
    {
        // Liste des langues prises en charge
        $supportedLocales = ['en', 'fr']; // Ajoutez ici les codes de langue que vous prenez en charge

        if (in_array($lang, $supportedLocales)) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }
}