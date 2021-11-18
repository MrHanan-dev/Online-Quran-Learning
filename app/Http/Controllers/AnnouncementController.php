<?php

namespace App\Http\Controllers;
use App\Models\Announcement;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function addAnnouncement()
    {
        $admin = new Announcement();
        $admin->announcement = request('announcement');
        $admin->save();
        return view ('admin.addAnnouncement')->with('success','Announcement Added Successfully');
    }
    public function viewAnnouncement()
    {
        $admin = Announcement::all();
        return view ('admin.viewAnnouncement')->with('admin',$admin);
    }
    public function deleteAnnouncement($id)
    {
        $admin = Announcement::find($id);
        $admin->delete();
        return redirect()->back()->with('success','Announcement Deleted Succesfully');
    }
}
