<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class LocaleController extends Controller
{
    //
    public function changeLocale(Request $request)
    {
        $request->validate([
            'language' => 'required|in:en,de,fr',
        ]);
    
        $locale = $request->input('language');
        app()->setLocale($locale);
        session(['locale' => $locale]);
        $translatedText = trans('Login');
      //  dd($translatedText);
    
        // Add debugging statements
       // dd($locale); // Check if $locale has the correct value
    
        return response()->json(['message' => 'Language changed successfully']);
    
    }
}
    // public function changeLocale(Request $request, $locale)
    // {
    //     // App::setLocale($locale);
    //     // session(['locale' => $locale]);

    //     // return response()->json(['success' => true]);
    //     if (in_array($locale, ['en', 'de'])) {
    //         App::setLocale($locale);
    //         session(['locale' => $locale]);
    //     }
    
    //     return redirect()->back(); // Redirect back to the previous page
    // }
//     public function getTranslations()
// {
//     $translations = [];

//     // Add translations for the keys you want to fetch
//     $translations['login'] = Lang::get('messages.Login');
//     return response()->json($translations);
// }
