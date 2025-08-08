 <div class="d-flex my-5  ">

     <div class="container m-auto ">
         <div class="row justify-content-center">
             <div class="col-md-6">

                 <div class="h3 px-5">{{ __('customTrans.get-help') }}</div>


                 <form wire:submit='create'>

                     <div class="row col-12 justify-content-center">


                         <x-input name="user_name" wire:model='user_name' label :labelname="__('customTrans.idc')" divlclass="col-5"
                             divWidth="5" req></x-input>

                         <x-input name="name" wire:model='name' label :labelname="__('customTrans.providerName')" divlclass="col-7 "
                             divWidth="7" req></x-input>

                     </div>

                     <div class="row col-12 justify-content-start">
                        <x-select wire:model='region_id' id='region_id' name="region_id" :options="config('myconstant.region_id')" label
                        :labelname="__('customTrans.region_id')" divWidth="5" divlclass="col-5" req></x-select>

                     </div>



                     <div class="row col-12 justify-content-center">
                         @php
                             $techsupport = 'techsupport_' . app()->getLocale();
                         @endphp

                         <x-input name="mobile" wire:model='mobile' label divWidth="5" divlclass="col-5"
                             :description_field="__('customTrans.mobileDetails')" req></x--input>

                             <x-select wire:model='subject_id' id='subject_id' name="subject_id" :options="config($techsupport)['list']" label
                                 :labelname="__('customTrans.help-type')" divWidth="7" divlclass="col-7" req></x-select>

                              
                                 <x-textarea wire:model='issue_description' name="issue_description" label req
                                     rows="4" cols="30" divWidth="12"></x-textarea>
                     </div>

                  

                     <div class="row col-12 justify-content-center">
                         <div class="g-recaptcha" data-sitekey="{!! env('RECAPTCHA_SITE_KEY', 'NO-KEY-FOUND') !!}"></div>

                         <div class="container my-1">
                             <img src="{{ captcha_src('technicalSupport') }}" alt="captcha">

                             <input type="text" wire:model='captcha' name="captcha"
                                 class="form-control px-8 my-3 @error('captcha') is-invalid @enderror"
                                 placeholder="{{ __('customTrans.captcha') }}">
                             @error('captcha')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>

                         <div class="w-75 m-auto ">
                             <x-button label="send"
                                 default_class="bg-success text-white py-2 w-100  m-auto "></x-button>

                             <x-cancel-back   :route="route('login')" wire:navigate label="cancel_back"
                                 class="mb-5"></x-cancel-back>

                             @include('layouts._show_errors_all')
                         </div>


                     </div>






                 </form>
             </div>
         </div>
     </div>

 </div>
 </div>



 <script>
     $('#subject_id').on('change', function() {

         $data = $("#subject_id option:selected").text();

     })
 </script>




 </div>
