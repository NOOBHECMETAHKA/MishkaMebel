<?php

namespace App\Http\Controllers\ControlContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DeveloperConsoleController extends Controller
{
    public function index(){
        $logsFilePath = storage_path('/logs/actions.log');
        $logs = "";

        if (file_exists($logsFilePath)) {
            $logs = file_get_contents($logsFilePath);
        }

        return View('admin-page.console-developer', compact('logs'));
    }

    public function destroy(){
        $logsFilePath = storage_path('/logs/actions.log');

        if (file_exists($logsFilePath)) {
            unlink($logsFilePath);
        }

        return redirect()->back();
    }
}
