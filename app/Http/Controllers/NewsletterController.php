<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    // public function subscribe(Request $request)
    // {
    //     // validate data
    //     $request->validate([
    //         'email' => 'required|email|unique:subscribers,email',
    //     ]);

    //     // Add your logic for newsletter subscription here
    //      $email = $request->input('email');

    //     // Save the email in the database
    //     Subscriber::create(['email' => $email]);


    //     return redirect()->back()->with('success', 'Subscribed successfully!');
    // }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $email = $request->input('email');
        Subscriber::create(['email' => $email]);

        return response()->json(['message' => 'Newsletter Subscribed successfully!'], 200);
    }

    // For show in Admin panel
    public function showSubscriber() {
        $subscribers = Subscriber::latest()->paginate(10);
        return view('admin.subscriber-list', compact('subscribers'))->with(
            'i',
            (request()->input('page', 1) - 1) *10
        );
    }

    // For delete in Admin panel
    public function destroy($id)
    {
        $subscriber = Subscriber::where('id', $id)->first();
        $subscriber->delete();
        return back()->withSuccess('Subscriber deleted successfully');
    }
}
