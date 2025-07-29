<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Citizen;
use Livewire\Component;
use Illuminate\View\View;
use App\Factories\CheckAnswers;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class Register extends Component
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
    public $errorMessage;

    protected CheckAnswers $checkAnswerFactory;


    public function __construct()
    {

        $this->checkAnswerFactory = app(CheckAnswers::class);
    }



    public function rules(): mixed
    {

        $rules = [
            'user_name' => ['required', 'numeric', 'min_digits:9', 'max_digits:9', 'exists:ssn_login_ques_tb,idc', 'unique:users,user_name'],
            'year' => ['required', 'numeric', 'min:1900', 'max:2008'],
            'month' => ['required', 'numeric', 'min:1', 'max:12'],
            'day' => ['required', 'numeric', 'min:1', 'max:31'],
            'mobile' => ['required', 'numeric',  'unique:users,mobile', 'min_digits:10', 'max_digits:10'],
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
            'user_name' => ['required', 'numeric', 'min_digits:9', 'max_digits:9', 'exists:ssn_login_ques_tb,idc', 'unique:users,user_name'],
        ];
        $this->validate($rule, $message_rules);
    }

    public function updatedMobile(): void
    {
        $this->validate([
            'mobile' => ['required', 'numeric',  'min_digits:10', 'max_digits:10'],
        ]);
    }


    public function checkAnswers(): void
    {


        if (! empty($this->answer_q1) && ! empty($this->answer_q2)) {

            $result = $this->checkAnswerFactory->check($this->citizen, $this->answer_q1, $this->answer_q2);
        }

        $this->trueAnswer = $result['success'];

        $this->errorMessage = $result['error'];
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



    public function register(): mixed
    {

        if ($this->trueAnswer == 0) {
            return '';
        }

        $this->validate();


        $data = $this->citizen()->first();

        $full_name = ($data->CI_FIRST_ARB . ' ' . $data->CI_FATHER_ARB . ' ' . $data->CI_GRAND_FATHER_ARB . ' ' . $data->CI_FAMILY_ARB);


        $user = User::create([
            'user_name' => $this->user_name,
            'full_name' =>  $full_name,
            'mobile' =>  $this->mobile,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render(): View
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
