<div>
    <x-slot:crumb>
        <x-breadcrumb></x-breadcrumb>
    </x-slot:crumb>

    
    <header>
        <div class="container m-auto" style="border-bottom: 1px solid #c3c3c3;">

            <div class="col-md-12 mt-3 mb-4 m-auto">

                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="/login">
                            <img src="https://mosa.e-gaza.com/images/p.png" width="55" class="m-2">
                        </a>
                    </div>

                    <div class="col-auto ms-4">

                        <div class="mt-3 ms-2">
                            <h1> اسثتمارة تحديث بيانات مواطني قطاع غزة</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div class="container mt-5">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>


        <div class="card card-custom">

            <div class="card-body ">
                <div class="form-group ">
                    <div class="alert alert-custom alert-default py-1" role="alert">
                        <div class="alert-icon"><i class=" py-1 mr-4 "><span
                                    class=" svg-icon svg-icon-primary svg-icon-3x">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Files/User-folder.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <title>البيانات الشخصية </title>

                                        <defs />
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" opacity="0.3" />
                                            <path
                                                d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z"
                                                fill="#000000" opacity="0.3" />
                                            <path
                                                d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span></i>البيانات الشخصية</div>
                    </div>
                </div>
                <div class="row">
                    <x-input name="idc" label value="{{ $this->personalData->idc ?? '' }}" disabled></x-input>

                    <x-input name="name" label value="{{ Auth::user()->name }}" disabled></x-input>

                    <x-input name="gender" label value="{{ $this->personalData->SEX ?? '' }}" divWidth="2" disabled>
                    </x-input>

                    <x-input name="marital_status" label value="{{ $this->personalData->SOCIAL_STATUS ?? '' }}"
                        divWidth="2" disabled></x-input>

                    <x-input name="familyCount" label value="{{ $this->familyCount }}" divWidth="2"
                        disabled></x-input>

                    <x-input wire:model='mobile_primary' name="mobile_primary" label divWidth="2" req
                        description_field="مثال : 0591234567"></x-input>

                    <x-input wire:model='mobile_secondary' name="mobile_secondary" label divWidth="2"></x-input>

                    <div class="col-12 my-3">
                        <small>في حالة وجود تغير على البيانات الشخصية اعلاه يرجى ارسال شكوى مع ارفاق المستندات</small>
                    </div>
                </div>
            </div>


            <div class="separator separator-dashed my-4"></div>

            @include('livewire.citizen-address.create')

            <div class="separator separator-dashed my-8"></div>

            @include('livewire.citizen-health.create')

            <div class="separator separator-dashed my-4"></div>



        </div>


        <div class="d-flex justify-content-center" style="margin-bottom: 30px;">
            <button wire:click="saveAll"
                class="form-control btn  my-5 w-75 btn-success ">{{ __('customTrans.save') }}</button>
        </div>

        <div >
            @include('layouts._show_errors_all')
        </div>
       



    </div>
