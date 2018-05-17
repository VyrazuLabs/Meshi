<?php

namespace app\Helpers;

use App\Helpers\Contracts\ResourseTranslationContract;
use Session;

class ResourseTranslation implements ResourseTranslationContract
{
    public static function translatedData()
    {
        $langName = [];
        $data = [];

        if (Session::has('lang_name')) {
            $langName = Session::get('lang_name');
        }

        if ($langName == 'en') {
            $data['crop_button'] = 'Crop';
            $data['invalid_qty_msg'] = 'Invalid order quantity';
            $data['order_validation_msg'] = 'Something went wrong. please try again';
            $data['delete_warning_msg'] = 'Are you sure to delete it?';
            $data['lang_name'] = 'en';
            $data['payment_success_msg'] = 'Payment Successful';
            $data['payment_failed_msg'] = 'Payment failed';
            $data['image_validation_error'] = 'Image should be in jpg,jpeg or png format.';
            $data['updation_success_msg'] = 'Updated successfully.';
            $data['creation_success_msg'] = 'Created successfully.';
            $data['deletion_success_msg'] = 'Deleted successfully.';
            $data['password_validation_error'] = 'Please enter a valid password';
            $data['phone_validation_error'] = 'Please enter a valid phone number';
            $data['successful_registration'] = 'User registered successfully';
            $data['sent_feedback'] = 'Sent Successfully';
        } else {
            $data['crop_button'] = '作物';
            $data['invalid_qty_msg'] = '無効 注文数';
            $data['order_validation_msg'] = '何かが間違っていた。もう一度お試しください';
            $data['delete_warning_msg'] = '削除してもよろしいですか？';
            $data['lang_name'] = 'ja';
            $data['payment_success_msg'] = '支払いの成功';
            $data['payment_failed_msg'] = '支払いに失敗しました';
            $data['image_validation_error'] = '画像はjpg、jpegまたはpng形式である必要があります';
            $data['updation_success_msg'] = '更新成功';
            $data['creation_success_msg'] = '正常に作成されました。';
            $data['deletion_success_msg'] = '正常に削除されました。';
            $data['password_validation_error'] = '有効なパスワードを入力して下さい';
            $data['phone_validation_error'] = '有効な電話番号を入力して下さい';
            $data['successful_registration'] = 'ユーザーが登録されました';
            $data['sent_feedback'] = '成功裏に送信されました';

        }
        return $data;
    }
}
