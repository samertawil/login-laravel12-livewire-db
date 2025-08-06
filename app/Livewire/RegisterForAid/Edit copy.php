<?php

namespace App\Livewire\RegisterForAid;

use Log;
use App\Models\Status;
use App\Models\Citizen;
use App\Models\Setting;
use Livewire\Component;
use App\Enums\YesNoType;
use App\Models\Relation;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\AidCitizenHealth;
use App\Models\AidCitizenAddress;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use App\Services\CacheModelServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\AidCitizenRegistration;

class Edit extends Component
{
    public   $personalData = '';

    public   $familyCount = '';

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
    #[Validate(['required_if:mental_disability,3'])]
    public int|null $count_mental_disability = 0;
    #[Validate('required')]
    public int|null $physical_impairment = null;
    #[Validate(['required_if:physical_impairment,3'])]
    public int|null $count_physical_impairment = 0;
    #[Validate('required')]
    public int|null $hearing_impairment = null;
    #[Validate(['required_if:hearing_impairment,3'])]
    public int|null $count_hearing_impairment = 0;
    #[Validate('required')]
    public int|null $visual_impairment = null;
    #[Validate(['required_if:visual_impairment,3'])]
    public int|null $count_visual_impairment = 0;
    #[Validate('required')]
    public int|null $diabetes = null;
    #[Validate(['required_if:diabetes,3'])]
    public int|null $count_diabetes = 0;
    #[Validate('required')]
    public int|null $blood_pressure = null;
    #[Validate(['required_if:blood_pressure,3'])]
    public int|null $count_blood_pressure = 0;
    #[Validate('required')]
    public int|null $cancer = null;
    #[Validate(['required_if:cancer,3'])]
    public int|null $count_cancer = 0;
    #[Validate('required')]
    public int|null $Kidney_failure = null;
    #[Validate(['required_if:Kidney_failure,3'])]
    public int|null $count_Kidney_failure = 0;
 
    public int $UserIdc=0;
    protected mixed $dataCitizenRegistration=null;
    protected mixed $dataCitizenAddress=null;
    protected mixed $dataCitizenHealth=null;
    

    public  function getVar(): array {
        
        $dataCitizenRegistration =AidCitizenRegistration::findOrFail($this->UserIdc);
        $dataCitizenAddress=AidCitizenAddress::where('idc',$this->UserIdc)->first();
        $dataCitizenHealth= AidCitizenHealth::where('idc',$this->UserIdc)->first();

        return ['dataCitizenRegistration'=>$dataCitizenRegistration,'dataCitizenAddress'=>$dataCitizenAddress,'dataCitizenHealth'=>$dataCitizenHealth];
    }


    							
    public function mount(): void
    {
        $settingData=new Setting();
        $data= $settingData->getData();
        $time=  $data->where('key','personalDataCached')->first()->value ?? 1 ;
   
        $this->UserIdc=Auth::user()->user_name;

        $this->personalData =  Cache::remember('citizenPersonalData',now()->addHours((int) $time), function () {
           return Citizen::findOrfail($this->UserIdc) ?? null; 
        });

        $this->familyCount =   Cache::remember('citizenFamilycount',now()->addHours((int) $time),function() {
            return Relation::where('id_1', $this->UserIdc)->whereIn('type_cd', [287, 286])->count() + 1 ?? null;
        });

       
        
        $this->mobile_primary= $this->getVar()['dataCitizenRegistration']->mobile_primary;
        $this->mobile_secondary= $this->getVar()['dataCitizenRegistration']->mobile_secondary;
        $this->region_id=$this->getVar()['dataCitizenAddress']->region_id;
        $this->city_id=$this->getVar()['dataCitizenAddress']->city_id;
        $this->neighbourhood_id=$this->getVar()['dataCitizenAddress']->neighbourhood_id;
        $this->e_home_type=$this->getVar()['dataCitizenAddress']->e_home_type;
        $this->e_region_id=$this->getVar()['dataCitizenAddress']->e_region_id;
        $this->e_city_id=$this->getVar()['dataCitizenAddress']->e_city_id;
        $this->e_neighbourhood_id=$this->getVar()['dataCitizenAddress']->e_neighbourhood_id;
        $this->e_full_address=$this->getVar()['dataCitizenAddress']->e_full_address;
        $this->wife_pregnant=$this->getVar()['dataCitizenHealth']->wife_pregnant;
        $this->wife_breastfeeding=$this->getVar()['dataCitizenHealth']->wife_breastfeeding;
        $this->mental_disability=$this->getVar()['dataCitizenHealth']->mental_disability;
        $this->count_mental_disability=$this->getVar()['dataCitizenHealth']->count_mental_disability;
        $this->physical_impairment=$this->getVar()['dataCitizenHealth']->physical_impairment;
        $this->count_physical_impairment=$this->getVar()['dataCitizenHealth']->count_physical_impairment;

        $this->hearing_impairment=$this->getVar()['dataCitizenHealth']->hearing_impairment;
        $this->count_hearing_impairment=$this->getVar()['dataCitizenHealth']->count_hearing_impairment;
        $this->visual_impairment=$this->getVar()['dataCitizenHealth']->visual_impairment;
        $this->count_visual_impairment=$this->getVar()['dataCitizenHealth']->count_visual_impairment;
        $this->diabetes=$this->getVar()['dataCitizenHealth']->diabetes;

        $this->count_diabetes=$this->getVar()['dataCitizenHealth']->count_diabetes;
        $this->blood_pressure=$this->getVar()['dataCitizenHealth']->blood_pressure;
        $this->count_blood_pressure=$this->getVar()['dataCitizenHealth']->count_blood_pressure;
        $this->cancer=$this->getVar()['dataCitizenHealth']->cancer;
        $this->count_cancer=$this->getVar()['dataCitizenHealth']->count_cancer;
        $this->Kidney_failure=$this->getVar()['dataCitizenHealth']->Kidney_failure;
        $this->count_Kidney_failure=$this->getVar()['dataCitizenHealth']->count_Kidney_failure;
      

    }


    public function rules(): array {
        return [
            'wife_pregnant'=>[Rule::enum(YesNoType::class)],
            'wife_breastfeeding'=>[Rule::enum(YesNoType::class)],
            'mental_disability'=>[Rule::enum(YesNoType::class)],
            'physical_impairment'=>[Rule::enum(YesNoType::class)],
            'hearing_impairment'=>[Rule::enum(YesNoType::class)],
            'visual_impairment'=>[Rule::enum(YesNoType::class)],
            'diabetes'=>[Rule::enum(YesNoType::class)],
            'blood_pressure'=>[Rule::enum(YesNoType::class)],
            'cancer'=>[Rule::enum(YesNoType::class)],
            'Kidney_failure'=>[Rule::enum(YesNoType::class)],
                      
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
    



    public function saveAll(): void
    {
       
      
        $CitizenRegistration = $this->getVar()['dataCitizenRegistration'];
       
    
        $this->validate();
    
      
        (int) $maritalStatusConstant = Status::where('status_name', $this->personalData['SOCIAL_STATUS'])->value('id');

        DB::beginTransaction();

        try {
            $CitizenRegistration->update([
              
                'marital_status' => $maritalStatusConstant,
                'family_count' => $this->familyCount,
                'mobile_primary' => $this->mobile_primary,
                'mobile_secondary' => $this->mobile_secondary,
            ]);
            
            
            // $this->this->getVar()['dataCitizenAddress']->update([
            //     'idc' => $this->UserIdc,
            //     'region_id' => $this->region_id,
            //     'city_id' => $this->city_id,
            //     'neighbourhood_id' => $this->neighbourhood_id,
            //     'e_region_id' => $this->e_region_id,
            //     'e_city_id' => $this->e_city_id,
            //     'e_neighbourhood_id' => $this->e_neighbourhood_id,
            //     'e_home_type' => $this->e_home_type,
            //     'e_full_address' => $this->e_full_address,
            // ]);

            // $this->dataCitizenHealth->update([
            //     'idc' => $this->UserIdc,
            //     'wife_pregnant' => $this->wife_pregnant ,
            //     'wife_breastfeeding' => $this->wife_breastfeeding ,
            //     'mental_disability' => $this->mental_disability ,
            //     'count_mental_disability' => $this->count_mental_disability ,
            //     'physical_impairment' => $this->physical_impairment ,
            //     'count_physical_impairment' => $this->count_physical_impairment ,
            //     'hearing_impairment' => $this->hearing_impairment ,
            //     'count_hearing_impairment' => $this->count_hearing_impairment ,
            //     'visual_impairment' => $this->visual_impairment ,
            //     'count_visual_impairment' => $this->count_visual_impairment ,
            //     'diabetes' => $this->diabetes ,
            //     'count_diabetes' => $this->count_diabetes ,
            //     'blood_pressure' => $this->blood_pressure ,
            //     'count_blood_pressure' => $this->count_blood_pressure ,
            //     'cancer' => $this->cancer ,
            //     'count_cancer' => $this->count_cancer ,
            //     'Kidney_failure' => $this->Kidney_failure ,
            //     'count_Kidney_failure' => $this->count_Kidney_failure ,
            // ]);
            
            DB::commit();

            $this->reset();
            $this->dispatch(
                'alert',
                type: 'success',
                title: 'حفظ',
                text: ' تم حفظ البيانات بنجاح ',
                confirmButtonText: 'اغلاق'
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            Log::error('Failed to save aid registration data', [
                'user_id' => $this->UserIdc,
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ]);
            $this->dispatch(
                'alert',
                type: 'Alert',
                title: 'خطأ',
                text: ' لم يتم حفظ البيانات  ',
                confirmButtonText: 'اغلاق'
            );
        }
    }


    public function render(): View
    {
        
       
        $statusModel = new Status();
        $statuses = $statusModel->statuses();

        $regions  = CacheModelServices::getRegionTableData();
        $cities  = CacheModelServices::getCityTableData();
        $neighbourhoods = CacheModelServices::getNeighbourhoodTableData();

        return view('livewire.register-for-aid.create', compact(['regions', 'cities', 'neighbourhoods', 'statuses']));
    }
}
