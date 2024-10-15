<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        return view('human_resources.document', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_file' => 'max:1024'
        ], [
            'document_file.max' => 'The file is exceed in 1MB'
        ]);

        $attachment = $request->file('document_file');
        $name = time().'_'.$attachment->getClientOriginalName();
        $attachment->move(public_path('documents'),$name);
        $document_file = '/documents/'.$name;

        $document = new Document;
        $document->document_name = $request->document_name;
        $document->document_file = $document_file;
        $document->document_status = 'Active';
        $document->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'document_file' => 'max:1024'
        ], [
            'document_file.max' => 'The file is exceed in 1MB'
        ]);

        $document = Document::findOrFail($id);
        $document->document_name = $request->document_name;
        $document->document_status = $request->document_status;
        if ($request->has('document_file'))
        {
            $attachment = $request->file('document_file');
            $name = time().'_'.$attachment->getClientOriginalName();
            $attachment->move(public_path('documents'),$name);
            $document_file = '/documents/'.$name;

            $document->document_file = $document_file;
        }
        $document->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
