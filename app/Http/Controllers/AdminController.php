<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Lấy tổng số người dùng và tổng số video
    public function getAll() {
        $video = count(Video::all());
        $user  = count(User::all());
        return view('admin', compact('video', 'user'));
    }

    public function getUser() {
        $users = User::all();
        return view('admin.listUser', compact('users'));
    }

    public function getVideo() {
        $videos = Video::all();
        return view('admin.listVideo', compact('videos'));
    }

    // ========================== Xử Lý Video ================================//
    public function getEditVideo($id) {
        $videos = Video::whereId($id)->get();
        return view('admin.editVideo', compact('videos', 'id'));
    }
    public function EditVideo(Request $request, $id) {
        $validatedData = $request->validate([
            'video_name'    => 'required|max:255',
            'image_upload'  => 'required|mimes:jpeg,bmp,png',
        ]);
  
        $path_img =  Storage::putFile('public/images', $request->file('image_upload'));
        $video_image_avt = substr($path_img,7);

        $video = Video::find($request->id);
        $video->video_name      = $request->video_name;
        $video->video_image_avt = $video_image_avt;
        $video->save();

        return redirect(route('listVideo'))->with('success', 'Đã cập nhật video thành công');
    }
    public function deleteVideo($id) {
        Video::whereId($id)->delete();
        return redirect(route('listVideo'))->with('success', 'Đã xóa video thành công');
    }
    public function getAddVideo() {
        return view('admin.addVideo');
    }
    public function addVideo(Request $request) {
        $validatedData = $request->validate([
            'video_name'    => 'required|max:255',
            'image_upload'  => 'required|mimes:jpeg,bmp,png',
            'video_upload'  => 'required|mimetypes:video/avi,video/mpeg,video/mp4'
        ]);

        $path_img   =   Storage::putFile('public/images', $request->file('image_upload'));
        $path_video =   Storage::putFile('public/videos', $request->file('video_upload'));
        $name = $request->video_name;

        $image = substr($path_img,7);
        $video = substr($path_video,7);

        $videos = new Video;
        $videos->video_name = $name;
        $videos->video_image_avt = $image;
        $videos->video = $video;
        $videos->user_id = 0;
        $videos->save();

        return redirect(route('adminAddVideo'))->with('success', 'Upload video thành công');
    }

      // ========================== Xử Lý Người Dùng ================================//

    public function getAddddUser(Request $request) {
        return view('admin.addUser');
    }
    public function addUser(Request $request) {
        $validatedData = $request->validate([
            'name'    => 'required|max:255',
            'email'  => 'required|email',
            'password'  => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);

        return redirect(route('addUser'))->with('success', 'Thêm người dùng thành công');
    }
    public function deleteUser($id) {
        User::whereId($id)->delete();
        Video::where('user_id', $id)->delete();
        return redirect(route('listUser'))->with('success', 'Đã xóa user thành công');
    }

}
