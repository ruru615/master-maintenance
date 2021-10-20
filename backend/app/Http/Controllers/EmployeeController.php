<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $employees = Employee::all();
        return view('employee.index', compact('employees'));

        return view('employee.index', ['employees' => Employee::sort($request -> employeeSort)]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $employees = Employee::query()
                ->when($search, function ($q) use ($search) {
                    $q->where('empNumber', 'like', "%{$search}%")
                        ->orWhere('id', 'like', "%{$search}%")
                        ->orWhere('lastName', 'like', "%{$search}%")
                        ->orWhere('firstName', 'like', "%{$search}%");
                })->get();
    
        return view('employee.index', compact('search', 'employees'));
    }

    public function sort($select) {
        if($select == 'empNumber'){
            return $this->orderBy('emplNumber', 'asc')->get();
        } elseif($select == 'id') {
            return $this->orderBy('id', 'asc')->get();
        } elseif($select == 'lastName') {
                return $this->orderBy('lastName', 'asc')->get();
        } else {
            return $this->all();
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id' => 'required|unique:employees|max:20',
            'enterDay' => 'required|before_or_equal',
            'lastName' => 'max:20',
            'firstName' => 'max:20',
            'lastKana' => 'max:20',
            'firsKana' => 'max:20',
            'realLast' => 'max:20',
            'realFirst' => 'max:20',
            'realLastKana' => 'max:20',
            'realFirstKana' => 'max:20',
            'birthDay' => 'before_or_equal',
            'personalNumber' => 'unique:employees|max:12',
            'driversLicenseNumber' => 'unique:employees|max:12',
            'residenceCardNumber' => 'unique:employees|max:12',
            'assignName' => 'max:20',
            'workplace1' => 'max:50',
            'workplace2' => 'max:50',
            'workplace3' => 'max:50',
            'companyMail' => 'unique:employees|max:256',
            'privateMail' => 'unique:employees|max:256',
            'companyMobile' => 'unique:employees|max:15',
            'privateMobile' => 'unique:employees|max:15',
            'privateTel' => 'unique:employees|max:15',
            'emergency1' => 'max:15',
            'emergency2' => 'max:15',
            'postalCode' => 'max:7',
            'address1' => 'max:20',
            'address2' => 'max:40',
            'address3' => 'max:50',
            'finalEducation1' => 'max:30',
            'finalEducation2' => 'max:20',
            'finalEducation3' => 'max:20',
            'educationYear' => 'max:4',
            'salaryNumber' => 'unique:employees|max:6',
            'pensionNumber' => 'unique:employees|max:10',
            'insuranceNumber' => 'unique:employees|max:8',
            'leaveDate' => 'max:20',
            'leaveMonths' => 'max:2',
            'experienceYears' => 'max:2',
        ],
        [
            'id.required' => 'IDは必須です',
            'enterDay' => '入社年月日は必須です',
        ]);
        Employee::create($request->all());
        return redirect()->route('employee.index')->with('success', 'データが登録されました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $empNumber
     * @return \Illuminate\Http\Response
     */
    public function show($empNumber)
    {
        //
        $employee = Employee::find($empNumber);
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $empNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $empNumber)
    {
        //
        $employee = Employee::find($empNumber);
        return view('employee.edit',compact('employee'));

        $post = new POST;
        $form = $request->all();
        $rules = [
            'lastName' => 'required',
            'firstName' => 'required',
            'lastKana' => 'required',
            'firstKana' => 'required', 
        ];
        $message = [
            'lastName.required'=> '姓が入力されていません',
            'firstName.required'=> '名が入力されていません',
            'lastKana.required' => '姓カナが入力されていません',
            'firstKana.integer' => '名カナが入力されていません',
        ];

        $validator = Validator::make($form, $rules, $message);

        if($validator->fails()){
            return redirect('employee/index')
                ->withErrors($validator)
                ->withInput();
        }else{
            unset($form['_token']);
            $post->lastName = $request->lastName;
            $post->firstName = $request->firstName;
            $post->lastKana = $request->lastKana;
            $post->firstKana = $request->firstKana;
            $post->save();
            return redirect('employee/index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $empNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $empNumber)
    {
        //
        $update = [
            'id' => $request -> id,
            'enterDay' => $request -> enterDay,
            'lastName' => $request -> lastName,
            'firstName' => $request -> firstName,
            'lastKana' => $request -> lastKana,
            'firstKana' => $request -> firstKana,
            'realLast' => $request -> realLast,
            'realFirst' => $request -> realFirst,
            'realLastKana' => $request -> realLastKana,
            'realFirstKana' => $request -> realFirstKana,
            'birthDay' => $request -> birthDay,
            'sexType' => $request -> sexType,
            'nationality' => $request -> nationality,
            'personalNumber' => $request -> personalNumber,
            'bloodType1' => $request -> bloodType1,
            'bloodType2' => $request -> bloodType2,
            'driversLicenseCategory' => $request -> driversLicenseCategory,
            'driversLicenseNumber' => $request -> driversLicenseNumber,
            'disabilityCertificate' => $request -> disabilityCertificate,
            'residenceCardNumber' => $request -> residenceCardNumber,
            'workVisa' => $request -> workVisa,
            'assignName' => $request -> assignName,
            'positionCategory' => $request -> positionCategory,
            'positionStartDay' => $request -> positionStartDay,
            'workplace1' => $request -> workplace1,
            'workplace2' => $request -> workplace2,
            'workplace3' => $request -> workplace3,
            'companyMail' => $request -> companyMail,
            'privateMail' => $request -> privateMail,
            'companyMobile' => $request -> companyMobile,
            'privateMobile' => $request -> privateMobile,
            'privateTel' => $request -> privateTel,
            'emergency1' => $request -> emergency1,
            'emergency2' => $request -> emergency2,
            'postalCode' => $request -> postalCode,
            'address1' => $request -> address1,
            'address2' => $request -> address2,
            'address3' => $request -> address3,
            'householder' => $request -> householder,
            'educationCategory' => $request -> educationCategory,
            'finalEducation1' => $request -> finalEducation1,
            'finalEducation2' => $request -> finalEducation2,
            'finalEducation3' => $request -> finalEducation3,
            'educationYear' => $request -> educationYear,
            'hiringCategory' => $request -> hiringCategory,
            'employmentCategory' => $request -> employmentCategory,
            'salaryNumber' => $request -> salaryNumber,
            'pensionNumber' => $request -> pensionNumber,
            'insuranceNumber' => $request -> insuranceNumber,
            'leaveFrag' => $request -> leaveFrag,
            'leaveDate' => $request -> leaveDate,
            'leaveMonths' => $request -> leaveMonths,
            'experienceYears' => $request -> experienceYears,
            'exitDay' => $request -> exitDay,
        ];
        Employee::where('empNumber', $empNumber) ->update($update);
        return redirect()->route('employee.index')->with('success', '編集が完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $empNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy($empNumber)
    {
        //
        Employee::where('empNumber', $empNumber)->delete();
        return redirect()->route('employee.index')->with('success', '削除しました');
    }
}
