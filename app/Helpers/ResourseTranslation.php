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
            $data['rating_validation_error'] = 'Rating field is required';
            $data['reset_password_subject'] = 'Sharemeshi password reset link';
            $data['mail_sent_msg'] = 'Mail Sent';
            $data['invalid_email_error_msg'] = 'Invalid Email';
            $data['password_updation_success'] = 'Password has been changed';
            $data['password_validation_msg'] = 'Please enter registered email';

        } else {
            $data['crop_button'] = '画像を切り取る';
            $data['invalid_qty_msg'] = '注文数が無効です';
            $data['order_validation_msg'] = 'エラーが発生しました。もう一度お試しください';
            $data['delete_warning_msg'] = '削除してもよろしいですか？';
            $data['lang_name'] = 'ja';
            $data['payment_success_msg'] = '支払いが成功しました';
            $data['payment_failed_msg'] = '支払いに失敗しました。もう一度お試しください';
            $data['image_validation_error'] = '画像はjpg、jpegまたはpng形式である必要があります';
            $data['updation_success_msg'] = '正常に更新されました';
            $data['creation_success_msg'] = '正常に登録されました';
            $data['deletion_success_msg'] = '正常に削除されました';
            $data['password_validation_error'] = '有効なパスワードを入力して下さい';
            $data['phone_validation_error'] = '有効な電話番号を入力して下さい';
            $data['successful_registration'] = 'ユーザーが登録されました';
            $data['sent_feedback'] = '正常に送信されました';
            $data['rating_validation_error'] = '評価フィールドは必須です';
            $data['reset_password_subject'] = 'パスワードリセットリンク';
            $data['mail_sent_msg'] = 'メールが送信されました';
            $data['invalid_email_error_msg'] = '無効なメール';
            $data['password_updation_success'] = 'パスワードが変更されました';
            $data['password_validation_msg'] = '登録したメールアドレスを入力してください';

        }
        return $data;
    }
}
