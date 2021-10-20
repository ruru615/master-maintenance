<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'empNumber'=>$this->faker->randomNumber(),
            'enterDay'=>$this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')->format('Y/m/d'),
            'id'=>$this->faker->randomNumber(),
            'lastName'=>$this->faker->lastName(20),
            'firstName'=>$this->faker->firstName(20),
            'lastKana'=>$this->faker->lastName(20),
            'firstKana'=>$this->faker->firstName(20),
            'realLast'=>$this->faker->lastName(20),
            'realFirst'=>$this->faker->firstName(20),
            'realLastKana'=>$this->faker->lastName(20),
            'realFirstKana'=>$this->faker->firstName(20),
            'birthDay'=>$this->faker->dateTimeBetween($startDate = '-23 years', $endDate = 'now')->format('Y/m/d'),
            'sexType'=>$this->faker->randomElement($array=['男性','女性']),
            'nationality'=>$this->faker->country(),
            'personalNumber'=>$this->faker->randomNumber(),
            'bloodType1'=>$this->faker->bloodType(),
            'bloodType2'=>$this->faker->bloodType(),
            'driversLicenseCategory'=>$this->faker->word(),
            'driversLicenseNumber'=>$this->faker->randomNumber(),
            'disabilityCertificate'=>$this->faker->word(),
            'residenceCardNumber'=>$this->faker->randomNumber(),
            'workVisa'=>$this->faker->word(),
            'assignName'=>$this->faker->jobTitle(),
            'positionCategory'=>$this->faker->jobTitle(),
            'positionStartDay'=>$this->faker->date($format = 'Y/m/d', $max = 'now'),
            'workplace1'=>$this->faker->city(),
            'workplace2'=>$this->faker->city(),
            'workplace3'=>$this->faker->citySuffix(),
            'companyMail'=>$this->faker->address(),
            'privateMail'=>$this->faker->address(),
            'companyMobile'=>$this->faker->phoneNumber(),
            'privateMobile'=>$this->faker->phoneNumber(),
            'privateTel'=>$this->faker->phoneNumber(),
            'emergency1'=>$this->faker->phoneNumber(),
            'emergency2'=>$this->faker->phoneNumber(),
            'postalCode'=>$this->faker->postcode(),
            'address1'=>$this->faker->country(),
            'address2'=>$this->faker->streetAddress(),
            'address3'=>$this->faker->buildingNumber(),
            'householder'=>$this->faker->word(),
            'educationCategory'=>$this->faker->word(),
            'finalEducation1'=>$this->faker->word(),
            'finalEducation2'=>$this->faker->word(),
            'finalEducation3'=>$this->faker->word(),
            'educationYear'=>$this->faker->year(),
            'hiringCategory'=>$this->faker->word(),
            'employmentCategory'=>$this->faker->word(),
            'salaryNumber'=>$this->faker->randomNumber(6, false),
            'pensionNumber'=>$this->faker->randomNumber(),
            'insuranceNumber'=>$this->faker->randomNumber(8, false),
            'leaveFrag'=>$this->faker->word(),
            'leaveDate'=>$this->faker->date($format = 'Y/m/d', $max = 'now'),
            'leaveMonths'=>$this->faker->month(),
            'experienceYears'=>$this->faker->randomNumber(2, false),
            'exitDay'=>$this->faker->date($format = 'Y/m/d', $max = 'now'),
            'deleteFlag'=>$this->faker->word(),
            'insertDate'=>$this->faker->date($format = 'Y/m/d', $max = 'now'),
            'insertNumber'=>$this->faker->randomNumber(),
            'updateNumber'=>$this->faker->randomNumber(),
            'created_at'=>$this->faker->date($format = 'Y/m/d', $max = 'now'),
            'updated_at'=>$this->faker->date($format = 'Y/m/d', $max = 'now'), 
        ];
    }
}
