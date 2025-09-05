<?php

namespace App\Livewire\RegisterForAid;

use Log;
use App\Models\Status;
use App\Models\Citizen;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Relation;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use App\Models\AidCitizenHealth;
use App\Models\AidCitizenAddress;
use App\Services\StatusRepository;
use App\Trait\RegisterForAidTrait;
use Illuminate\Support\Facades\DB;
use App\Services\CitizenRepository;
use App\Services\SettingRepository;
use App\Services\CacheModelServices;
use App\Services\RelationRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\AidCitizenRegistration;
use App\Services\RegistrationRepository;
use App\Services\CitizenHealthRepository;
use App\Services\CitizenAddressRepository;

class Edit extends Component
{
    use RegisterForAidTrait;

    public   $personalData = '';

    public   $familyCount = '';

    public int $UserIdc = 0;

    protected mixed $dataCitizenRegistration = null;
    public mixed $dataCitizenAddress = null;
    public mixed $dataCitizenHealth = null;


    public function mount(): void
    {



        $this->UserIdc = Auth::user()->user_name;



        $getCitizenRepo = new CitizenRepository();
        $this->personalData = $getCitizenRepo->getCachedCitizenId($this->UserIdc);


        $getRelationRepo = new RelationRepository();
        $this->familyCount =  $getRelationRepo->getCachedRelationForId($this->UserIdc);

        $getRegistrationRepo = new RegistrationRepository();
        $this->dataCitizenRegistration = $getRegistrationRepo->getRegistrationByIdc($this->UserIdc);


        $getCitizenAddressRepo = new CitizenAddressRepository();
        $this->dataCitizenAddress = $getCitizenAddressRepo->getCitizenAddressByIdc($this->UserIdc);
 

        $getCitizenHealthRepo = new CitizenHealthRepository();
        $this->dataCitizenHealth = $getCitizenHealthRepo->getCitizenHealthByIdc($this->UserIdc);



        $this->mobile_primary = $this->dataCitizenRegistration->mobile_primary;
        $this->mobile_secondary = $this->dataCitizenRegistration->mobile_secondary;
        $this->region_id = $this->dataCitizenAddress->region_id;
        $this->city_id = $this->dataCitizenAddress->city_id;
        $this->neighbourhood_id = $this->dataCitizenAddress->neighbourhood_id;
        $this->e_home_type = $this->dataCitizenAddress->e_home_type;
        $this->e_region_id = $this->dataCitizenAddress->e_region_id;
        $this->e_city_id = $this->dataCitizenAddress->e_city_id;
        $this->e_neighbourhood_id = $this->dataCitizenAddress->e_neighbourhood_id;
        $this->e_full_address = $this->dataCitizenAddress->e_full_address;
        $this->wife_pregnant = $this->dataCitizenHealth->wife_pregnant;
        $this->wife_breastfeeding = $this->dataCitizenHealth->wife_breastfeeding;
        $this->mental_disability = $this->dataCitizenHealth->mental_disability;
        $this->count_mental_disability = $this->dataCitizenHealth->count_mental_disability;
        $this->physical_impairment = $this->dataCitizenHealth->physical_impairment;
        $this->count_physical_impairment = $this->dataCitizenHealth->count_physical_impairment;

        $this->hearing_impairment = $this->dataCitizenHealth->hearing_impairment;
        $this->count_hearing_impairment = $this->dataCitizenHealth->count_hearing_impairment;
        $this->visual_impairment = $this->dataCitizenHealth->visual_impairment;
        $this->count_visual_impairment = $this->dataCitizenHealth->count_visual_impairment;
        $this->diabetes = $this->dataCitizenHealth->diabetes;

        $this->count_diabetes = $this->dataCitizenHealth->count_diabetes;
        $this->blood_pressure = $this->dataCitizenHealth->blood_pressure;
        $this->count_blood_pressure = $this->dataCitizenHealth->count_blood_pressure;
        $this->cancer = $this->dataCitizenHealth->cancer;
        $this->count_cancer = $this->dataCitizenHealth->count_cancer;
        $this->Kidney_failure = $this->dataCitizenHealth->Kidney_failure;
        $this->count_Kidney_failure = $this->dataCitizenHealth->count_Kidney_failure;
    }

    public function saveAll()
    {

        $this->validate();


        (int) $maritalStatusConstant = Status::where('status_name', $this->personalData['SOCIAL_STATUS'])->value('id');

        

        $mainRegistrationData =[
            'type' => 'edit',
            'idc' => $this->UserIdc,
            'marital_status' => $maritalStatusConstant,
            'family_count' => $this->familyCount,
            'mobile_primary' => $this->mobile_primary,
            'mobile_secondary' => $this->mobile_secondary,  
        ];

        $aidCitizenAddressData = [

            'id' => $this->dataCitizenAddress->id,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'neighbourhood_id' => $this->neighbourhood_id,
            'e_region_id' => $this->e_region_id,
            'e_city_id' => $this->e_city_id,
            'e_neighbourhood_id' => $this->e_neighbourhood_id,
            'e_home_type' => $this->e_home_type,
            'e_full_address' => $this->e_full_address,
        ];

            
        $aidCitizenHealthData = [
            'id' => $this->dataCitizenHealth->id,
            'wife_pregnant' => $this->wife_pregnant,
            'wife_breastfeeding' => $this->wife_breastfeeding,
            'mental_disability' => $this->mental_disability,
            'count_mental_disability' => $this->count_mental_disability,
            'physical_impairment' => $this->physical_impairment,
            'count_physical_impairment' => $this->count_physical_impairment,
            'hearing_impairment' => $this->hearing_impairment,
            'count_hearing_impairment' => $this->count_hearing_impairment,
            'visual_impairment' => $this->visual_impairment,
            'count_visual_impairment' => $this->count_visual_impairment,
            'diabetes' => $this->diabetes,
            'count_diabetes' => $this->count_diabetes,
            'blood_pressure' => $this->blood_pressure,
            'count_blood_pressure' => $this->count_blood_pressure,
            'cancer' => $this->cancer,
            'count_cancer' => $this->count_cancer,
            'Kidney_failure' => $this->Kidney_failure,
            'count_Kidney_failure' => $this->count_Kidney_failure,
        ];

             
        $getRegistrationRepo = new RegistrationRepository();
        
        $result =  $getRegistrationRepo->saveData($mainRegistrationData, $aidCitizenAddressData, $aidCitizenHealthData);


        $this->reset();

        $this->dispatch(
            'alert',
            type: $result['type'],
            title: $result['title'],
            text: $result['message'],
            confirmButtonText: 'اغلاق'
        );

        return to_route($result['route']);
         
    }

    #[Title('تسجيل')]
    public function render(): View
    {

        $statusRepo = new StatusRepository();

        $statuses = $statusRepo->statusesPSubId(config('myconstants.e_home_type'));

        $regions  = CacheModelServices::getRegionTableData();
        $cities  = CacheModelServices::getCityTableData();
        $neighbourhoods = CacheModelServices::getNeighbourhoodTableData();

        return view('livewire.register-for-aid.create', compact(['regions', 'cities', 'neighbourhoods', 'statuses']));
    }
}

