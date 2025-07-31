<div class="row my-4 justify-content-center">



    @if (!$this->showQuestions)
        <div class="row align-items-center">
            <div class="d-flex align-items-center  justify-content-between ">
                <label for="birthday" class="col-md-4 col-form-label  required">{{ __('customTrans.birthdate') }}

                </label>
                <p class="mt-3 text-sm text-red-600">{{ $this->errorMessage }}</p>
            </div>


            <div class="row col-12 justify-content-center w-100">
                <div class="col-4 col-md-4 text-center">
                    <label for="" class="mb-2">{{ __('customTrans.year') }}</label>
                    <select wire:model="year" id="year" class="form-select @error('year') is-invalid @enderror">
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
                    <select wire:model="month" id="month" class="form-select @error('month') is-invalid @enderror">
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
                    <select wire:model="day" id="day" class="form-select @error('day') is-invalid @enderror">
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
        @foreach ($this->questions as $data)
            @if ($data->q1)
                <span for="q1" class="col-md-4">السؤال
                    الاول:</span>

                <div>
                    <p id="q1_p" type="text" class="form-control border-0  mb-0 ">
                        {{ $data->q1 }}؟
                    </p>
                </div>

                <div>
                    <label for="answer_q1" class="col-form-label required ">
                        {{ __('customTrans.answer_q1') }}
                    </label>

                    <div class=" rounded-md shadow-sm">
                        <input wire:model="answer_q1" id="answer_q1" type="text" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('user_name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                    <small class="text-muted" style="font-size: 12px;">مثال : 2012</small>
                    @error('answer_q1')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            @if ($data->q2)
                <span for="q1" class="col-md-4 mt-4 ">السؤال
                    الثاني:</span>

                <div>
                    <p id="q1_p" type="text" class="form-control border-0  mb-0 ">
                        {{ $data->q2 }}؟
                    </p>
                </div>

                <div>
                    <label for="answer_q2" class="col-form-label required ">
                        {{ __('customTrans.answer_q2') }}
                    </label>

                    <div class=" rounded-md shadow-sm">
                        <input wire:model="answer_q2" id="answer_q2" type="text" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('user_name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                    <small class="text-muted" style="font-size: 12px;">مثال : 1990</small>
                    @error('answer_q2')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
            @endif


            <p class="mt-2 text-sm text-red-600">{{ $this->errorMessage }}</p>
        @endforeach
        <div class="mt-4">
            <span class="block w-full rounded-md shadow-sm">
                <button type="submit" wire:click='checkAnswers'
                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    {{ __('customTrans.continue') }}
                </button>
            </span>
        </div>
    @endif

</div>
