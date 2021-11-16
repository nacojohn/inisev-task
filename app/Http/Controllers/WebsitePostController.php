<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\WebsitePost;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class WebsitePostController extends BaseController
{
    public function post(Request $request){
        //Validate to ensure valid inputs
        $validator = Validator::make($request->all(), [
            'website' => 'required',
            'title' => 'required',
            'body' => 'required'
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
            
        if (WebsitePost::where([
            ['post_title', ucfirst($request->title)],
            ['website_id', $request->website]
        ])->exists())
            return $this->sendError('Hi, the post already exist', [], Response::HTTP_UNPROCESSABLE_ENTITY);

        $post = new WebsitePost();
        $post->post_title = ucfirst($request->title);
        $post->post_body = $request->body;
        $post->website()->associate($request->website);
        $post->save();

        return $this->sendResponse([], "Post created successful");
    }
}
