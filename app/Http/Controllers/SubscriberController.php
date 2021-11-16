<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class SubscriberController extends BaseController
{
    public function subscribe(Request $request)
    {
        //Validate to ensure valid inputs
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'email' => [
                'required',
                'email'
            ],
            'website' => 'required'
        ]);

        //handle validation error
        if ($validator->fails()) {
            $errorMessage = "";
            foreach ($validator->errors()->all() as $err) {
                $errorMessage .= $err . "\n";
            }
            
            return $this->sendError($errorMessage, [], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // check if website exist
        if (!Website::where('uid', $request->website)->exists())
            return $this->sendError('The website is not valid', [], Response::HTTP_UNPROCESSABLE_ENTITY);
            
        if (Subscriber::where([
            ['email', strtolower($request->email)],
            ['website_id', $request->website]
        ])->exists())
            return $this->sendError('Hi, you are already a subscriber', [], Response::HTTP_UNPROCESSABLE_ENTITY);

        //Create new subscriber
        $subscriber = new Subscriber();
        $subscriber->firstname = ucfirst($request->firstname);
        $subscriber->email = strtolower($request->email);
        $subscriber->website()->associate($request->website);
        $subscriber->save();

        return $this->sendResponse([], "Subscription was successful");
    }
}
