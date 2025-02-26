<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function store(Request $request, Course $course)
    {
        // Cek apakah jumlah pertemuan sudah mencapai batas
        if ($course->meeting_limit !== null && $course->meetings()->count() >= $course->meeting_limit) {
            return redirect()->back()->with('error', 'Meeting limit reached for this course.');
        }

        // Validasi input pertemuan
        $request->validate([
            'meeting_time' => 'required|date',
        ]);

        // Simpan pertemuan jika masih tersedia slot
        $meeting = new Meeting();
        $meeting->course_id = $course->id;
        $meeting->meeting_time = $request->meeting_time;
        $meeting->save();

        return redirect()->back()->with('success', 'Meeting scheduled successfully.');
    }
}
