<?php

namespace App\Http\Controllers;
use App\Models\Recruitment;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index() : View
    {

      $recruitments = Recruitment::all();
      return view('admin.recruitment.index', compact('recruitments'));
    }

   public function create ($recruitments)
   {
    return view('recruitment.create', compact('recruitments'));
   }

   public function store(Request $request) {
     $request->validate([
       'name' =>'required|string|max:255',
       'position' =>'required|string|max:255',
       'description' =>'required|string|max:255',
       'attachment' => 'nullable|file|mimes:pdf,jpg,png'
     ]);

     $recruitment = new Recruitment();
     $recruitment->name = $request->name;
     $recruitment->position = $request->position;
     $recruitment->description = $request->description;

     if ($request->hasFile('attachment')) {
       $attachment = $request->file('attachment');
       $attachmentName = time(). '.'. $attachment->getClientOriginalExtension();
       $attachment->storeAs('attachments', $attachmentName);
       $recruitment->attachment = $attachmentName;
     }

     $recruitment->save();

     return redirect()->route('recruitment.index')->with('success', 'Recruitment created successfully');
     
   }
}
