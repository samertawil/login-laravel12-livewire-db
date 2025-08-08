<?php

namespace App\Livewire\RegisterForAid;

use Log;
use App\Models\Status;
use App\Models\Citizen;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Relation;
use Illuminate\View\View;
use App\Models\AidCitizenHealth;
use App\Models\AidCitizenAddress;
use Illuminate\Support\Facades\DB;
use App\Services\CacheModelServices;
use Illuminate\Support\Facades\Auth;
use App\Models\AidCitizenRegistration;
use App\Trait\RegisterForAidTrait;

class Create extends Component
{

    use RegisterForAidTrait;




    public function mount(): void
    {
        $settingData = new Setting();
        $data = $settingData->getData();
        $time =  $data->where('key', 'personalDataCached')->first()->value ?? 1;

        $this->UserIdc = Auth::user()->user_name;

        $this->personalData =  citizen::getData($time, $this->UserIdc);

        $this->familyCount =   Relation::getData($time, $this->UserIdc);
    }



    public function saveAll()
    {

        $this->validate();


        (int) $sexConstant = Status::where('status_name', $this->personalData['SEX'])->value('id');
        (int) $maritalStatusConstant = Status::where('status_name', $this->personalData['SOCIAL_STATUS'])->value('id');

        DB::beginTransaction();

        try {
            AidCitizenRegistration::create([
                'idc' => $this->UserIdc,
                'full_name' => Auth::user()->full_name,
                'birthday' => $this->personalData['CI_BIRTH_DT'],
                'marital_status' => $maritalStatusConstant,
                'gender' => $sexConstant,
                'family_count' => $this->familyCount,
                'mobile_primary' => $this->mobile_primary,
                'mobile_secondary' => $this->mobile_secondary,
            ]);

            AidCitizenAddress::create([
                'idc' => $this->UserIdc,
                'region_id' => $this->region_id,
                'city_id' => $this->city_id,
                'neighbourhood_id' => $this->neighbourhood_id,
                'e_region_id' => $this->e_region_id,
                'e_city_id' => $this->e_city_id,
                'e_neighbourhood_id' => $this->e_neighbourhood_id,
                'e_home_type' => $this->e_home_type,
                'e_full_address' => $this->e_full_address,
            ]);

            AidCitizenHealth::create([
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
            ]);

            DB::commit();

            $this->reset();
            $this->dispatch(
                'alert',
                type: 'success',
                title: 'حفظ',
                text: ' تم حفظ البيانات بنجاح ',
                confirmButtonText: 'اغلاق'
            );

            return redirect()->route('home');

        } catch (\Throwable $th) {
            DB::rollBack();
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

        return view('livewire.register-for-aid.create', compact(['regions', 'cities', 'neighbourhoods', 'statuses']))->layoutData(['Title' => 'fff']);
    }
}
