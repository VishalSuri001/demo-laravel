<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function homeSlider()
    {
        $homeSlide = Slider::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeSlide'));
    }

    public function UpdateSlider(Request $request)
    {

        $slide_id = $request->id;

        if ($request->file('slide')) {
            $image = $request->file('slide');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = $name_gen;

            Slider::findOrFail($slide_id)->update([
                'title' => $request->title,
                'slide' => $save_url,
                'video_url' => $request->video_url,
                'short_title' => $request->short_title,
            ]);

            $notification = array(
                'message' => 'Home Slide Updated with Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } else {

            Slider::findOuserFail($slide_id)->update([
                'title' => $request->title,
                'video_url' => $request->video_url,
                'short_title' => $request->short_title,
            ]);
            $notification = array(
                'message' => 'Home Slide Updated without Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }
}
