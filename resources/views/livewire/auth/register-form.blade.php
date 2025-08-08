
@if ($this->trueAnswer == 1)


<div class="form-group mb-5">
    <input wire:model.lazy="mobile" id="mobile"  name="mobile" dir="ltr"
        class="form-control h-auto form-control-solid py-4 m-auto  w-75 w-lg-100 text-center @error('mobile') is-invalid
    
    @enderror"
        type="text" placeholder="{{ __('customTrans.mobile') }}" />
    @include('layouts._show-error', ['field_name' => 'mobile'])
</div>


<div class="form-group mb-5">
    <input wire:model="password" name="password" dir="ltr"
        class="form-control h-auto form-control-solid py-4 m-auto  w-75 w-lg-100 text-center @error('password') is-invalid
    
    @enderror"
        type="password" placeholder="{{ __('customTrans.password') }}" />
    @include('layouts._show-error', ['field_name' => 'password'])
</div>


<div class="form-group mb-5">
    <input wire:model="passwordConfirmation" name="passwordConfirmation" dir="ltr"
        class="form-control h-auto form-control-solid py-4 m-auto  w-75 w-lg-100 text-center @error('password') is-invalid
    
    @enderror"
        type="password" placeholder="{{ __('customTrans.passwordConfirmation') }}" />
    @include('layouts._show-error', ['field_name' => 'passwordConfirmation'])
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