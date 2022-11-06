<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Validator;

class NotificationController extends Controller
{
    /**
     * Index of notifications
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::paginate(50);

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Create a new notification
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'notification' => 'required'
        ], [
            'notification.required' => 'Please enter the text of the notification you are creating'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $notification = Notification::create(['notification' => $request->notification]);

        return redirect()->to('/admin/notifications/' . $notification->id . '/edit')->with('success', 'You have successfully created this notification!');
    }

    /**
     * Edit notification
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::where('id', $id)->first();

        return view('admin.notifications.edit', compact('notification'));
    }

    /**
     * Update existing notification
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'notification' => 'required'
        ], [
            'notification.required' => 'Please enter the text of the notification you are creating'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $notification = Notification::where('id', $id)->first();
        $notification->update([
            'notification' => $request->notification,
            'display_from' => $request->display_from,
            'display_to' => $request->display_to
        ]);

        return redirect()->to('/admin/notifications')->with('success', 'You have successfully updated this notification!');
    }

    /**
     * Delete notification
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Notification::where('id', $id)->delete();

        return redirect()->back()->with('success', 'You have successfully deleted this notification!');
    }
}
