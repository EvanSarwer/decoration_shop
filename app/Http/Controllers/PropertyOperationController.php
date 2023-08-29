<?php

namespace App\Http\Controllers;

use App\Models\Balloon;
use App\Models\Holiday;
use App\Models\Occasion;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PropertyOperationController extends Controller
{
    // Start Balloon 
    public function BalloonList(){
        $balloons = Balloon::latest()->get();

        return view('admin.property_operation.balloon.balloon_list',compact('balloons'));
    }

    public function BalloonCreateView(){
        return view('admin.property_operation.balloon.balloon_create');
    }

    public function BalloonCreatePost(Request $request){
        // Validation
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => ['required', 'numeric', 'min:0', 
                            function ($attribute, $value, $fail) {
                                $value = floatval($value);
                    
                                if ($value < 0 || $value >= 1e12) {
                                    $fail($attribute . ' is invalid');
                                }
                            } ],
            'offer_percent' => ['numeric', 'min:0', 
                                    function ($attribute, $value, $fail) {
                                        $value = floatval($value);
                            
                                        if ($value < 0 || $value >= 101) {
                                            $fail($attribute . ' is invalid');
                                        }
                                    } ],
            'image1' => 'required',
            'quantity' => ['integer', 'min:0'],

        ], [   //custom message
            'image1.required' => 'The image field is required.',
        ]);


        $balloon = new Balloon();
        $balloon->title = $request->title;
        $balloon->description = $request->description;
        $balloon->category = $request->category;
        $balloon->size = $request->size;
        $balloon->brand = $request->brand;
        $balloon->shape = $request->shape;
        $balloon->quantity = $request->quantity;
        $balloon->price = $request->price;
        $balloon->offer_percent = $request->offer_percent;
        if($request->featuring){
            $balloon->featuring = $request->featuring;
        }


        if($request->hasfile('image1')){
            $destination = 'upload/balloon_images/'.$balloon->image1;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image1');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/balloon_images'),$filename);
            $balloon['image1'] = $filename;
        }

        if($request->hasfile('brand')){
            $destination = 'upload/balloon_images/'.$balloon->brand;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('brand');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/balloon_images'),$filename);
            $balloon['brand'] = $filename;
        }

        $balloon->save();

        $notification = array(
            'message' => 'New Balloon Item Added Successfully',
            'alert-type' => 'success',
        );

        return redirect('/user/balloons')->with($notification);
    }


    public function BalloonEditView($id){
        $balloon = Balloon::findOrFail($id);
        return view('admin.property_operation.balloon.balloon_edit',compact('balloon'));
    }

    public function BalloonEditPost(Request $request){

        // Validation
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'price' => ['required', 'numeric', 'min:0', 
                            function ($attribute, $value, $fail) {
                                $value = floatval($value);
                    
                                if ($value < 0 || $value >= 1e12) {
                                    $fail($attribute . ' is invalid');
                                }
                            } ],
            'offer_percent' => ['numeric', 'min:0', 
                                    function ($attribute, $value, $fail) {
                                        $value = floatval($value);
                            
                                        if ($value < 0 || $value >= 101) {
                                            $fail($attribute . ' is invalid');
                                        }
                                    } ],
            'quantity' => ['integer', 'min:0'],

        ]);


        $balloon = Balloon::findOrFail($request->id);
        $balloon->title = $request->title;
        $balloon->description = $request->description;
        $balloon->category = $request->category;
        $balloon->size = $request->size;
        $balloon->brand = $request->brand;
        $balloon->shape = $request->shape;
        $balloon->quantity = $request->quantity;
        $balloon->price = $request->price;
        $balloon->offer_percent = $request->offer_percent;
        if($request->featuring){
            $balloon->featuring = $request->featuring;
        }else{
            $balloon->featuring = 'no';
        }


        if($request->hasfile('image1')){
            $destination = 'upload/balloon_images/'.$balloon->image1;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image1');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/balloon_images'),$filename);
            $balloon['image1'] = $filename;
        }

        if($request->hasfile('brand')){
            $destination = 'upload/balloon_images/'.$balloon->brand;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('brand');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/balloon_images'),$filename);
            $balloon['brand'] = $filename;
        }

        $balloon->save();

        $notification = array(
            'message' => 'Balloon Item Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect('/user/balloons')->with($notification);


    }


    public function BalloonDelete($id){
        $balloon = Balloon::findOrFail($id);
        $balloon->delete();

        return back();
    }

    // End Balloon


    // Start Ocatsion 
    public function OccasionList(){
        $occasions = Occasion::latest()->get();

        return view('admin.property_operation.occasion.occasion_list',compact('occasions'));
    }

    public function OccasionCreateView(){
        return view('admin.property_operation.occasion.occasion_create');
    }


    public function OccasionCreatePost(Request $request){
        // Validation
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'text1' => 'required',
            'price' => ['required', 'numeric', 'min:0', 
                            function ($attribute, $value, $fail) {
                                $value = floatval($value);
                    
                                if ($value < 0 || $value >= 1e12) {
                                    $fail($attribute . ' is invalid');
                                }
                            } ],
            'offer_percent' => ['numeric', 'min:0', 
                                    function ($attribute, $value, $fail) {
                                        $value = floatval($value);
                            
                                        if ($value < 0 || $value >= 101) {
                                            $fail($attribute . ' is invalid');
                                        }
                                    } ],
            'image1' => 'required',

        ], [   //custom message
            'image1.required' => 'The image field is required.',
        ]);


        $occasion = new Occasion();
        $occasion->title = $request->title;
        $occasion->description = $request->description;
        $occasion->category = $request->category;
        $occasion->text1 = $request->text1;
        $occasion->text2 = $request->text2;
        $occasion->text3 = $request->text3;
        $occasion->ready_time = $request->ready_time;
        $occasion->price = $request->price;
        $occasion->offer_percent = $request->offer_percent;
        if($request->featuring){
            $occasion->featuring = $request->featuring;
        }


        if($request->hasfile('image1')){
            $destination = 'upload/occasion_images/'.$occasion->image1;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image1');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/occasion_images'),$filename);
            $occasion['image1'] = $filename;
        }

        $occasion->save();

        $notification = array(
            'message' => 'New Occasion Item Added Successfully',
            'alert-type' => 'success',
        );

        return redirect('/user/occasions')->with($notification);
    }


    public function OccasionEditView($id){
        $occasion = Occasion::findOrFail($id);
        return view('admin.property_operation.occasion.occasion_edit',compact('occasion'));
    }

    public function OccasionEditPost(Request $request){

        // Validation
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'text1' => 'required',
            'price' => ['required', 'numeric', 'min:0', 
                            function ($attribute, $value, $fail) {
                                $value = floatval($value);
                    
                                if ($value < 0 || $value >= 1e12) {
                                    $fail($attribute . ' is invalid');
                                }
                            } ],
            'offer_percent' => ['numeric', 'min:0', 
                                    function ($attribute, $value, $fail) {
                                        $value = floatval($value);
                            
                                        if ($value < 0 || $value >= 101) {
                                            $fail($attribute . ' is invalid');
                                        }
                                    } ],

        ]);


        $occasion = Occasion::findOrFail($request->id);
        $occasion->title = $request->title;
        $occasion->description = $request->description;
        $occasion->category = $request->category;
        $occasion->text1 = $request->text1;
        $occasion->text2 = $request->text2;
        $occasion->text3 = $request->text3;
        $occasion->ready_time = $request->ready_time;
        $occasion->price = $request->price;
        $occasion->offer_percent = $request->offer_percent;
        if($request->featuring){
            $occasion->featuring = $request->featuring;
        }else{
            $occasion->featuring = 'no';
        }


        if($request->hasfile('image1')){
            $destination = 'upload/occasion_images/'.$occasion->image1;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image1');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/occasion_images'),$filename);
            $occasion['image1'] = $filename;
        }

        $occasion->save();

        $notification = array(
            'message' => 'New Occasion Item Added Successfully',
            'alert-type' => 'success',
        );

        return redirect('/user/occasions')->with($notification);


    }


    public function OccasionDelete($id){
        $occasion = Occasion::findOrFail($id);
        $occasion->delete();

        return back();
    }
    

    // End Occasion



    // Start Holiday 
    public function HolidayList(){
        $holidays = Holiday::latest()->get();

        return view('admin.property_operation.holiday.holiday_list',compact('holidays'));
    }

    public function HolidayCreateView(){
        return view('admin.property_operation.holiday.holiday_create');
    }


    public function HolidayCreatePost(Request $request){
        // Validation
        $request->validate([
            'title' => 'required',
            'text1' => 'required',
            'price' => ['required', 'numeric', 'min:0', 
                            function ($attribute, $value, $fail) {
                                $value = floatval($value);
                    
                                if ($value < 0 || $value >= 1e12) {
                                    $fail($attribute . ' is invalid');
                                }
                            } ],
            'offer_percent' => ['numeric', 'min:0', 
                                    function ($attribute, $value, $fail) {
                                        $value = floatval($value);
                            
                                        if ($value < 0 || $value >= 101) {
                                            $fail($attribute . ' is invalid');
                                        }
                                    } ],
            'image1' => 'required',

        ], [   //custom message
            'image1.required' => 'The image field is required.',
        ]);


        $holiday = new Holiday();
        $holiday->title = $request->title;
        $holiday->text1 = $request->text1;
        $holiday->text2 = $request->text2;
        $holiday->text3 = $request->text3;
        $holiday->price = $request->price;
        $holiday->offer_percent = $request->offer_percent;
        if($request->featuring){
            $holiday->featuring = $request->featuring;
        }


        if($request->hasfile('image1')){
            $destination = 'upload/holiday_images/'.$holiday->image1;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image1');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/holiday_images'),$filename);
            $holiday['image1'] = $filename;
        }

        $holiday->save();

        $notification = array(
            'message' => 'New Holiday Item Added Successfully',
            'alert-type' => 'success',
        );

        return redirect('/user/holidays')->with($notification);
    }


    public function HolidayEditView($id){
        $holiday = Holiday::findOrFail($id);
        return view('admin.property_operation.holiday.holiday_edit',compact('holiday'));
    }

    public function HolidayEditPost(Request $request){

        // Validation
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'text1' => 'required',
            'price' => ['required', 'numeric', 'min:0', 
                            function ($attribute, $value, $fail) {
                                $value = floatval($value);
                    
                                if ($value < 0 || $value >= 1e12) {
                                    $fail($attribute . ' is invalid');
                                }
                            } ],
            'offer_percent' => ['numeric', 'min:0', 
                                    function ($attribute, $value, $fail) {
                                        $value = floatval($value);
                            
                                        if ($value < 0 || $value >= 101) {
                                            $fail($attribute . ' is invalid');
                                        }
                                    } ],

        ]);


        $holiday = Holiday::findOrFail($request->id);
        $holiday->title = $request->title;
        $holiday->text1 = $request->text1;
        $holiday->text2 = $request->text2;
        $holiday->text3 = $request->text3;
        $holiday->price = $request->price;
        $holiday->offer_percent = $request->offer_percent;
        if($request->featuring){
            $holiday->featuring = $request->featuring;
        }else{
            $holiday->featuring = 'no';
        }


        if($request->hasfile('image1')){
            $destination = 'upload/holiday_images/'.$holiday->image1;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image1');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/holiday_images'),$filename);
            $holiday['image1'] = $filename;
        }

        $holiday->save();

        $notification = array(
            'message' => 'New Holiday Item Added Successfully',
            'alert-type' => 'success',
        );

        return redirect('/user/holidays')->with($notification);


    }


    public function HolidayDelete($id){
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();

        return back();
    }
    

    // End Holiday



}
