<div class="d-flex flex-column flex-root">
    <style>
        .bg-danger {
            background-color: #dc3545;
            padding: 10px;
            border-radius: 5px;
            color: white;
            margin-bottom: 15px;
        }
    </style>


    <div class="d-flex flex-row-fluid">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
            style="background-image: url('{{ asset('template-assets/metronic7/media/bg/bg-3.jpg') }}');">
            <div class="login-form text-center p-7 position-relative overflow-hidden">

                <div class="login-forgot">
                    <div class="mb-10">
                        <h1>{{ __('customTrans.Forgot Your Password') }}</h1>
                        <div class="text-muted font-weight-bold">
                            {{ __('customTrans.Enter your user name to reset your password') }}</div>
                    </div>
                </div>

                <div>
                    <form wire:submit='' class="login-forgot form-group form">

                        <div class="form-group mb-10">
                            <input wire:model.live.debounce.1000ms='user_name' name="user_name" dir="ltr" autofocus
                                class="form-control form-control-solid h-auto py-4 px-8 text-center @error('user_name') is-invalid
                                    
                                @enderror "
                                type="text" placeholder="{{ __('customTrans.user_name') }}" required
                                autocomplete="off" />
                            @include('layouts._show-error', ['field_name' => 'user_name'])
                        </div>


                        <div class=" my-4 justify-content-center">
                            @include('livewire.auth.date-form')
                            @include('livewire.auth.questions-form')


                        </div>

                        @include('livewire.auth.register-form')
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <x-cancel-back class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2"
                                :route="route('login')" wire:navigate label="cancel_back" wire:loading.remove></x-cancel-back>

                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>


</div>
