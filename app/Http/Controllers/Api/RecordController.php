<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Record;

class RecordController extends Controller
{
    public function index(){
        return Record::all();
    }

    function store(Request $req){
        $newRecord = Record::create($req->all());
        return $newRecord;
    }
}
