<?php 
namespace App\Http\Interfaces;

use App\Models\Setting;
use Illuminate\Http\Request;
interface SettingsRepositoryInterface  {
    public function getAllSettings();

    public function update(Request $request);

}