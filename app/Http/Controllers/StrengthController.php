<?php

namespace App\Http\Controllers;

use App\Category;
use App\StrengthCategory;
use Illuminate\Http\Request;
use Validator;
use App\Strength;


class StrengthController extends Controller
{
    public function view()
    {
        try {

            $user = \Auth::user();
            $this->authorize('admin', $user);

            $categories = Category::get(['id', 'category_name']);
            return view('strength.strength')->with(['categories' => $categories]);

        } catch (\Exception $e) {
            return redirect('/unauthorized');
        }


    }

    public function returnStrengthName()
    {
        try {
            $array=[];
            //TODO
            $categories = Category::with('strengths')->get();
            foreach ($categories as $i => $category){
                $array[$i]=[
                  'category'=> $category->category_name,
                ];
                foreach ($category->strengths()->get() as $strength){
                    $array[$i]['strengths'][]=[
                      'strength_id' => $strength->id,
                      'strength_name' => $strength->strength_name,
                    ];
                }
            }
            return $array;
        } catch (\Exception $e) {
        }
    }

    public function createStrength(Request $request)
    {

        try {

            $data = $request->all();
            $rules = [
                'category_id' => 'required|string',
                'strength_name' => 'required|string',
                'strength_description' => 'required|string',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {

                $categoryId = $data['category_id'];

                $strengthName = ucfirst(strtolower($data['strength_name']));

                $strength = Strength::where('strength_name', $strengthName)->get();

                if ($strength->isEmpty()) {

                    $strengthId = Strength::create([
                        'strength_name' => $strengthName,
                        'strength_description' => $data['strength_description'],
                    ])->id;

                    $this->findOrCreateStrengthCategory($strengthId, $categoryId);
                }


            }
            return redirect()->back();

        } catch (\Exception $e) {


        }


    }

    protected function findOrCreateStrengthCategory($strengthId, $categoryId)
    {
        try {

            $strengthCategory = StrengthCategory::where('category_id', $categoryId)
                ->where('strength_id', $strengthId)->get();

            if ($strengthCategory->isEmpty()) {

                $strengthCategoryCreate = StrengthCategory::create([
                    'strength_id' => $strengthId,
                    'category_id' => $categoryId,
                ]);

            }

        } catch (\Exception $e) {
        }

    }
}
