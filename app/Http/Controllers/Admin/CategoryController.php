<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use TranslatedResources;
use Validator;

class CategoryController extends Controller
{
    /* view page of creating categories */
    public function create()
    {
        $parent_id = Category::where('status', 1)->pluck('category_name', 'category_id');
        return view('category.create-category', ['form_type' => 'create', 'parent_id' => $parent_id]);
    }

    /* save category details */
    public function save(Request $request)
    {
        $input = $request->input();
        $validator = $this->validator($input);

        if ($input['parent_id'] == '') {
            $input['parent_id'] = 0;
        }

        /* check validation */
        if ($validator->fails()) {
            Session::flash('error', trans('validation.form_error'));
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            /* update category */
            if (isset($input['category_id'])) {
                $category = Category::where('category_id', $input['category_id'])->first();
                $category->update(['category_name' => $input['category_name'],
                    'parent_id' => $input['parent_id'],
                    'description' => $input['description'],
                    'status' => $input['status'],
                ]);
                $updation_success_msg = TranslatedResources::translatedData()['updation_success_msg'];
                Session::flash('success', $updation_success_msg);
                return back();
            }
            /* create catgory */
            else {
                Category::create(['category_id' => uniqid(),
                    'parent_id' => $input['parent_id'],
                    'category_name' => $input['category_name'],
                    'description' => $input['description'],
                    'status' => $input['status'],
                    'created_by' => Auth::User()->user_id,
                ]);
                $creation_success_msg = TranslatedResources::translatedData()['creation_success_msg'];
                Session::flash('success', $creation_success_msg);
                return back();
            }
        }
    }

    //VALIDATOR FOR CREATE CATEGORY
    protected function validator($request)
    {
        return Validator::make($request, [
            'category_name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
    }

    /* view page of edit category */
    public function edit($category_id = null)
    {
        $category = Category::where('category_id', $category_id)->first();
        $parent_id = Category::where('status', 1)->pluck('category_name', 'category_id');
        return view('category.create-category', ['form_type' => 'edit', 'category' => $category, 'parent_id' => $parent_id]);
    }

    /* list of categories */
    public function lists()
    {
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->get();
        return view('category.list-category', ['categories' => $categories]);
    }
}
