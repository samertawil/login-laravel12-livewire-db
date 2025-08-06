 

@if ($this->questions && $this->trueAnswer == 0)
    @foreach ($this->questions as $data)
        @if ($data->q1)
            <div class="text-left">
                <p type="text" class="form-control border-0   mb-0 ">
                    <span class="">{{ __('customTrans.recoveryQuestions.0') }}:
                    </span> {{ $data->q1 }}؟
                </p>
            </div>

            <div class="text-left">

                <div>
                    <p type="text" class="form-control border-0   mb-0 ">
                        <span class=""> {{ __('customTrans.answer_q1') }}
                        </span>
                    </p>
                    <div class=" rounded-md shadow-sm">
                        <input wire:model="answer_q1" id="answer_q1" type="text" autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('user_name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                </div>

                <small class="text-muted" style="font-size: 12px;">مثال : 2000</small>
                @error('answer_q1')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        @endif

        @if ($data->q2)
            <div class="text-left mt-4">
                <p type="text" class="form-control border-0 fs-3  mb-0 ">
                    <span class="">{{ __('customTrans.recoveryQuestions.1') }}:
                    </span> {{ $data->q2 }}؟
                </p>
            </div>

            <div class="text-left">

                <div>
                    <p type="text" class="form-control border-0   mb-0 ">
                        <span class=""> {{ __('customTrans.answer_q2') }}
                        </span>
                    </p>
                    <div class=" rounded-md shadow-sm">
                        <input wire:model="answer_q2" id="answer_q2" type="text"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('user_name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                </div>

                <small class="text-muted" style="font-size: 12px;">مثال : 1990</small>
                @error('answer_q2')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        @endif
    @endforeach
    <div>
        <button type="submit" class="btn btn-sm btn-light-primary btn btn-light-info font-weight-bold px-9 py-4"
            wire:click="checkAnswers" wire:loading.remove="">استمرار

        </button>
    </div>


@endif

<div class="mt-9">
    <p class="text-sm text-red-600">{{ $this->errorMessage }}</p>
</div>



