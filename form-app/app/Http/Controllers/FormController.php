<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function submitForm(Request $request)
    {
        // Validate the request data
        try {
            $this->validateRequest($request);
        } catch (ValidationException $e) {
            return redirect()->route('form.index')->withErrors($e->validator)->withInput();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }

        // Flash success message
        Session::flash('success', 'Form submitted successfully.');

        // Redirect back to the form page
        return redirect()->route('form.index');
    }

    public function showResult()
    {
        // Retrieve and pass the submitted data to the result view
        $data = [
            'name' => request('name'),
            'gender' => request('gender'),
            'age' => request('age'),
            'weight' => request('weight'),
            'height' => request('height'),
            'image' => request()->file('image') ? request()->file('image')->getClientOriginalName() : null,
        ];

        return view('result', compact('data'));
    }

    protected function validateRequest(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer',
            'weight' => 'required|numeric|min:2.50|max:99.99',
            'height' => 'required|numeric|min:0.50|max:2.50',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ])->validateWithBag('form');
    }
}
