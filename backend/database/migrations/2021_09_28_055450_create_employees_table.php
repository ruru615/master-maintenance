<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('empNumber');
            $table->date('enterDay');
            $table->integer('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('lastKana');
            $table->string('firstKana');
            $table->string('realLast');
            $table->string('realFirst');
            $table->string('realLastKana');
            $table->string('realFirstKana');
            $table->date('birthDay');
            $table->string('sexType');
            $table->string('nationality');
            $table->integer('personalNumber');
            $table->string('bloodType1');
            $table->string('bloodType2');
            $table->string('driversLicenseCategory');
            $table->integer('driversLicenseNumber');
            $table->string('disabilityCertificate');
            $table->integer('residenceCardNumber');
            $table->string('workVisa');
            $table->string('assignName');
            $table->string('positionCategory');
            $table->date('positionStartDay');
            $table->string('workplace1');
            $table->string('workplace2');
            $table->string('workplace3');
            $table->string('companyMail');
            $table->string('privateMail');
            $table->integer('companyMobile');
            $table->integer('privateMobile');
            $table->integer('privateTel');
            $table->integer('emergency1');
            $table->integer('emergency2');
            $table->string('postalCode');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3');
            $table->string('householder');
            $table->string('educationCategory');
            $table->string('finalEducation1');
            $table->string('finalEducation2');
            $table->string('finalEducation3');
            $table->year('educationYear');
            $table->string('hiringCategory');
            $table->string('employmentCategory');
            $table->integer('salaryNumber');
            $table->integer('pensionNumber');
            $table->integer('insuranceNumber');
            $table->string('leaveFrag');
            $table->date('leaveDate');
            $table->integer('leaveMonths');
            $table->year('experienceYears');
            $table->date('exitDay');
            $table->string('deleteFlag');
            $table->date('insertDate');
            $table->integer('insertNumber');
            $table->integer('updateNumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
