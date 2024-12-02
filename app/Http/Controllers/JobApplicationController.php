<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ChildrenInformation;
use App\JobApplication;
use App\SiblingInformation;
use App\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use RealRashid\SweetAlert\Facades\Alert;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicant = Applicant::with('jobApplication', 'jobApplication.workExperience')->where('id', auth()->user()->applicant_id)->first();
        
        return view('applicant.applicants', compact('applicant'));
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
        // dd($request->all());
        $job_application = JobApplication::where('applicant_id', auth()->user()->applicant_id)->first();
        
        if ($job_application == null)
        {
            $job_application = new JobApplication;
            $job_application->company_id = $request->company_id;
            $job_application->source = $request->source;
            $job_application->application = $request->application;
            $job_application->employee = $request->employee;
            $job_application->position = $request->position;
            $job_application->minimum_expected_salary = $request->minimum_expected_salary;
            $job_application->date_available_for_employment = $request->date_available_for_employment;
            $job_application->lastname = $request->lastname;
            $job_application->firstname = $request->firstname;
            $job_application->middlename = $request->middlename;
            $job_application->present_house_no = $request->present_house_no;
            $job_application->present_street_name = $request->present_street_name;
            $job_application->present_barangay = $request->present_barangay;
            $job_application->present_municipality = $request->present_municipality;
            $job_application->permanent_house_no = $request->permanent_house_no;
            $job_application->permanent_street_name = $request->permanent_street_name;
            $job_application->permanent_barangay = $request->permanent_barangay;
            $job_application->permanent_municipality = $request->permanent_municipality;
            $job_application->father_name = $request->father_name;
            $job_application->father_occupation = $request->father_occupation;
            $job_application->father_company_location = $request->father_company_location;
            $job_application->father_contact_no = $request->father_contact_no;
            $job_application->mother_name = $request->mother_name;
            $job_application->mother_occupation = $request->mother_occupation;
            $job_application->mother_company_location = $request->mother_company_location;
            $job_application->mother_contact_no = $request->mother_contact_no;
            // $job_application->college_course = $request->course;
            $job_application->college_school_name = $request->college_school_name;
            $job_application->college_school_address = $request->college_school_address;
            $job_application->college_year_attended = $request->college_year_attended;
            $job_application->college_awards = $request->college_awards;
            // $job_application->hs_course = $request->hs_course;
            $job_application->hs_school_name = $request->hs_school_name;
            $job_application->hs_school_address = $request->hs_school_address;
            $job_application->hs_year_attended = $request->hs_year_attended;
            $job_application->hs_awards = $request->hs_awards;
            // $job_application->others_course = $request->others_course;
            $job_application->others_school_name = $request->others_school_name;
            $job_application->others_school_address = $request->others_school_address;
            $job_application->others_year_attended = $request->others_year_attended;
            $job_application->others_awards = $request->others_awards;
            $job_application->licensure_examination = $request->licensure_examination;
            $job_application->rating = $request->rating;
            $job_application->government_examination = $request->government_examination;
            $job_application->gov_rating = $request->gov_rating;
            // $job_application->name_of_company = $request->company_name;
            // $job_application->address_of_company = $request->company_address;
            // $job_application->last_position = $request->last_position;
            // $job_application->last_salary = $request->last_salary;
            // $job_application->employment_period = $request->employment_period;
            // $job_application->company_industry = $request->company_industry;
            // $job_application->reason_for_leaving = $request->reason_for_leaving;
            $job_application->applicant_id = auth()->user()->applicant_id;
            $job_application->contact_number = $request->contact_number;
            $job_application->civil_status = $request->civil_status;
            $job_application->age = $request->age;
            $job_application->gender = $request->gender;
            $job_application->citizenship = $request->citizenship;
            $job_application->date_of_birth = $request->date_of_birth;
            $job_application->place_of_birth = $request->place_of_birth;
            $job_application->same_as = $request->same_as;
            $job_application->have_relative = $request->have_relatives;
            $job_application->employee_name = $request->name_of_employee;
            $job_application->college_degree_program = $request->degree_program;
            $job_application->others_degree_earned = $request->degree_earned;
            $job_application->others_certification_licenses = $request->others_certification_licenses;
            $job_application->save();

            if ($request->has('sibling_name') && $request->sibling_name[0] != null)
            {
                $sibling = SiblingInformation::where('job_application_id', $job_application->id)->delete();
                foreach($request->sibling_name as $key=>$sibling_name)
                {
                    $sibling = new SiblingInformation;
                    $sibling->job_application_id = $job_application->id;
                    $sibling->sibling_name = $sibling_name;
                    $sibling->sibling_occupation = $request->sibling_occupation[$key];
                    $sibling->sibling_company_location = $request->sibling_company_location[$key];
                    $sibling->sibling_contact_no = $request->sibling_contact_no[$key];
                    $sibling->save();
                }
            }

            if ($request->has('children_name') && $request->children_name[0] != null)
            {
                $children = ChildrenInformation::where('job_application_id', $job_application->id)->delete();
                foreach($request->children_name as $key=>$children_name)
                {
                    $children = new ChildrenInformation;
                    $children->job_application_id = $job_application->id;
                    $children->children_name = $children_name;
                    $children->children_occupation = $request->children_occupation[$key];
                    $children->children_company_location = $request->children_company_location[$key];
                    $children->children_contact_no = $request->children_contact_no[$key];
                    $children->save();
                }
            }

            if ($request->has('company_name') && $request->company_name[0] != null)
            {
                $work_experiences = WorkExperience::where('job_application_id', $job_application->id)->delete();
                foreach($request->company_name as $key=>$company_name)
                {
                    $work_experiences = new WorkExperience;
                    $work_experiences->job_application_id = $job_application->id;
                    $work_experiences->name_of_company = $company_name;
                    $work_experiences->address_of_company = $request->company_address[$key];
                    $work_experiences->position = $request->last_position[$key];
                    $work_experiences->employment_period = $request->employment_period[$key];
                    $work_experiences->company_industry = $request->company_industry[$key];
                    $work_experiences->reason_for_leaving = $request->reason_for_leaving[$key];
                    $work_experiences->last_salary = $request->last_salary[$key];
                    $work_experiences->save();
                }
            }

            Alert::success('Successfully Saved')->persistent('Dismiss');
        }
        else
        {
            $this->update($request, $job_application->id);
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
        $job_application = JobApplication::findOrFail($id);
        $job_application->company_id = $request->company_id;
        $job_application->source = $request->source;
        $job_application->application = $request->application;
        $job_application->employee = $request->employee;
        $job_application->position = $request->position;
        $job_application->minimum_expected_salary = $request->minimum_expected_salary;
        $job_application->date_available_for_employment = $request->date_available_for_employment;
        $job_application->lastname = $request->lastname;
        $job_application->firstname = $request->firstname;
        $job_application->middlename = $request->middlename;
        $job_application->present_house_no = $request->present_house_no;
        $job_application->present_street_name = $request->present_street_name;
        $job_application->present_barangay = $request->present_barangay;
        $job_application->present_municipality = $request->present_municipality;
        $job_application->permanent_house_no = $request->permanent_house_no;
        $job_application->permanent_street_name = $request->permanent_street_name;
        $job_application->permanent_barangay = $request->permanent_barangay;
        $job_application->permanent_municipality = $request->permanent_municipality;
        $job_application->father_name = $request->father_name;
        $job_application->father_occupation = $request->father_occupation;
        $job_application->father_company_location = $request->father_company_location;
        $job_application->father_contact_no = $request->father_contact_no;
        $job_application->mother_name = $request->mother_name;
        $job_application->mother_occupation = $request->mother_occupation;
        $job_application->mother_company_location = $request->mother_company_location;
        $job_application->mother_contact_no = $request->mother_contact_no;
        // $job_application->college_course = $request->course;
        $job_application->college_school_name = $request->college_school_name;
        $job_application->college_school_address = $request->college_school_address;
        $job_application->college_year_attended = $request->college_year_attended;
        $job_application->college_awards = $request->college_awards;
        // $job_application->hs_course = $request->hs_course;
        $job_application->hs_school_name = $request->hs_school_name;
        $job_application->hs_school_address = $request->hs_school_address;
        $job_application->hs_year_attended = $request->hs_year_attended;
        $job_application->hs_awards = $request->hs_awards;
        // $job_application->others_course = $request->others_course;
        $job_application->others_school_name = $request->others_school_name;
        $job_application->others_school_address = $request->others_school_address;
        $job_application->others_year_attended = $request->others_year_attended;
        $job_application->others_awards = $request->others_awards;
        $job_application->licensure_examination = $request->licensure_examination;
        $job_application->rating = $request->rating;
        $job_application->government_examination = $request->government_examination;
        $job_application->gov_rating = $request->gov_rating;
        // $job_application->name_of_company = $request->company_name;
        // $job_application->last_position = $request->last_position;
        // $job_application->last_salary = $request->last_salary;
        // $job_application->address_of_company = $request->company_address;
        // $job_application->employment_period = $request->employment_period;
        // $job_application->company_industry = $request->company_industry;
        // $job_application->reason_for_leaving = $request->reason_for_leaving;
        // $job_application->applicant_id = auth()->user()->applicant_id;
        $job_application->contact_number = $request->contact_number;
        $job_application->civil_status = $request->civil_status;
        $job_application->age = $request->age;
        $job_application->gender = $request->gender;
        $job_application->citizenship = $request->citizenship;
        $job_application->date_of_birth = $request->date_of_birth;
        $job_application->place_of_birth = $request->place_of_birth;
        $job_application->same_as = $request->same_as;
        $job_application->have_relative = $request->have_relatives;
        $job_application->employee_name = $request->name_of_employee;
        $job_application->college_degree_program = $request->degree_program;
        $job_application->others_degree_earned = $request->degree_earned;
        $job_application->others_certification_licenses = $request->others_certification_licenses;
        $job_application->save();

        if ($request->has('sibling_name') && $request->sibling_name[0] != null)
        {
            $sibling = SiblingInformation::where('job_application_id', $job_application->id)->delete();
            foreach($request->sibling_name as $key=>$sibling_name)
            {
                $sibling = new SiblingInformation;
                $sibling->job_application_id = $job_application->id;
                $sibling->sibling_name = $sibling_name;
                $sibling->sibling_occupation = $request->sibling_occupation[$key];
                $sibling->sibling_company_location = $request->sibling_company_location[$key];
                $sibling->sibling_contact_no = $request->sibling_contact_no[$key];
                $sibling->save();
            }
        }

        if ($request->has('children_name') && $request->children_name[0] != null)
        {
            $children = ChildrenInformation::where('job_application_id', $job_application->id)->delete();
            foreach($request->children_name as $key=>$children_name)
            {
                $children = new ChildrenInformation;
                $children->job_application_id = $job_application->id;
                $children->children_name = $children_name;
                $children->children_occupation = $request->children_occupation[$key];
                $children->children_company_location = $request->children_company_location[$key];
                $children->children_contact_no = $request->children_contact_no[$key];
                $children->save();
            }
        }

        if ($request->has('company_name') && $request->company_name[0] != null)
        {
            $work_experiences = WorkExperience::where('job_application_id', $job_application->id)->delete();
            foreach($request->company_name as $key=>$company_name)
            {
                $work_experiences = new WorkExperience;
                $work_experiences->job_application_id = $job_application->id;
                $work_experiences->name_of_company = $company_name;
                $work_experiences->address_of_company = $request->company_address[$key];
                $work_experiences->position = $request->last_position[$key];
                $work_experiences->employment_period = $request->employment_period[$key];
                $work_experiences->company_industry = $request->company_industry[$key];
                $work_experiences->reason_for_leaving = $request->reason_for_leaving[$key];
                $work_experiences->last_salary = $request->last_salary[$key];
                $work_experiences->save();
            }
        }

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

    public function printJobApplicationForm($id)
    {
        $job_application = JobApplication::with('siblingInformation', 'childrenInformation', 'company')->findOrFail($id);
        
        $data = [];
        $data['job_application'] = $job_application;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('applicant.print_job_application', $data)->setPaper('legal', 'portrait');
        return $pdf->stream();
    }
}
