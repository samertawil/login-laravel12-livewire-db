<?php

namespace App\Factories;

use Illuminate\Database\Eloquent\Collection;

class CheckAnswers {

    public function check(Collection $citizen, int $answer_q1, int $answer_q2): mixed
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