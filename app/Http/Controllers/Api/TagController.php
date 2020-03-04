<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'is_vendor', 'verified_email'])->except('index');
    }

    public function index(){
        $tags = Tag::paginate(50);
        return TagResource::collection($tags);
    }

    public function store(TagRequest $request){
        $tag = DB::table('tags')->where(['title' => $request->title])->first();
        if( !$tag ) {
            $newTag = Tag::create(['title' => strtolower($request->title)]);
            return new TagResource( $newTag );
        }

        return response([
            'message' => 'tag is already in database'
        ], 409);
    }

}
