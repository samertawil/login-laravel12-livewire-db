<?php

namespace App\Livewire\TechnicalSupport;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use App\Models\TechnicalSupport;
use Livewire\Attributes\Validate;
 
 
 
 

class TechSupportCreate extends Component
{
    #[Validate(['required'])]
    public string $name;
    #[Validate(['required'])]
    #[Validate('exists:ssn_login_ques_tb,idc', message:'رقم الهوية غير صحيح')]
    public string $user_name='';
    #[Validate(['required','numeric','min_digits:10','max_digits:15'])]
    public string $mobile;
    #[Validate(['required'])]
    public int $subject_id;
    #[Validate(['required'])]
    public int $region_id;
    #[Validate(['required'])]
    public string $issue_description;
 
    public string $captcha;

    public function create(): void
    {
    //    $this->validate();
       
       $this->validate([
        'captcha'=>['required','captcha']
       ]);

            
        $data = TechnicalSupport::create([
            'name' => $this->name,
            'user_name' => $this->user_name,
            'mobile' => $this->mobile,
            'subject_id' => $this->subject_id,
            'region_id'=>$this->region_id,
            'issue_description' => $this->issue_description,
        ]);
        
        $this->reset();

        $this->dispatch(
            'alert',
            type: 'success',
            title: 'رسالة دعم فني',
            text: ' تم الارسال ' ,
            confirmButtonText: 'اغلاق'
        );
    }

 
    #[Layout('components.layouts.app-login')]
    public function render(): View
    {
 
       

        (string) $title=__('customTrans.technical support');
        return view('livewire.technical-support.create')->layoutData(['title'=>$title,'pagetitle'=>$title]);
    }
}
