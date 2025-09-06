<?php

namespace App\Livewire\RegisterForAid;


use App\Models\Status;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use App\Services\StatusRepository;
use App\Trait\RegisterForAidTrait;
use App\Services\CitizenRepository;
use App\Services\CacheModelServices;
use App\Services\RelationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Services\RegistrationRepository;
use App\Services\CitizenHealthRepository;
use App\Services\CitizenAddressRepository;

class Edit extends Component
{
    use RegisterForAidTrait;


    protected Model|null $dataCitizenRegistration = null;
    protected Model|null $dataCitizenAddress = null;
    protected Model|null $dataCitizenHealth = null;


    public function mount(): void
    {

        $this->UserIdc = Auth::user()->user_name;

        $this->personalData =   self::getProtectedPersonalData();;
      
        $this->familyCount =  self::getProtectedFamilyCount();


        $getRegistrationRepo = new RegistrationRepository();
        $this->dataCitizenRegistration = $getRegistrationRepo->getRegistrationByIdc($this->UserIdc);

        $this->dataCitizenAddress = self::getProtectedDataCitizenAddress();
      
        $this->dataCitizenHealth = self::getProtectedDataCitizenHealth();

   

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


    public function getProtectedPersonalData() {
        
        $getCitizenRepo = new CitizenRepository();
        $this->personalData = $getCitizenRepo->getCachedCitizenId($this->UserIdc);

        return  $this->personalData;
    }


    public function getProtectedFamilyCount() {
        
       
        $getRelationRepo = new RelationRepository();
        $this->familyCount =  $getRelationRepo->getCachedRelationForId($this->UserIdc);
        
        return  $this->familyCount;
    }

    public function getProtectedDataCitizenAddress() {
        
       
        $getCitizenAddressRepo = new CitizenAddressRepository();
        $this->dataCitizenAddress = $getCitizenAddressRepo->getCitizenAddressByIdc($this->UserIdc);

      
        
        return  $this->dataCitizenAddress;
    }
    

    public function getProtectedDataCitizenHealth(): Model {
        
        
        $getCitizenHealthRepo = new CitizenHealthRepository();
        $this->dataCitizenHealth = $getCitizenHealthRepo->getCitizenHealthByIdc($this->UserIdc);
      
        
        return  $this->dataCitizenHealth;
    }

    public function saveAll()
    {
       
        $this->validate();

        if( ! (self::getProtectedPersonalData()) && !( self::getProtectedPersonalData()['SOCIAL_STATUS'])) {
            return ;
          }
         

        (int) $maritalStatusConstant = Status::where('status_name',  self::getProtectedPersonalData()['SOCIAL_STATUS'])->value('id');

        

        $mainRegistrationData =[
            'type' => 'edit',
            'idc' => $this->UserIdc,
            'marital_status' => $maritalStatusConstant,
            'family_count' => self::getProtectedFamilyCount(),
            'mobile_primary' => $this->mobile_primary,
            'mobile_secondary' => $this->mobile_secondary,  
        ];

        $aidCitizenAddressData = [

            'id' => self::getProtectedDataCitizenAddress()->id,
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
            'id' => self::getProtectedDataCitizenHealth()->id,
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

