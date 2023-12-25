<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

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
