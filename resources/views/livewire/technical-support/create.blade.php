<div class="d-flex flex-column flex-root ">


    <div class="login login-signin-on d-flex flex-row-fluid " id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat "
            style="background-image: url('{{ asset('template-assets/metronic7/media/bg/bg-3.jpg') }}');">

            <div class=" login-form  p-7 position-relative overflow-hidden ">



                <div class="mb-10">
                    <h1>{{ __('customTrans.get-help') }}</h1>
                    <div class="text-muted font-weight-bold">
                        @auth
                            <p>في حال رغبتك بارسال اي طلبات او شكاوى يرجى مراسلتنا هنا</p>
                        @endauth
                        @guest
                            <p> في حال عدم تمكنك من الدخول الي الحساب او انشاء حساب جديد يرجى مراسلتنا هنا</p>
                        @endguest
                    </div>
                </div>
                <form wire:submit='create'>

                    <div class="row col-12 justify-content-center">


                        <x-input name="user_name" wire:model='user_name' label :labelname="__('customTrans.idc')" divlclass="col-5"
                            divWidth="5" req></x-input>

                        <x-input name="name" wire:model='name' label :labelname="__('customTrans.providerName')" divlclass="col-7 "
                            divWidth="7" req></x-input>

                    </div>

                    <div class="row col-12 justify-content-start">
                        <x-select wire:model='region_id' id='region_id' name="region_id" :options="$this->statuses['regions']" label
                            :labelname="__('customTrans.region_id')" divWidth="5" divlclass="col-5" req></x-select>

                    </div>



                    <div class="row col-12 justify-content-center">
                        @php
                            $techsupport = 'techsupport_' . app()->getLocale();
                        @endphp

                        <x-input name="mobile" wire:model='mobile' label divWidth="5" divlclass="col-5"
                            :description_field="__('customTrans.mobileDetails')" req></x--input>

                            @auth
                                <x-select wire:model='subject_id' id='subject_id' name="subject_id" :options="$this->statuses['supportForhelp']" label
                                    :labelname="__('customTrans.help-type')" divWidth="7" divlclass="col-7" req></x-select>
                            @endauth
                            @guest
                                <x-select wire:model='subject_id' id='subject_id' name="subject_id" :options="$this->statuses['supportForLogin']" label
                                    :labelname="__('customTrans.help-type')" divWidth="7" divlclass="col-7" req></x-select>
                            @endguest



                            <x-textarea wire:model='issue_description' name="issue_description" label req rows="4"
                                cols="30" divWidth="12"></x-textarea>
                    </div>


                    <div class="col-12 mt-5" style="margin-bottom: 3em !important;">
                        <label for="uploaded_files">uploaded_files</label>
                        <x-filepond::upload wire:model="uploaded_files" id="uploaded_files" name="uploaded_files"
                            multiple max-files="5" allowFileSizeValidation maxFileSize='5120KB' required='false'
                            class="@error('uploaded_files') is-invalid   @enderror" />
                        @include('layouts._show-error', ['field_name' => 'uploaded_files'])
                        <small>يجب ارفاق صور فقط , حجم الصورة الواحدة لا يتجاوز 5 ميجا , اقصى عدد للصور هو 5 صور</small>
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



                        <div class="w-100 m-auto ">
                            <button
                                class="btn btn-primary font-weight-bold  my-5 w-100">{{ __('customTrans.send') }}</button>

                            <div class="form-group d-flex flex-wrap flex-center mt-10">
                                <x-cancel-back class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2"
                                    :route="route('login')" label="cancel_back" wire:loading.remove></x-cancel-back>

                            </div>

                            @include('layouts._show_errors_all')
                        </div>


                    </div>



                </form>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $('#subject_id').on('change', function() {

                $data = $("#subject_id option:selected").text();

            })
        </script>
    @endpush

</div>
