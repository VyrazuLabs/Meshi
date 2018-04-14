<?php

namespace App\Http\Controllers\Feedback;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use App\Models\Feedback\Feedback;
use Mail;

class FeedbackController extends Controller
{
  /* send feedback */
  public function sendFeedback(Request $request) {
      $input = $request->input();
      $validator = $this->validator($input);

      if($validator->fails()) {
        Session::flash('error', trans('validation.form_error'));
        return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        Feedback::create(['feedback_id' => uniqid(),
                          'name' => $input['name'],
                          'email' => $input['email'],
                          'subject' => $input['subject'],
                          'message' => $input['message']
                        ]);

        //****** CODE FOR MAIL SENDING ******//
         $email = 'contact@sharemeshi.com'; //this email is for feedback section
        Mail::send('feedback.feedback-mail',['subject'=>$input['subject'],'messages' => $input['message'], 'name' => $input['name'], 'sender' => $input['email']], function($message) use ($input,$email) {
          $message->to($email)
                  ->subject('FEEDBACK');
        });
        Session::flash('success','Send Successfully.');
      }
      return back();
    }


    //VALIDATOR FOR FEEDBACK CREATION
    protected function validator($request) {
        return Validator::make($request,[
                                      'name' => 'required',
                                      'email' => 'required|email',
                                      'subject' => 'required',
                                      'message' => 'required'
                                    ]);
    }

    public function lists() {
    	$feedbacks = Feedback::orderBy('created_at','DESC')->get();
    	return view('feedback.list-feedback',['feedbacks'=>$feedbacks]);
    }

    public function view($feedback_id = null) {
    	$feedback = Feedback::where('feedback_id',$feedback_id)->first();
    	return view('feedback.view-feedback',['feedback'=>$feedback]);
    }
}
