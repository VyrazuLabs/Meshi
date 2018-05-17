<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback\Feedback;
use Illuminate\Http\Request;
use Mail;
use Session;
use TranslatedResources;
use Validator;

class FeedbackController extends Controller
{
    /* send feedback */
    public function sendFeedback(Request $request)
    {
        $input = $request->input();
        $validator = $this->validator($input);

        if ($validator->fails()) {
            Session::flash('error', trans('validation.form_error'));
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Feedback::create(['feedback_id' => uniqid(),
                'name' => $input['name'],
                'email' => $input['email'],
                'subject' => $input['subject'],
                'message' => $input['message'],
            ]);

            //****** CODE FOR MAIL SENDING ******//
            $email = 'contact@sharemeshi.com'; //this email is for feedback section
            Mail::send('feedback.feedback-mail', ['subject' => $input['subject'], 'messages' => $input['message'], 'name' => $input['name'], 'sender' => $input['email']], function ($message) use ($input, $email) {
                $message->to($email)
                    ->subject('FEEDBACK');
            });
            $sent_feedback = TranslatedResources::translatedData()['sent_feedback'];
            Session::flash('success', $sent_feedback);
        }
        return back();
    }

    //VALIDATOR FOR FEEDBACK CREATION
    protected function validator($request)
    {
        return Validator::make($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
    }

    /* list of received feedbacks  */
    public function lists()
    {
        $feedbacks = Feedback::orderBy('created_at', 'DESC')->get();
        return view('feedback.list-feedback', ['feedbacks' => $feedbacks]);
    }

    /* view feedback details from admin panel */
    public function view($feedback_id = null)
    {
        $feedback = Feedback::where('feedback_id', $feedback_id)->first();
        return view('feedback.view-feedback', ['feedback' => $feedback]);
    }
}
