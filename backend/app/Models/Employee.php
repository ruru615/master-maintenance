<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'empNumber',
        'enterDay',
        'id',
        'lastName',
        'firstName',
        'lastKana',
        'firsKana',
        'realLast',
        'realFirst',
        'realLastKana',
        'realFirstKana',
        'birthDay',
        'sexType',
        'nationality',
        'personalNumber',
        'bloodType1',
        'bloodType2',
        'driversLicenseCategory',
        'driversLicenseNumber',
        'disabilityCertificate',
        'residenceCardNumber',
        'workVisa',
        'assignName',
        'positionCategory',
        'positionStartDay',
        'workplace1',
        'workplace2',
        'workplace3',
        'companyMail',
        'privateMail',
        'companyMobile',
        'privateMobile',
        'privateTel',
        'emergency1',
        'emergency2',
        'postalCode',
        'address1',
        'address2',
        'address3',
        'householder',
        'educationCategory',
        'finalEducation1',
        'finalEducation2',
        'finalEducation3',
        'educationYear',
        'hiringCategory',
        'employmentCategory',
        'salaryNumber',
        'pensionNumber',
        'insuranceNumber',
        'leaveFrag',
        'leaveDate',
        'leaveMonths',
        'experienceYears',
        'exitDay',
        'deleteFlag',
        'insertDate',
        'insertNumber',
        'updateDate',
        'updateNumber'
    ];

    public $sortable = [
        'empNumber',
        'id',
        'lastName'
    ];
}

