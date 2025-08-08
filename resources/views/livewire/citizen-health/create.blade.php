<div wire:cloak>

    <div class="card-body ">
        <div class="form-group ">
            <div class="alert alert-custom alert-default py-1" role="alert">
                <div class="alert-icon"><i class="flaticon-warning text-warning mx-4"></i>البيانات الصحية</div>
            </div>
        </div>

        <div class="row">

            <div class="form-group row mx-3">
                <label class="col-6 col-form-label">
                    هل الزوجة حامل
                </label>

                <div class="col-6 col-form-label">
                    <div class="radio-inline">
                        <label class="radio radio-outline radio-success">
                            <input type="radio" wire:model='wife_pregnant' name="wife_pregnant" value="3"
                                data-gtm-form-interact-field-id="wife_pregnant3">
                            <span></span>
                            نعم
                        </label>
                        <label class="radio radio-outline radio-success">
                            <input type="radio" wire:model='wife_pregnant' name="wife_pregnant" value="4"
                                data-gtm-form-interact-field-id="wife_pregnant4">
                            <span></span>
                            لا
                        </label>
                    </div>

                    @error('wife_pregnant')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="form-group row mx-3">
                <label class="col-7 col-form-label"> هل الزوجة مرضعة</label>
                <div class="col-5 col-form-label">
                    <div class="radio-inline">
                        <label class="radio radio-outline radio-success">
                            <input type="radio" wire:model='wife_breastfeeding' name="wife_breastfeeding" value="3"
                                data-gtm-form-interact-field-id="wife_breastfeeding3">
                            <span></span>
                            نعم
                        </label>
                        <label class="radio radio-outline radio-success">
                            <input type="radio" wire:model='wife_breastfeeding' name="wife_breastfeeding" value="4"
                                data-gtm-form-interact-field-id="wife_breastfeeding4">
                            <span></span>
                            لا
                        </label>

                    </div>
                    @error('wife_breastfeeding')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

        </div>
        <h5 class="mx-3 text-primary">الاعاقات</h5>
        <div class="border-2 text-light">


            <div class="row mx-3">

                <div class="form-group row col-6 col-lg-3  mt-3">
                    <label class="col-6 col-form-label px-0"> {{ __('customTrans.mental_disability') }} </label>
                    <div class="col-6 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-outline radio-danger">
                                <input type="radio" wire:model='mental_disability' name="mental_disability" value="3"
                                    data-gtm-form-interact-field-id="mental_disability3">
                                <span></span>
                                نعم
                            </label>
                            <label class="radio radio-outline radio-success">
                                <input type="radio" wire:model='mental_disability' name="mental_disability" value="4"
                                    data-gtm-form-interact-field-id="mental_disability4">
                                <span></span>
                                لا
                            </label>

                        </div>
                        @error('mental_disability')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5 mr-8  mt-3">
                    <x-input wire:show='mental_disability==3' wire:model='count_mental_disability'
                        name="count_mental_disability" type="number" min="0" max="9" placeholder="العدد"
                        divlclass="col-12" divWidth="5"></x-input>
                </div>

            </div>


            <div class="row mx-3">

                <div class="form-group row col-6 col-lg-3">
                    <label class="col-6 col-form-label px-0"> {{ __('customTrans.physical_impairment') }} </label>
                    <div class="col-6 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-outline radio-danger">
                                <input type="radio" wire:model='physical_impairment' name="physical_impairment"
                                    value="3" data-gtm-form-interact-field-id="physical_impairment3">
                                <span></span>
                                نعم
                            </label>
                            <label class="radio radio-outline radio-success">
                                <input type="radio" wire:model='physical_impairment' name="physical_impairment"
                                    value="4" data-gtm-form-interact-field-id="physical_impairment4">
                                <span></span>
                                لا
                            </label>

                        </div>
                        @error('physical_impairment')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5 mr-8">
                    <x-input wire:show='physical_impairment==3' wire:model='count_physical_impairment'
                        name="count_physical_impairment" type="number" min="0" max="50" placeholder="العدد"
                        divlclass="col-12" divWidth="5"></x-input>
                </div>

            </div>

            <div class="row mx-3">

                <div class="form-group row col-6 col-lg-3">
                    <label class="col-6 col-form-label px-0"> {{ __('customTrans.hearing_impairment') }} </label>
                    <div class="col-6 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-outline radio-danger">
                                <input type="radio" wire:model='hearing_impairment' name="hearing_impairment" value="3"
                                    data-gtm-form-interact-field-id="hearing_impairment3">
                                <span></span>
                                نعم
                            </label>
                            <label class="radio radio-outline radio-success">
                                <input type="radio" wire:model='hearing_impairment' name="hearing_impairment" value="4"
                                    data-gtm-form-interact-field-id="hearing_impairment4">
                                <span></span>
                                لا
                            </label>

                        </div>
                        @error('hearing_impairment')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5 mr-8">
                    <x-input wire:show="hearing_impairment==3" wire:model='count_hearing_impairment'
                        name="count_hearing_impairment" type="number" min="0" max="9" placeholder="العدد"
                        divlclass="col-12" divWidth="5"></x-input>
                </div>



            </div>

            <div class="row mx-3">

                <div class="form-group row col-6 col-lg-3">
                    <label class="col-6 col-form-label px-0"> {{ __('customTrans.visual_impairment') }} </label>
                    <div class="col-6 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-outline radio-danger">
                                <input type="radio" wire:model='visual_impairment' name="visual_impairment" value="3"
                                    data-gtm-form-interact-field-id="visual_impairment3">
                                <span></span>
                                نعم
                            </label>
                            <label class="radio radio-outline radio-success">
                                <input type="radio" wire:model='visual_impairment' name="visual_impairment" value="4"
                                    data-gtm-form-interact-field-id="visual_impairment4">
                                <span></span>
                                لا
                            </label>

                        </div>
                        @error('visual_impairment')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5 mr-8">
                    <x-input wire:show="visual_impairment==3" wire:model='count_visual_impairment'
                        name="count_visual_impairment" type="number" min="0" max="9" placeholder="العدد"
                        divlclass="col-12" divWidth="5"></x-input>
                </div>



            </div>

        </div>


        <h5 class="mx-3 text-primary mt-5">الامراض المزمنة</h5>
        <div class="border-2 text-light">


            <div class="row mx-3 mt-3">

                <div class="form-group row col-6 col-lg-3">
                    <label class="col-6 col-form-label px-0"> {{ __('customTrans.diabetes') }} </label>
                    <div class="col-6 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-outline radio-danger">
                                <input type="radio" wire:model='diabetes' name="diabetes" value="3"
                                    data-gtm-form-interact-field-id="diabetes3">
                                <span></span>
                                نعم
                            </label>
                            <label class="radio radio-outline radio-success">
                                <input type="radio" wire:model='diabetes' name="diabetes" value="4"
                                    data-gtm-form-interact-field-id="diabetes4">
                                <span></span>
                                لا
                            </label>

                        </div>
                        @error('diabetes')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5 mr-8">
                    <x-input wire:show='diabetes==3' wire:model='count_diabetes' name="count_diabetes" type="number"
                        min="0" max="9" placeholder="العدد" divlclass="col-12" divWidth="5"></x-input>
                </div>

            </div>


            <div class="row mx-3">

                <div class="form-group row col-6 col-lg-3">
                    <label class="col-6 col-form-label px-0"> {{ __('customTrans.blood_pressure') }} </label>
                    <div class="col-6 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-outline radio-danger">
                                <input type="radio" wire:model='blood_pressure' name="blood_pressure" value="3"
                                    data-gtm-form-interact-field-id="blood_pressure3">
                                <span></span>
                                نعم
                            </label>
                            <label class="radio radio-outline radio-success">
                                <input type="radio" wire:model='blood_pressure' name="blood_pressure" value="4"
                                    data-gtm-form-interact-field-id="blood_pressure4">
                                <span></span>
                                لا
                            </label>

                        </div>
                        @error('blood_pressure')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5 mr-8">
                    <x-input wire:show='blood_pressure==3' wire:model='count_blood_pressure' name="count_blood_pressure"
                        type="number" min="0" max="9" placeholder="العدد" divlclass="col-12" divWidth="5"></x-input>
                </div>

            </div>

            <div class="row mx-3">

                <div class="form-group row col-6 col-lg-3">
                    <label class="col-6 col-form-label px-0"> {{ __('customTrans.cancer') }} </label>
                    <div class="col-6 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-outline radio-danger">
                                <input type="radio" wire:model='cancer' name="cancer" value="3"
                                    data-gtm-form-interact-field-id="cancer3">
                                <span></span>
                                نعم
                            </label>
                            <label class="radio radio-outline radio-success">
                                <input type="radio" wire:model='cancer' name="cancer" value="4"
                                    data-gtm-form-interact-field-id="cancer4">
                                <span></span>
                                لا
                            </label>

                        </div>
                        @error('cancer')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5 mr-8">
                    <x-input wire:show="cancer==3" wire:model='count_cancer' name="count_cancer" type="number" min="0"
                        max="9" placeholder="العدد" divlclass="col-12" divWidth="5"></x-input>
                </div>



            </div>

            <div class="row mx-3">

                <div class="form-group row col-6 col-lg-3">
                    <label class="col-6 col-form-label px-0"> {{ __('customTrans.Kidney_failure') }} </label>
                    <div class="col-6 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-outline radio-danger">
                                <input type="radio" wire:model='Kidney_failure' name="Kidney_failure" value="3"
                                    data-gtm-form-interact-field-id="Kidney_failure3">
                                <span></span>
                                نعم
                            </label>
                            <label class="radio radio-outline radio-success">
                                <input type="radio" wire:model='Kidney_failure' name="Kidney_failure" value="4"
                                    data-gtm-form-interact-field-id="Kidney_failure4">
                                <span></span>
                                لا
                            </label>

                        </div>
                        @error('Kidney_failure')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5 mr-8">
                    <x-input wire:show="Kidney_failure==3" wire:model='count_Kidney_failure' name="count_Kidney_failure"
                        type="number" min="0" max="9" placeholder="العدد" divlclass="col-12" divWidth="5"></x-input>
                </div>



            </div>


        </div>

    </div>
</div>