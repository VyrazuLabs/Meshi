<?php

namespace app\Helpers;

use App\Helpers\Contracts\UserDetailsTranslationContract;

class UserDetailsTranslation implements UserDetailsTranslationContract
{
    public static function getTranslated()
    {
        $data = [];
        $age10 = trans('app.age 10');
        $age20 = trans('app.age 20');
        $age30 = trans('app.age 30');
        $age40 = trans('app.age 40');
        $age50 = trans('app.age 50');
        $age60 = trans('app.age 60');
        $age70 = trans('app.age 70');
        $age80 = trans('app.age 80');

        $male_sex = trans('app.male_sex');
        $female_sex = trans('app.female_sex');
        $other_sex = trans('app.other_sex');

        $ages = ['10' => $age10, '20' => $age20, '30' => $age30, '40' => $age40, '50' => $age50, '60' => $age60, '70' => $age70, '80' => $age80];
        $genders = ['male' => $male_sex, 'female' => $female_sex, 'other' => $other_sex];

        $data['ages'] = $ages;
        $data['genders'] = $genders;

        return $data;
    }
}
