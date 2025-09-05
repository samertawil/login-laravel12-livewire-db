<?php

namespace App\Services;


use App\Models\AidCitizenHealth;
use App\Models\AidCitizenAddress;
use Illuminate\Support\Facades\DB;
use App\Models\AidCitizenRegistration;
use Illuminate\Support\Facades\Log;

class RegistrationRepository
{


    public function getRegistrationByIdc($idc)
    {
        return AidCitizenRegistration::find($idc);
    }

    public function saveData(array $mainRegistrationData, array $aidCitizenAddressData, array $aidCitizenHealthData)
    {


        if (isset($mainRegistrationData['type']) && $mainRegistrationData['type'] == 'edit') {

            DB::beginTransaction();

            try {
                AidCitizenRegistration::findOrfail($mainRegistrationData['idc'])->update($mainRegistrationData);

                AidCitizenAddress::findOrfail($aidCitizenAddressData['id'])->update($aidCitizenAddressData);

                AidCitizenHealth::findOrfail($aidCitizenHealthData['id'])->update($aidCitizenHealthData);

                DB::commit();

                return [
                    'type' => 'success',
                    'title' => 'حفظ',
                    'message' => 'تم تعديل البيانات بنجاح ',
                    'route' => 'home',
                ];
            } catch (\Throwable $th) {

                return   self::faildSave($th, $mainRegistrationData['idc']);
            }
        } else {

            DB::beginTransaction();

            try {

                AidCitizenRegistration::create($mainRegistrationData);

                AidCitizenAddress::create($aidCitizenAddressData);

                AidCitizenHealth::create($aidCitizenHealthData);

                DB::commit();

                return [
                    'type' => 'success',
                    'title' => 'حفظ',
                    'message' => 'تم حفظ البيانات بنجاح ',
                    'route' => 'home',
                ];
            } catch (\Throwable $th) {

                return   self::faildSave($th, $mainRegistrationData['idc']);
            }
        }
    }

    public function faildSave($th, $idc)
    {
        DB::rollBack();

        Log::error('Failed to save aid registration data', [
            'user_id' => $idc,
            'error' => $th->getMessage(),
            'trace' => $th->getTraceAsString(),
        ]);


        return [
            'type' => 'Alert',
            'title' => 'خطأ',
            'message' => $th->getMessage(),
        ];
    }
}
