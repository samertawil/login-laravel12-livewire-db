<?php

namespace App\Livewire\TechnicalSupport;


use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\TechnicalSupport;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use App\Trait\UploadingFilesTrait;
use Spatie\LivewireFilepond\WithFilePond;
use App\Services\CacheStatusModelServices;

class Create extends Component
{
    #[Validate(['required'])]
    public string $name;
    #[Validate(['required'])]
    #[Validate('exists:ssn_login_ques_tb,idc', message: 'رقم الهوية غير صحيح')]
    public string $user_name = '';
    #[Validate(['required', 'numeric', 'min_digits:10', 'max_digits:15'])]
    public string $mobile;
    #[Validate(['required'])]
    public int $subject_id;
    #[Validate(['required'])]
    public int $region_id;
    #[Validate(['required'])]
    public string $issue_description;
    #[Validate(['uploaded_files.*' => 'nullable|mimetypes:image/jpg,image/jpeg,image/png|max:5120'])]
    public  $uploaded_files =[];

    public string $captcha;

    use WithFilePond;


    public function rules(): array
    {
        return [

            'captcha' => ['required', 'captcha'],
        ];
    }



    public function create(): void
    {

        $this->validate();

        $files = null;

        if ( ! empty($this->uploaded_files)) {
            $files = UploadingFilesTrait::uploadAndCompressMulti($this->uploaded_files, 'test', 'public', 1);

        }

        $data = TechnicalSupport::create([
            'name' => $this->name,
            'user_name' => $this->user_name,
            'mobile' => $this->mobile,
            'subject_id' => $this->subject_id,
            'region_id' => $this->region_id,
            'issue_description' => $this->issue_description,
            'terminal_id' => 66,
            'uploaded_files' => $files,
        ]);

        $this->dispatch('reload');

        $this->dispatch(
            'alert',
            type: 'success',
            title: 'رسالة دعم فني',
            text: ' تم الارسال ',
            confirmButtonText: 'اغلاق'
        );
    }

    #[Computed()]
    public function statuses()
    {
        $statusData = new CacheStatusModelServices();
        $supportForLogin = $statusData->statusesPSubId(config('myconstants.supportForLogin'));
        $regions =  $statusData->statusesPSubId(config('myconstants.regions'));
        $supportForhelp =  $statusData->statusesPSubId(config('myconstants.supportForhelp'));




        return [
            'supportForLogin' => collect($supportForLogin)->pluck('status_name', 'id')->toArray(),
            'regions' => collect($regions)->pluck('status_name', 'id')->toArray(),
            'supportForhelp' => collect($supportForhelp)->pluck('status_name', 'id')->toArray(),

        ];
    }


    #[Layout('components.layouts.uilogin-admin-app')]
    public function render(): View
    {


        (string) $title = __('customTrans.technical support');
        return view('livewire.technical-support.create')->layoutData(['title' => $title]);
    }
}
