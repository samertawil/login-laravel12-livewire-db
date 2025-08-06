
@if (!$this->showQuestions)
    <div class="row align-items-center justify-content-center">
        <div class="row col-12 align-items-center">
            <label for="birthday"
                class="col-3 text-left pt-0  col-form-label  required">{{ __('customTrans.birthdate') }}

            </label>
            <p class="col-4 text-left mt-3 text-sm text-red-600 w-100">{{ $this->errorMessage }}</p>
        </div>


        <div class="row col-12  w-100">
            <div class="col-4 col-md-4 text-center">
                <label for="" class="mb-2">{{ __('customTrans.year') }}</label>
                <select wire:model="year" id="year"
                    class="form-control form-control-solid h-auto py-3 px-8 text-center @error('year') is-invalid @enderror">
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
                    class="form-control form-control-solid h-auto py-3 px-8 text-center @error('month') is-invalid @enderror">
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
                    class="form-control form-control-solid h-auto py-3 px-8 text-center @error('day') is-invalid @enderror">
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
                    <x-button type="submit" wire:click='checkDate' wire:loading.remove label="continue"
                        class="btn btn-light-info font-weight-bold px-9 py-4">
                    </x-button>
                </span>
            </div>
        @endif

    </div>
@endif


 

 