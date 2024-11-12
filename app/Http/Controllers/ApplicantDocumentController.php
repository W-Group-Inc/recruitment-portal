<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ApplicantDocument;
use App\Document;
use App\Notifications\ReturnApplicantDOcuments;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ApplicantDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::with('applicantDocument')
            ->where('document_status', 'Active')
            ->get();
        
        return view('applicant.applicant_document', compact('documents'));
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
            'document_form' => 'max:1024'
        ]);

        $applicant_document = ApplicantDocument::where('applicant_id', $request->applicant_id)->where('document_id', $request->document_id)->first();
        
        if ($applicant_document == null)
        {
            $attachment = $request->file('document_form');
            $name = time().'_'.$attachment->getClientOriginalName();
            $attachment->move(public_path('applicant_documents'), $name);
            $document_name = $name;
            $document_file = '/applicant_documents/'.$name;
    
            $applicant_document = new ApplicantDocument;
            $applicant_document->document_id = $request->document_id;
            $applicant_document->applicant_id = $request->applicant_id;
            $applicant_document->document_name = $document_name;
            $applicant_document->document_file = $document_file;
            $applicant_document->status = 'Submitted';
            $applicant_document->save();

            Alert::success('Successfully Saved')->persistent('Dismiss');
        }
        else
        {
            $this->update($request,$applicant_document->id);
        }


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
        $applicant_document = ApplicantDocument::findOrFail($id);
        $applicant_document->document_id = $request->document_id;
        $applicant_document->applicant_id = $request->applicant_id;
        $applicant_document->status = 'Submitted';

        if ($request->has('document_file'))
        {
            $attachment = $request->file('document_form');
            $name = time().'_'.$attachment->getClientOriginalName();
            $attachment->move(public_path('applicant_documents'), $name);
            $document_name = $name;
            $document_file = '/applicant_documents/'.$name;
            
            $applicant_document->document_name = $document_name;
            $applicant_document->document_file = $document_file;
        }

        $applicant_document->save();

        Alert::success('Successfully Updated')->persistent('Dismiss');
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

    public function returnedDocument(Request $request, $id)
    {
        $applicant_document = ApplicantDocument::where('document_id', $id)->where('applicant_id', $request->applicant_id)->first();
        $applicant_document->status = 'Returned';
        $applicant_document->remarks = $request->remarks;
        $applicant_document->save();

        $applicant = Applicant::where('id', $request->applicant_id)->first();
        $applicant->notify(new ReturnApplicantDOcuments($applicant, $applicant_document));
        
        Alert::success('Successfully Returned')->persistent('Dismiss');
        return back();
    }
}
