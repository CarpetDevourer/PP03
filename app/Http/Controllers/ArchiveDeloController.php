<?php

namespace App\Http\Controllers;

use App\Models\ArchiveRequest;
use App\Models\SalaryRecord;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestProcessed;

class ArchiveDeloController extends Controller
{
    public function create()
    {
        return view('pages.main'); // Убедитесь, что этот view существует
    }
    public function store(HttpRequest $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'organization' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'comment' => 'nullable|string'
        ]);

        $requestModel = ArchiveRequest::create($validated);

        return redirect()->back()->with('success', 'Дело внесено!');
    }

    public function update(HttpRequest $request, $id)
    {
        $requestModel = ArchiveRequest::findOrFail($id);

        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'hours_worked' => 'required|integer',
            'salary_jan' => 'nullable|numeric',
            'salary_feb' => 'nullable|numeric',
            'salary_mar' => 'nullable|numeric',
            'salary_apr' => 'nullable|numeric',
            'salary_may' => 'nullable|numeric',
            'salary_jun' => 'nullable|numeric',
            'salary_jul' => 'nullable|numeric',
            'salary_aug' => 'nullable|numeric',
            'salary_sep' => 'nullable|numeric',
            'salary_oct' => 'nullable|numeric',
            'salary_nov' => 'nullable|numeric',
            'salary_dec' => 'nullable|numeric',
        ]);

        $salaryRecord = SalaryRecord::updateOrCreate(
            ['request_id' => $id],
            [
                'applicant_name' => $requestModel->applicant_name,
                'position' => $validated['position'],
                'hours_worked' => $validated['hours_worked'],
                'salary_jan' => $validated['salary_jan'],
                'salary_feb' => $validated['salary_feb'],
                'salary_mar' => $validated['salary_feb'],
                'salary_apr' => $validated['salary_feb'],
                'salary_may' => $validated['salary_feb'],
                'salary_jun' => $validated['salary_feb'],
                'salary_jul' => $validated['salary_feb'],
                'salary_aug' => $validated['salary_feb'],
                'salary_sep' => $validated['salary_feb'],
                'salary_oct' => $validated['salary_feb'],
                'salary_nov' => $validated['salary_feb'],
                'salary_dec' => $validated['salary_feb'],

            ]
        );

        $requestModel->update(['status' => 'completed']);

        Mail::to($requestModel->email)->send(new RequestProcessed($requestModel));

        return redirect()->route('dashboard')->with('success', 'Заявка успешно обработана!');
    }
}
