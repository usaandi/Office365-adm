<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Validator;
use Auth;

class DepartmentController extends Controller
{

    public function viewAdminDepartment()
    {
        try {
            $auth = \Auth::user();
            $this->authorize('admin', $auth);
            $departments = Department::get();

            return view('Department')->with(['departments' => $departments]);

        } catch (\Exception $e) {
        }
    }

    public function userDepartment($id)
    {

        $departmentid = Department::findOrFail($id);

        $data = $departmentid->users()->get(['users_departments.id', 'name'])->toArray();

        if (!empty($data)) {

            foreach ($data as $key => $val) {

                if (array_key_exists('pivot', $data[$key])) {
                    unset($data[$key]['pivot']);
                }

            }

        }

        return $data;

    }

    public function department()
    {


        return view('team.departmentView');
    }

    public function departmentInfo()
    {

        $departments = Department::all();

        return $departments;


    }

    public function update(Request $request, $id)
    {
        try {
            $user = \Auth::user();
            $this->authorize('admin', $user);

            $data = $request->all();

            $rules = [
                'department_name' => 'required|max:255',
                'department_info' => 'required|max:5000',
                'department_abbr' => 'required|max:255',
            ];
            $validator = Validator::make($data, $rules);


            if ($validator->passes()) {

                $departmentName = ucfirst(strtolower($data['department_name']));
                $department = Department::find($id);

                $department->update([
                    'department_name' => $departmentName,
                    'department_info' => $data['department_info'],
                    'department_abbr' => $data['department_abbr']
                ]);
                return response(json_encode($department), 200);
            }
            if($validator->fails()){
                return response('Something went wrong',400);
            }

        } catch (\Exception $e) {

        }
    }

    public function delete(Request $request)
    {
        try {

            $user = \Auth::user();
            $this->authorize('admin', $user);
            $data = $request->all();
            $rules = [
                'departmentId' => 'required|int',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {

                $department = Department::where('id', $data['departmentId'])->delete();

                if ($department) {
                    return response('success', 200);

                }

            }

        } catch (\Exception $e) {

        }
    }

    public function view()
    {

        return view('team.departmentAdd');
    }

    public function store(Request $request)
    {

        try {

            $data = $request->all();
            $rules = [
                'departmentName' => 'required|string|max:255',
                'departmentAbbr' => 'required|string|max:10',
                'description' => 'required|string|min:3|max:2000',
            ];

            $validation = Validator::make($data, $rules);

            if ($validation->passes()) {


                $departmentName = $data['departmentName'];
                $departmentAbbr = $data['departmentAbbr'];
                $description = $data['description'];


                $department = Department::where('department_name', '=', $departmentName)->first();

                if ($department === null) {

                    $newDepartment = Department::create(['department_name' => $departmentName,
                        'department_abbr' => $departmentAbbr, 'department_info' => $description]);

                    return redirect('admin/department/list');
                }
                return view('team.departmentAdd', with(['error' => $department->department_name]));

            }

        } catch (\Exception $e) {
            return view('unauthorized.unauthorized', with(['error' => $e->getMessage()]));
        }

    }

    public function show($id)
    {
        // For some reason the variable name department did not work.

        $dprtment = Department::findOrFail($id);
        $users = $dprtment->users()->get();
        return view('team.teamView')->with(
            [
                'users' => $users,
                'department' => $dprtment,

            ]
        );
    }
}
