<?php

namespace App\Http\Controllers;

use App\Models\FeatureSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChangeFeatureSettings extends Controller
{
    public function __construct()
    {
    }

    public function view(int $id = 1): Response{
        Auth::loginUsingId(1);
        $data = FeatureSettings::where(['id' => 1])->get()->first();
        return response()->view('welcome', $data, Response::HTTP_OK);
    }

    public function change(Request $request): RedirectResponse {
        Auth::loginUsingId(1);
        FeatureSettings::where(['id' => 1])->update([
            'category_name' => $request->get('category_name'),
            'settings' => $request->get('settings'),
            'enable' => intval($request->get('enable')),
            'details' => $request->get('details')
        ]);
        return redirect('/', 302);
    }
}
