<?php

namespace App\Http\Controllers;

use App\Models\EducationalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationalInfoController extends Controller
{
    public function index()
    {
        $educationalInfos = EducationalInfo::all();
        return view('educational-info.index', compact('educationalInfos'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'subject' => 'required|max:100',
            'level' => 'required|in:Primary,Secondary,Higher Education',
            'publication_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ], 422);
        }

        $educationalInfo = EducationalInfo::create($request->all());

        return response()->json([
            'error' => false,
            'educationalInfo' => $educationalInfo
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'subject' => 'required|max:100',
            'level' => 'required|in:Primary,Secondary,Higher Education',
            'publication_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ], 422);
        }

        $educationalInfo = EducationalInfo::findOrFail($id);
        $educationalInfo->update($request->all());

        return response()->json([
            'error' => false,
            'educationalInfo' => $educationalInfo
        ]);
    }

    public function destroy($id)
    {
        $educationalInfo = EducationalInfo::findOrFail($id);
        $educationalInfo->delete();

        return response()->json([
            'error' => false,
            'message' => 'Educational information deleted successfully'
        ]);
    }
}