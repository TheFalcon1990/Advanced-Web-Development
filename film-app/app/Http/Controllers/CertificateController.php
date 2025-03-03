<?php
namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    function index()
    {
        $certificates = Certificate::all();
        return view('certificates.index', ['certificates' => $certificates]);
    }
}