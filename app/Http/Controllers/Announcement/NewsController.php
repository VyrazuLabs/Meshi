<?php

namespace App\Http\Controllers\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Announcement\News;
use Illuminate\Http\Request;
use Session;
use TranslatedResources;
use Validator;

class NewsController extends Controller
{
    /* show list of created news */
    public function lists()
    {
        $newsList = News::get();
        return view('announcement.list-news', ['news' => $newsList]);
    }

    /* show news creation page in create mode */
    public function add()
    {
        return view('announcement.add-news', ['form_type' => 'create']);
    }

    /* show news creation page in edit mode */
    public function edit($news_id = null)
    {
        $news_details = News::where('news_id', $news_id)->first();
        return view('announcement.add-news', ['form_type' => 'edit', 'news_details' => $news_details]);
    }

    public function save(Request $request)
    {
        $input = $request->input();
        $validator = $this->validator($input);

        if (!isset($input['highlight'])) {
            $input['highlight'] = 0;
        }

        /* check validation */
        if ($validator->fails()) {
            Session::flash('error', trans('validation.form_error'));
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            /* update news */
            if (isset($input['news_id'])) {
                $news = News::where('news_id', $input['news_id'])->first();
                $news->update(['title' => $input['title'],
                    'contents' => $input['contents'],
                    'highlight' => $input['highlight'],
                    'status' => $input['status']]);
                Session::flash('success', TranslatedResources::translatedData()['updation_success_msg']);
            } else {
                /* create news */
                News::create(['title' => $input['title'],
                    'news_id' => uniqid(),
                    'contents' => $input['contents'],
                    'highlight' => $input['highlight'],
                    'status' => $input['status'],
                ]);
                Session::flash('success', TranslatedResources::translatedData()['creation_success_msg']);
            }
        }
        return back();
    }

    //VALIDATOR FOR ADDING NEWS
    protected function validator($request)
    {
        return Validator::make($request, [
            'title' => 'required',
            'contents' => 'required',
            'status' => 'required',
        ]);
    }
}
