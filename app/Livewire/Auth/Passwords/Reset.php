<?php

namespace App\Livewire\Auth\Passwords;

use App\Models\User;
use App\Models\Citizen;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class Reset extends Component
{
    public string $user_name  = '';
    public string $mobile  = '';
    public string $year  = '';
    public string $month  = '';
    public string $day  = '';
    public string $password = '';
    public string $passwordConfirmation = '';
    public mixed $showQuestions = 0;
    public string $answer_q1 = '';
    public string $answer_q2 = '';
    public int $trueAnswer = 0;

    public function rules(): mixed
    {

        $rules = [
            'user_name' => ['required', 'numeric', 'min_digits:9', 'max_digits:9', 'exists:ssn_login_ques_tb,idc', 'exists:users,user_name'],
            'year' => ['required', 'numeric', 'min:1900', 'max:2008'],
            'month' => ['required', 'numeric', 'min:1', 'max:12'],
            'day' => ['required', 'numeric', 'min:1', 'max:31'],
            'password' => ['required', 'string', 'min:4', 'same:passwordConfirmation'],
            'answer_q1' => ['required'],
            'answer_q2' => ['required'],

        ];
        $data = $this->citizen()->first();
        if (!$data->q1) {
            unset($rules['answer_q1']);
            unset($rules['answer_q2']);
        }
        return $rules;
    }


    public function checkDate(): void
    {

        $birthdayByUser = $this->year . '-' . $this->month . '-' . $this->day;

        if ($this->user_name) {

            $data = $this->citizen()->value('CI_BIRTH_DT');

            if ($data == $birthdayByUser) {
                $this->showQuestions = 1;
            } else {
                $this->addError('wrongDate', __('customTrans.wrong_birthdate'));
                $this->showQuestions = 0;
            }
        }
    }

    public function updatedUserName(): void
    {

        $message_rules = [

            'user_name.exists' => 'رقم الهوية غير صالح',
        ];

        $rule = [
            'user_name' => ['required', 'numeric', 'min_digits:9', 'max_digits:9', 'exists:ssn_login_ques_tb,idc', 'exists:users,user_name'],
        ];
        $this->validate($rule, $message_rules);
    }

    public function checkAnswers(): mixed
    {

        $data = $this->citizen()->select('answer_q1', 'answer_q2')->first();


        if (! ($this->answer_q1 == $data['answer_q1'] && $this->answer_q2 == $data['answer_q2'])) {
            return    $this->addError('wrongQuestion', ' خطأ بإجابة الاسئلة ');
        }

        return $this->trueAnswer = 1;
    }


    #[Computed()]
    public  function citizen(): mixed
    {

        return Citizen::where('idc', $this->user_name)->get();
    }

    #[Computed()]
    public function questions(): mixed
    {
        if ($this->showQuestions == 1) {

            return $this->citizen();
        }
        return '';
    }



    public function resetPassword()
    {
        if ($this->trueAnswer == 0) {
            return '';
        }

        $this->validate();

        $user=User::where('user_name',$this->user_name)->update([
            'password' => Hash::make($this->password),
        ]);
        
        $user=User::where('user_name',$this->user_name)->first();
        
        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }


    protected function guard()
    {
        return Auth::guard();
    }

    public function render(): View
    {
        return view('livewire.auth.passwords.reset')->extends('layouts.auth');
    }
}
