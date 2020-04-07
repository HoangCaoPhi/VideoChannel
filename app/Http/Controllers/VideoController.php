<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

use Session;

class VideoController extends Controller
{
    //
    public function getAllVideos($id) {
        $videos = Video::find($id);
        $videoRelation = Video::paginate(15);
        return view('videos.video_detail', compact('videos', 'videoRelation'));   
    }
    public function getAllVideosProfile($id) {
        $user_id = Auth::id();
        $videos = Video::where('user_id',$id)->get();
        return view('layouts.profile', compact('videos', 'user_id'));
    }
    public function getEditVideo($id) {
        $videos = Video::whereId($id)->get();
        return view('videos.edit', compact('videos', 'id'));
    }
    public function EditVideo(Request $request, $id) {
        $validatedData = $request->validate([
            'video_name'    => 'required|max:255',
            'image_upload'  => 'required|mimes:jpeg,bmp,png',
        ]);
        $user_id = Auth::id();
        $path_img =  Storage::putFile('public/images', $request->file('image_upload'));
        $video_image_avt = substr($path_img,7);

        $video = Video::find($request->id);
        $video->video_name = $request->video_name;
        $video->video_image_avt = $video_image_avt;
        $video->save();

        return redirect('profile/'.$user_id)->with('success', 'Đã cập nhật video thành công');
    }
    public function deleteVideo($id) {
        $user_id = Auth::id();
        Video::whereId($id)->delete();
        return redirect('profile/'.$user_id)->with('success', 'Đã xóa video thành công');
    }
    public function uploadVideo(Request $request, $id) {
    
       // $path = $request->file('image_upload')->store('images');
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
        $videos->user_id = $id;
        $videos->save();

        return redirect('/')->with('success', 'Upload video thành công');
    }
    public function getUploadVideo(Request $request) {
        $user_id =   Auth::id();
        return view('videos.upload', compact('user_id'));
    }
    public function search(Request $request) {
        $keyword = $request->video_search;
        $videos = Video::where('video_name','like','%'.$keyword.'%')->get();
        if(!$keyword) {
            Session::put('messeage','Bạn chưa nhập gì vào ô tìm kiếm!!!');
            return view('videos.search', compact('videos'));
        }
        if(count($videos) > 0) {
            Session::put('messeage','Video được tìm thấy');
            return view('videos.search', compact('videos'));
        }
        else {
            Session::put('messeage','Không tìm thấy video của bạn !!!');
            return view('videos.search', compact('videos'));
        } 
    }
}
