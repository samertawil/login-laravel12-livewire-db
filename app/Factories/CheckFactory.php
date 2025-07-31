<?php

namespace App\Factories;

use Illuminate\Database\Eloquent\Collection;

class CheckFactory
{

    public function __construct()
    {
        //
    }

    public function checkBirthdayDateFn(Collection $citizen, mixed $birthdayByUser) 
    {
        $data = $citizen->value('CI_BIRTH_DT');


        if ($data != $birthdayByUser) {

            return [
                'success' => 0,
                'error' => __('customTrans.wrong_birthdate'),
            ];
        }

        return [
            'success' => 1,
            'error' => null,
        ];
    }


    public function checkAnswersFn(Collection $citizen, int $answer_q1, int $answer_q2): mixed
    {

        $data = $citizen->select('answer_q1', 'answer_q2')->first();


        if (! ($answer_q1 == $data['answer_q1'] && $answer_q2 == $data['answer_q2'])) {

            return [
                'success' => false,
                'error' => __('customTrans.Answers do not match'),

            ];
        }


        return [
            'success' => true,
            'error' => null,

        ];
    }
}
