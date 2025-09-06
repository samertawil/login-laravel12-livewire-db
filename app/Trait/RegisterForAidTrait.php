<?php

namespace App\Trait;



use App\Enums\YesNoType;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Database\Eloquent\Model;

trait RegisterForAidTrait
{
    #[Validate('regex:/^\d{10,15}$/', message: 'خطأ بصيخة الادخال يجب ان يكون كالمثال  0591234567')]
    #[Validate('required', message: 'حقل رقم الخليوي الاساسي مطلوب')]
    public  string $mobile_primary = '';
    #[Validate('regex:/^\d{10,15}$/', message: 'خطأ بصيخة الادخال يجب ان يكون كالمثال  0591234567')]
    #[Validate('nullable')]
    public  string|null $mobile_secondary = null;

    #[Validate('required')]
    public  int|null  $region_id = null;
    #[Validate('required')]
    public  int|null  $city_id = null;
    #[Validate('required')]
    public   int|null $neighbourhood_id = null;
    #[Validate('required')]
    public  int|null $e_home_type = null;
    #[Validate('required_unless:e_home_type,41', message: 'مطلوب ادخال الحقل')]
    public  int|null  $e_region_id = null;
    #[Validate('required_unless:e_home_type,41', message: 'مطلوب ادخال الحقل')]
    public  int|null $e_city_id = null;
    #[Validate('required_unless:e_home_type,41', message: 'مطلوب ادخال الحقل')]
    public  int|null $e_neighbourhood_id = null;
    #[Validate('required_unless:e_home_type,41', message: 'مطلوب ادخال الحقل')]
    public  int|null $e_full_address = null;
    #[Validate('required')]
    public int|null $wife_pregnant = null;
    #[Validate('required')]
    public int|null $wife_breastfeeding = null;
    #[Validate('required')]
    public int|null $mental_disability = null;
    public int|null $count_mental_disability = 0;
    #[Validate('required')]
    public int|null $physical_impairment = null;
    public int|null $count_physical_impairment = 0;
    #[Validate('required')]
    public int|null $hearing_impairment = null;
    public int|null $count_hearing_impairment = 0;
    #[Validate('required')]
    public int|null $visual_impairment = null;
    public int|null $count_visual_impairment = 0;
    #[Validate('required')]
    public int|null $diabetes = null;
    public int|null $count_diabetes = 0;
    #[Validate('required')]
    public int|null $blood_pressure = null;
    public int|null $count_blood_pressure = 0;
    #[Validate('required')]
    public int|null $cancer = null;
    public int|null $count_cancer = 0;
    #[Validate('required')]
    public int|null $Kidney_failure = null;
    public int|null $count_Kidney_failure = 0;

    protected Model|null  $personalData = null;

    protected int|null $familyCount = null;

    public int $UserIdc = 0;

    public function rules(): array
    {
        return [
            'wife_pregnant' => [Rule::enum(YesNoType::class)],
            'wife_breastfeeding' => [Rule::enum(YesNoType::class)],
            'mental_disability' => [Rule::enum(YesNoType::class)],
            'physical_impairment' => [Rule::enum(YesNoType::class)],
            'hearing_impairment' => [Rule::enum(YesNoType::class)],
            'visual_impairment' => [Rule::enum(YesNoType::class)],
            'diabetes' => [Rule::enum(YesNoType::class)],
            'blood_pressure' => [Rule::enum(YesNoType::class)],
            'cancer' => [Rule::enum(YesNoType::class)],
            'Kidney_failure' => [Rule::enum(YesNoType::class)],
            'count_visual_impairment' => ['required_if:visual_impairment,3', 'integer', 'min:0', 'max:9', function ($attribute, $value, $fail) {
                if ($this->visual_impairment === 3 && $value < 1) {
                    $fail( 'يجب ان تكون القيمة اكبر من صفر');
                }
            }],

            'count_mental_disability' => ['required_if:mental_disability,3', 'integer', 'min:0', 'max:9', function ($attribute, $value, $fail) {
                if ($this->mental_disability === 3 && $value < 1) {
                    $fail( 'يجب ان تكون القيمة اكبر من صفر');
                }
            }],

            'count_physical_impairment' => ['required_if:physical_impairment,3', 'integer', 'min:0', 'max:9', function ($attribute, $value, $fail) {
                if ($this->physical_impairment === 3 && $value < 1) {
                    $fail( 'يجب ان تكون القيمة اكبر من صفر');
                }
            }],

            'count_hearing_impairment' => ['required_if:hearing_impairment,3', 'integer', 'min:0', 'max:9', function ($attribute, $value, $fail) {
                if ($this->hearing_impairment === 3 && $value < 1) {
                    $fail( 'يجب ان تكون القيمة اكبر من صفر');
                }
            }],
            'count_diabetes' => ['required_if:diabetes,3', 'integer', 'min:0', 'max:9', function ($attribute, $value, $fail) {
                if ($this->diabetes === 3 && $value < 1) {
                    $fail( 'يجب ان تكون القيمة اكبر من صفر');
                }
            }],

            'count_blood_pressure' => ['required_if:blood_pressure,3', 'integer', 'min:0', 'max:9', function ($attribute, $value, $fail) {
                if ($this->blood_pressure === 3 && $value < 1) {
                    $fail( 'يجب ان تكون القيمة اكبر من صفر');
                }
            }],

            'count_cancer' => ['required_if:cancer,3', 'integer', 'min:0', 'max:9', function ($attribute, $value, $fail) {
                if ($this->cancer === 3 && $value < 1) {
                    $fail( 'يجب ان تكون القيمة اكبر من صفر');
                }
            }],

            
            'count_Kidney_failure' => ['required_if:Kidney_failure,3', 'integer', 'min:0', 'max:9', function ($attribute, $value, $fail) {
                if ($this->Kidney_failure === 3 && $value < 1) {
                    $fail( 'يجب ان تكون القيمة اكبر من صفر');
                }
            }],

            


        ];
    }



    protected function messages(): array
    {
        return [
            'wife_pregnant.enum' => 'قيمة حقل غير صحيحة.',
            'wife_breastfeeding.enum' => 'قيمة حقل غير صحيحة.',
            'mental_disability.enum' => 'قيمة حقل غير صحيحة.',
            'physical_impairment.enum' => 'قيمة حقل غير صحيحة.',
            'hearing_impairment.enum' => 'قيمة حقل غير صحيحة.',
            'visual_impairment.enum' => 'قيمة حقل غير صحيحة.',
            'diabetes.enum' => 'قيمة حقل غير صحيحة.',
            'blood_pressure.enum' => 'قيمة حقل غير صحيحة.',
            'cancer.enum' => 'قيمة حقل غير صحيحة.',
            'Kidney_failure.enum' => 'قيمة حقل غير صحيحة.',
            'count_mental_disability.required_if' => ' مطلوب ادخال العدد.',
            'count_physical_impairment.required_if' => ' مطلوب ادخال العدد.',
            'count_hearing_impairment.required_if' => ' مطلوب ادخال العدد.',
            'count_visual_impairment.required_if' => ' مطلوب ادخال العدد.',
            'count_diabetes.required_if' => ' مطلوب ادخال العدد.',
            'count_blood_pressure.required_if' => ' مطلوب ادخال العدد.',
            'count_cancer.required_if' => ' مطلوب ادخال العدد.',
            'count_Kidney_failure.required_if' => ' مطلوب ادخال العدد.',
        ];
    }
}
