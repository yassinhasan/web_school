<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SettingsRepositoryInterface;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    private SettingsRepositoryInterface $settings;
    public function __construct(SettingsRepositoryInterface $settingsRepositoryInterface)
    {
        $this->settings = $settingsRepositoryInterface;
    }
    public function index()
    {
       return $this->settings->getAllSettings();
    }

    public function update(Request $request)
    {
         return $this->settings->update($request);
    }


}
