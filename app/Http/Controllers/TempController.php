<?php

namespace App\Http\Controllers;

use App\Temp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        $file = new Temp;
        $file->name = $request->file('file')->getClientOriginalName();
        $file->path = Storage::putFile('temp', $request->file('file') );
        $file->save();
        return 'temp/'. $file->id .'/download';
    }

    /**
     * Returns a file from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Temp $temp)
    {
        return response()->download(Storage::disk()->getDriver()->getAdapter()->applyPathPrefix($temp->path));       
    }
    
    public function destroy()
    {
        Temp::truncate();
        Storage::deleteDirectory('temp');
    }
}
