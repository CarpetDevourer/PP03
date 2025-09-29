<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArchiveRequest;

class archiveDeloEditController extends Controller
{
    public function edit($id)
    {
        $request = ArchiveRequest::findOrFail($id);
        return view('pages.archiveDeloEdit', compact('archiveDelo'));
    }

    public function update(Request $request, $id)
    {
        try {
            $archiveRequest = ArchiveRequest::findOrFail($id);

            $validated = $request->validate([
                'position' => 'required|string|max:255',
                'salary_data' => 'required|string',
                'archivist_comment' => 'nullable|string',
                'status' => 'required|in:new,in_progress,completed'
            ]);


            $validated['archivist_name'] = auth()->user()->name ?? 'Система';

            $archiveRequest->update($validated);

            return redirect()->route('dashboard')->with('success', 'Заявка #' . $id . ' успешно обновлена!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при сохранении: ' . $e->getMessage());
        }
    }
}
