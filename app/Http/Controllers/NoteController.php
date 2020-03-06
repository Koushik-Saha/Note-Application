<?php

namespace App\Http\Controllers;

use App\note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware(['auth', 'verified']);
//    }

    //Show note page
    public function noteShow()
    {
        return view('note');
    }

    //Store note
    public function noteProcess(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title'        => ['required'],
            'description'        => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with($validator);
        }

        note::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);


        return redirect()->back()->with('message','Note has been save successfully !');
    }

    //Edit note
    public function edit($id) {

        $note = note::findOrFail($id);

        return view('edit-note')
            ->with([
                'note' => $note
            ]);
    }


    //Update note
    public function updateNote(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'title'        => ['required'],
            'description'        => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with($validator);
        }

        $note = note::findOrFail($id);

        $note->title = $request->post('title');
        $note->description = $request->post('description');

        $note->save();


        return redirect()->route('note')->with('message','Note has been updated successfully');

    }

    //Delete note
    public function del($id){

        $note=note::find($id);

            $note->delete();
            return redirect()->back()->with('success', 'Note Delete Successfully!');

    }
}
