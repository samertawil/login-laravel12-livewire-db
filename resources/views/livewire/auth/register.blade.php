@section('title', 'Create a new account')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endpush
<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('customTrans.login_system') }}
        </h2>

        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            {{ __('customTrans.or') }}
            <a href="{{ route('login') }}"
                class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                {{ __('customTrans.sign in to your account') }}

            </a>
        </p>
    </div>


    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">

            <div>
                <label for="user_name" class="col-form-label required ">
                    {{ __('customTrans.idc') }}
                </label>

                <div class="mt-1 rounded-md shadow-sm">
                    <input wire:model.lazy="user_name" id="user_name" type="text" required autofocus
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('user_name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                </div>

                @error('user_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            @if (!$this->showQuestions)
                <div class="row align-items-center">
                    <div class="d-flex align-items-center mt-4 ">
                        <label for="birthday"
                            class="col-md-3 col-form-label  required @error('wrongDate') is-invalid @enderror">{{ __('customTrans.birthdate') }}

                        </label>
                        @error('wrongDate')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>


                    <div class="row col-12 justify-content-center">
                        <div class="col-4 col-md-4 text-center">
                            <label for="" class="mb-2">{{ __('customTrans.year') }}</label>
                            <select wire:model="year" id="year"
                                class="form-select @error('year') is-invalid @enderror">
                                <option value="" hidden></option>
                                @for ($i = 2008; $i >= 1900; $i--)
                                    <option value="{{ $i }}" @selected(old('year') == $i)>
                                        {{ $i }}</option>
                                @endfor

                            </select>

                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>



                        <div class="col-4 col-md-4 text-center">
                            <label for="" class="mb-2">{{ __('customTrans.month') }}</label>
                            <select wire:model="month" id="month"
                                class="form-select @error('month') is-invalid @enderror">
                                <option value="" hidden></option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i < 10 ? '0' . $i : $i }}" @selected(old('month') == $i)>
                                        {{ $i < 10 ? '0' . $i : $i }}</option>
                                @endfor

                            </select>

                            @error('month')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4 col-md-4 text-center">
                            <label for="" class="mb-2">{{ __('customTrans.day') }}</label>
                            <select wire:model="day" id="day"
                                class="form-select @error('day') is-invalid @enderror">
                                <option value="" hidden></option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i < 10 ? '0' . $i : $i }}" @selected(old('day') == $i)>
                                        {{ $i < 10 ? '0' . $i : $i }}</option>
                                @endfor

                            </select>
                            @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if (!empty($this->user_name))
                        <div class="mt-4">
                            <span class="block w-full rounded-md shadow-sm">
                                <button type="submit" wire:click='checkDate'
                                    class="  flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                    {{ __('customTrans.continue') }}
                                </button>
                            </span>
                        </div>
                    @endif

                </div>
            @endif




            @if ($this->questions && $this->trueAnswer == 0)
                @include('livewire.auth.questions-form')
            @endif

            <div>

                @if ($this->trueAnswer == 1)
                    <div class="mt-6">
                        <label for="mobile" class="block text-sm font-medium text-gray-700 leading-5 required">
                            {{ __('customTrans.mobile') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="mobile" id="mobile"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('mobile') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('mobile')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 leading-5 required">
                            {{ __('customTrans.password') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model="password" id="password" type="password"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mt-6">
                        <label for="password_confirmation"
                            class="block text-sm font-medium text-gray-700 leading-5 required">
                            {{ __('customTrans.password-confirm') }}

                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model="passwordConfirmation" id="passwordConfirmation" type="password"
                                class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 appearance-none rounded-md focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                    </div>


                    <div class="mt-4">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" wire:click.prevent='register' wire:loading.remove
                                class="btn btn-success flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                Register
                            </button>
                        </span>
                    </div>
                @endif

            </div>


            {{-- </form> --}}
        </div>
    </div>
</div>
