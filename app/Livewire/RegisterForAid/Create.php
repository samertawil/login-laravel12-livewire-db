<?php

namespace App\Livewire\RegisterForAid;


use App\Models\Status;
use Livewire\Component;
use Illuminate\View\View;
use App\Services\StatusRepository;
use App\Trait\RegisterForAidTrait;
use App\Services\CitizenRepository;
use App\Services\CacheModelServices;
use App\Services\RelationRepository;
use Illuminate\Support\Facades\Auth;
use App\Services\RegistrationRepository;

class Create extends Component
{

    use RegisterForAidTrait;




    public function mount(): void
    {

        $this->UserIdc = Auth::user()->user_name;

        $getCitizenRepo = new CitizenRepository();
        $this->personalData = $getCitizenRepo->getCachedCitizenId($this->UserIdc);


        $getRelationRepo = new RelationRepository();
        $this->familyCount =  $getRelationRepo->getCachedRelationForId($this->UserIdc);
    }



    public function saveAll()
    {

        $this->validate();

        (int) $sexConstant = Status::where('status_name', $this->personalData['SEX'])->value('id');
        (int) $maritalStatusConstant = Status::where('status_name', $this->personalData['SOCIAL_STATUS'])->value('id');



        $mainRegistrationData = [

            'idc' => $this->UserIdc,
            'full_name' => Auth::user()->name,
            'birthday' => $this->personalData['CI_BIRTH_DT'],
            'marital_status' => $maritalStatusConstant,
            'gender' => $sexConstant,
            'family_count' => $this->familyCount,
            'mobile_primary' => $this->mobile_primary,
            'mobile_secondary' => $this->mobile_secondary,

        ];

        $aidCitizenAddressData =  [
            'idc' => $this->UserIdc,
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
            'idc' => $this->UserIdc,
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


    public function render(): View
    {

        $statusRepo = new StatusRepository();

        $statuses = $statusRepo->statusesPSubId(config('myconstants.e_home_type'));

        $regions  = CacheModelServices::getRegionTableData();
        $cities  = CacheModelServices::getCityTableData();
        $neighbourhoods = CacheModelServices::getNeighbourhoodTableData();

        return view('livewire.register-for-aid.create', compact(['regions', 'cities', 'neighbourhoods', 'statuses']))->layoutData(['Title' => 'fff']);
    }
}
