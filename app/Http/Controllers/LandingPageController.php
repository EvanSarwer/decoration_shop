<?php

namespace App\Http\Controllers;

use App\Models\Balloon;
use App\Models\BalloonCategory;
use App\Models\Holiday;
use App\Models\Notification;
use App\Models\Occasion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Datetime;

class LandingPageController extends Controller
{
    public function index(){

        $recent_balloons = Balloon::orderBy('created_at', 'desc')->limit(10)->get();

        // $balloonsByCategory = Balloon::orderBy('created_at', 'desc')
        //                             ->get()
        //                             ->groupBy('category')
        //                             ->take(7) // Limit to top 5 categories
        //                             ->map(function ($balloons, $categoryName) {
        //                                 return [
        //                                     'categoryName' => $categoryName,
        //                                     'balloonList' => $balloons
        //                                 ];
        //                             })
        //                             ->values()
        //                             ->all();

        $balloonsByCategory = BalloonCategory::all();
        if($balloonsByCategory && count($balloonsByCategory) > 0){
            foreach($balloonsByCategory as $key => $category){
                if(count($category->balloons) > 0){
                    $category->balloons = $category->balloons->sortByDesc('featuring')->take(4);
                }
            }
        }

        $holidays = Holiday::where('featuring','yes')->limit(4)->get();                         

        $occassion_love_theme = Occasion::where('category', 'LIKE', '%love%')->where('featuring','yes')->first();
        $occassion_birthday_theme = Occasion::where('category', 'LIKE', '%birthday%')->where('featuring','yes')->first();
        $occassion_gender_theme = Occasion::where('category', 'LIKE', '%gender%')->where('featuring','yes')->first();
        $occassion_bubble_theme = Occasion::where('category', 'LIKE', '%bubble%')->where('featuring','yes')->first();


        return view('main.index',compact('recent_balloons','balloonsByCategory','holidays','occassion_love_theme','occassion_birthday_theme','occassion_gender_theme','occassion_bubble_theme'));
    }


    public function bookMessage(Request $request){

        $validator = Validator::make(
            $request->all(),
            [
                'product_id' => 'required',
                'product_type' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'message' => 'required'
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {

            $object = new stdClass;
            $object->name = $request->name;
            $object->email = $request->email;
            $object->phone = $request->phone;
            $object->message = $request->message;
            $object->product_id = $request->product_id;
            $object->product_type = $request->product_type;

            $appUsers = User::all();
            foreach($appUsers as $au){
                $notification = new Notification();
                $notification->user_id = $au->id;
                $notification->type = "message";
                $notification->status = "unseen";
                $notification->client_email = $object->email;
                $notification->client_phone = $object->phone;
                $notification->message = json_encode($object);
                $notification->created_at = new Datetime();
                $notification->save();
            }
    
            //$mail = new SendMail($object);
            //Mail::to('evansarwer1@gmail.com')->send($mail);
            //Mail::to('sajibahmed294@gmail.com')->send($mail);

            return response()->json([
                'status' => 200,
                'data' => $object,
                'message' => "Your request has been sent. Thank you!"
            ]);
        }

    }

    public function sendMessage(Request $request){

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'message' => 'required'
            ]

        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {

            $object = new stdClass;
            $object->name = $request->name;
            $object->email = $request->email;
            $object->phone = $request->phone;
            $object->message = $request->message;

            $appUsers = User::all();
            foreach($appUsers as $au){
                $notification = new Notification();
                $notification->user_id = $au->id;
                $notification->type = "message";
                $notification->status = "unseen";
                $notification->client_email = $object->email;
                $notification->client_phone = $object->phone;
                $notification->message = json_encode($object);
                $notification->created_at = new Datetime();
                $notification->save();
            }
    
            //$mail = new SendMail($object);
            //Mail::to('evansarwer1@gmail.com')->send($mail);
            //Mail::to('sajibahmed294@gmail.com')->send($mail);

            return response()->json([
                'status' => 200,
                'data' => $object,
                'message' => "Your request has been sent. Thank you!"
            ]);
        }

    }

    public function balloons(){
        $balloons = Balloon::all();
        return view('main.balloons',compact('balloons'));
    }

    public function balloonsByCategory($id){
        $balloonsByCategory = BalloonCategory::where('id', $id)->first();
        return view('main.balloonsByCategory',compact('balloonsByCategory'));
    }

    public function singleBalloon($id){
        $balloon = Balloon::where('id', $id)->first();
        return view('main.single_balloon',compact('balloon'));
    }


    public function occasions(){
        $occasions = Occasion::all();
        return view('main.occasions',compact('occasions'));
    }

    public function singleOccasion($id){
        $occasion = Occasion::where('id', $id)->first();
        return view('main.single_occasion',compact('occasion'));
    }


    public function seasonalHolidays(){
        $seasonalHolidays = Holiday::all();
        return view('main.seasonal_holidays', compact('seasonalHolidays'));
    }


    public function contact(){
        return view('main.contact');
    }   

    public function error404(){
        return view('main.404');
    }
}
