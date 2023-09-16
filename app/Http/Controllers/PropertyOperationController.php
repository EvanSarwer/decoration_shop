<?php

namespace App\Http\Controllers;

use App\Models\Balloon;
use App\Models\BalloonCategory;
use App\Models\Holiday;
use App\Models\Occasion;
use App\Models\PageProperty;
use App\Models\SliderImage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PropertyOperationController extends Controller
{

    // Start Balloon Category

    public function AddBalloonCategoryPost(Request $request){
        // Validation
        $request->validate([
            'category_name' => 'required|min:1|unique:balloon_categories,category_name',
        ]);

        $balloon_category = new BalloonCategory();
        $balloon_category->category_name = $request->category_name;
        $balloon_category->save();

        $notification = array(
            'message' => 'Balloon Category Added Successfully',
            'alert-type' => 'success',
        );
        return back()->with($notification);

    }

    public function BalloonCategoryDelete($id){
        $balloon_category = BalloonCategory::findOrFail($id);
        $balloon_category->delete();

        $notification = array(
            'message' => 'Balloon Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    public function BalloonCategoryEditView($id){
        $balloon_category = BalloonCategory::findOrFail($id);
        return view('admin.property_operation.balloon.category_edit',compact('balloon_category'));
    }

    public function BalloonCategoryEditPost(Request $request){
        // Validation
        $request->validate([
            'id' => 'required',
            'category_name' => 'required|min:1|unique:balloon_categories,category_name,'.$request->id,
        ]);

        $balloon_category = BalloonCategory::findOrFail($request->id);
        $balloon_category->category_name = $request->category_name;
        $balloon_category->save();

        $notification = array(
            'message' => 'Balloon Category Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect('/user/balloons')->with($notification);
    }


    // Start Balloon 
    public function BalloonList(){
        $balloons = Balloon::latest()->get();

        $balloon_categories = BalloonCategory::all();
        return view('admin.property_operation.balloon.balloon_list',compact('balloons','balloon_categories'));
    }

    public function BalloonCreateView(){
        $balloon_categories = BalloonCategory::all();
        return view('admin.property_operation.balloon.balloon_create',compact('balloon_categories'));
    }

    public function BalloonCreatePost(Request $request){
        // Validation
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|integer',
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
            'image1' => ['required','image','max:2048'],
            'quantity' => ['integer', 'min:0'],

        ], [   //custom message
            'image1.required' => 'The image field is required.',
        ]);


        $balloon = new Balloon();
        $balloon->title = $request->title;
        $balloon->description = $request->description;
        $balloon->category_id = $request->category_id;
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
        $balloon_categories = BalloonCategory::all();
        return view('admin.property_operation.balloon.balloon_edit',compact('balloon','balloon_categories'));
    }

    public function BalloonEditPost(Request $request){

        // Validation
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'category_id' => 'required|integer',
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
            'image1' => ['nullable', 'image', 'max:2048'],
            'brand' => ['nullable', 'image', 'max:2048'],

        ]);


        $balloon = Balloon::findOrFail($request->id);
        $balloon->title = $request->title;
        $balloon->description = $request->description;
        $balloon->category_id = $request->category_id;
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
        $destination = 'upload/balloon_images/'.$balloon->image1;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $balloon->delete();

        $notification = array(
            'message' => 'Balloon Item Deleted Successfully',
            'alert-type' => 'success',
        );
        return back()->with($notification);
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
            'image1' => ['required','image', 'max:2048'],

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
            'image1' => ['nullable', 'image', 'max:2048'],

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
        $destination = 'upload/occasion_images/'.$occasion->image1;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $occasion->delete();

        $notification = array(
            'message' => 'Occasion Item Deleted Successfully',
            'alert-type' => 'success',
        );
        return back()->with($notification);
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
            'image1' => ['required','image', 'max:2048'],

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
            'image1' => ['nullable', 'image', 'max:2048'],

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
        $destination = 'upload/holiday_images/'.$holiday->image1;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $holiday->delete();

        $notification = array(
            'message' => 'Seasonal & Holiday Item Deleted Successfully',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
    

    // End Holiday



    // Start Edit Page Property

    public function PagePropertyEditView(){
        $page_property = PageProperty::first();
        if($page_property){
            if($page_property->client_feedbacks != null){
                $page_property->client_feedbacks = json_decode($page_property->client_feedbacks);
            }
        }

        $slider_images = SliderImage::all();
            
        return view('admin.property_operation.edit_page_property',compact('page_property', 'slider_images'));
    }

    public function AddSliderImage(Request $request){
        // Validation
        $request->validate([
            'slider_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:3072'],
        ]);

        $slider_image = new SliderImage();

        if($request->hasfile('slider_image')){
            $file = $request->file('slider_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $img = Image::make(file_get_contents($file));
            $img->save(\public_path('page_assets/img/'.$filename),60);
            $slider_image['image'] = $filename;

            $slider_image->save();

            $notification = array(
                'message' => 'Slider Image Added Successfully',
                'alert-type' => 'success',
            );
            return back()->with($notification);
        }

        $notification = array(
            'message' => 'Slider Image Not Added',
            'alert-type' => 'error',
        );
        return back()->with($notification);

    }


    public function SliderImageDelete($id){
        $slider_image = SliderImage::findOrFail($id);
        $destination = 'page_assets/img/'.$slider_image->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $slider_image->delete();

        $notification = array(
            'message' => 'Slider Image Deleted Successfully',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }



    public function PagePropertyEditPost(Request $request){

        // Validation
        $request->validate([

            'about_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:3072'],
            'whatsapp_number' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'opening_hours1' => 'required',
            'address' => 'required',
            'address_link' => 'required',
            'years_experience' => ['integer', 'min:0'],
            'expert_technicians' => ['integer', 'min:0'],
            'satisfied_clients' => ['integer', 'min:0'],
            'compleate_projects' => ['integer', 'min:0'],

            'facebook_link' => ['nullable', 'url'],
            'instagram_link' => ['nullable', 'url'],
            'twitter_link' => ['nullable', 'url'],
            'youtube_link' => ['nullable', 'url'],

        ]);



        $page_property = PageProperty::first();
        $page_property->whatsapp_number = $request->whatsapp_number;
        $page_property->phone_number = $request->phone_number;
        $page_property->email = $request->email;
        $page_property->opening_hours1 = $request->opening_hours1;
        $page_property->address = $request->address;
        $page_property->address_link = $request->address_link;
        $page_property->facebook_link = $request->facebook_link;
        $page_property->instagram_link = $request->instagram_link;
        $page_property->twitter_link = $request->twitter_link;
        $page_property->youtube_link = $request->youtube_link;
        $page_property->years_experience = $request->years_experience;
        $page_property->expert_technicians = $request->expert_technicians;
        $page_property->satisfied_clients = $request->satisfied_clients;
        $page_property->compleate_projects = $request->compleate_projects;


        if($request->hasfile('about_image')){
            $destination = 'page_assets/img/'.$page_property->about_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('about_image');
            // $filename = date('YmdHi').$file->getClientOriginalName();
            $filename = 'about.jpg';
            //$file->move(public_path('page_assets/img'),$filename);
            $img = Image::make(file_get_contents($file));
            $img->save(\public_path('page_assets/img/'.$filename),60);
            $balloon['about_image'] = $filename;
        }

        $page_property->save();

        $notification = array(
            'message' => 'Page Property Updated Successfully',
            'alert-type' => 'success',
        );

        return back()->with($notification);


    }


    public function AddCustomerFeedbackPost(Request $request){
        // Validation
        $request->validate([
            'client_name' => 'required',
            'client_email' => 'nullable|email',
            'client_feedback' => 'required',
        ]);

        $page_property = PageProperty::first();
        if($page_property){
            if($page_property->client_feedbacks != null){
                $client_feedbacks = json_decode($page_property->client_feedbacks);
                if(count($client_feedbacks) >= 10){
                    $notification = array(
                        'message' => 'You Can Not Add More Than 10 Feedbacks',
                        'alert-type' => 'error',
                    );
                    return back()->with($notification);
                }else{
                    $uniqueClientId = time() . rand(1000, 9999);
                    $client_feedbacks[] = [
                        'id' => $uniqueClientId, 
                        'client_name' => $request->client_name,
                        'client_email' => $request->client_email,
                        'client_feedback' => $request->client_feedback,
                    ];
                    $page_property->client_feedbacks = json_encode($client_feedbacks);
                    $page_property->save();
                }
                
            }else{
                $uniqueClientId = time() . rand(1000, 9999);
                $client_feedbacks[] = [
                    'id' => $uniqueClientId,
                    'client_name' => $request->client_name,
                    'client_email' => $request->client_email,
                    'client_feedback' => $request->client_feedback,
                ];
                $page_property->client_feedbacks = json_encode($client_feedbacks);
                $page_property->save();
            }
            $notification = array(
                'message' => 'Customer Feedback Added Successfully',
                'alert-type' => 'success',
            );
            return back()->with($notification);
        }

        $notification = array(
            'message' => 'Something Went Wrong',
            'alert-type' => 'error',
        );
        return back()->with($notification);

    }


    // public function CustomerFeedbackDelete($id){
    //     $page_property = PageProperty::first();
    //     if($page_property){
    //         if($page_property->client_feedbacks != null){
    //             $client_feedbacks = json_decode($page_property->client_feedbacks);

    //             $client_feedbacks = array_filter($client_feedbacks, function ($client) use ($id) {
    //                 return $client->id !== $id;
    //             });



    //             if(count($client_feedbacks) == 0){
    //                 $page_property->client_feedbacks = null;
    //                 $page_property->save();
    //                 $notification = array(
    //                     'message' => 'Customer Feedback Deleted Successfully',
    //                     'alert-type' => 'success',
    //                 );
    //                 return back()->with($notification);
    //             }else{
    //                 $page_property->client_feedbacks = json_encode($client_feedbacks);
    //                 $page_property->save();
    //                 $notification = array(
    //                     'message' => 'Customer Feedback Deleted Successfully',
    //                     'alert-type' => 'success',
    //                 );
    //                 return back()->with($notification);
    //             }
                
    //         }
    //     }

    //     $notification = array(
    //         'message' => 'Something Went Wrong',
    //         'alert-type' => 'error',
    //     );
    //     return back()->with($notification);

    // }


    public function CustomerFeedbackDelete($id)
    {
        $page_property = PageProperty::first();
        if ($page_property) {
            if ($page_property->client_feedbacks !== null) {
                $client_feedbacks = json_decode($page_property->client_feedbacks);

                $client_feedbacks = array_filter($client_feedbacks, function ($client) use ($id) {
                    return $client->id !== $id;
                });

                if (count($client_feedbacks) === 0) {
                    $page_property->client_feedbacks = null;
                } else {
                    $page_property->client_feedbacks = json_encode(array_values($client_feedbacks));
                }

                $page_property->save();

                $notification = array(
                    'message' => 'Customer Feedback Deleted Successfully',
                    'alert-type' => 'success',
                );

                return back()->with($notification);
            }
        }

        $notification = array(
            'message' => 'Something Went Wrong',
            'alert-type' => 'error',
        );

        return back()->with($notification);
    }










    // End Edit Page Property



}
