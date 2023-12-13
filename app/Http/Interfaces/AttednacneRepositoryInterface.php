<?php 
namespace App\Http\Interfaces;


use Illuminate\Http\Request;
interface AttednacneRepositoryInterface {
    public function index();
    public function destroy(Request $request);
    public function store(Request $request);
    public function update(Request $request);

}