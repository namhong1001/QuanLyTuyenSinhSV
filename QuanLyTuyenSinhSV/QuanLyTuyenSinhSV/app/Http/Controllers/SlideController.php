<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function getlist(){
        $slide = Slide::all();
        return view('admin.slide.list',['slide'=>$slide]);
    }

    public function getadd(){
        return view('admin.slide.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required',
            'Hinh'=>'required',
            'NoiDung'=>'required',
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên slide',
            'Hinh.required'=>'Bạn chưa chọn hình',
            'NoiDung'=>'Bạn chưa nhập nội dung'
        ]);

        $slide = new Slide;
        $slide->Ten = $request->Ten;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi=='jpg'&&$duoi=='png'&&$duoi=='jpeg'){
                return redirect('admin/slide/add')->with('loi','File hình chưa đúng');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4).'-'.$name;

            $file->move('upload/slide',$hinh);
            $slide->Hinh = $hinh;
        }
        $slide->NoiDung = $request->NoiDung;
        $slide->link = $request->Link;

        $slide->save();
        return redirect('admin/slide/add')->with('thongbao','Bạn đã thêm slide thành công');
    }

    public function getedit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit',['slide'=>$slide]);
    }

    public function postedit(Request $request, $id){
        $this->validate($request,
        [
            'Ten'=>'required',

            'NoiDung'=>'required',
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên slide',

            'NoiDung'=>'Bạn chưa nhập nội dung'
        ]);

        $slide = Slide::find($id);
        $slide->Ten = $request->Ten;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi=='jpg'&&$duoi=='png'&&$duoi=='jpeg'){
                return redirect('admin/slide/add')->with('loi','File hình chưa đúng');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4).'-'.$name;

            $file->move('upload/slide',$hinh);
            unlink("upload/tintuc/".$slide->Hinh);
            $slide->Hinh = $hinh;
        }
        $slide->NoiDung = $request->NoiDung;

        $slide->link = $request->Link;

        $slide->save();
        return redirect('admin/slide/edit/'.$id)->with('thongbao','Bạn đã sửa slide thành công');
    }

    public function postdelete($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/list')->with('thongbao','Bạn đã xóa thành công');
    }
}
