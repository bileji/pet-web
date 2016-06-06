<?php
/**
 * this source file is QiniuController.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-04-24 20-54
 */
namespace App\Http\Controllers;

use App\Http\Services\QiniuService;
use Illuminate\Support\Facades\Request;

class QiniuController extends Controller
{
    public function token()
    {
        return QiniuService::token(Request::all());
    }
}