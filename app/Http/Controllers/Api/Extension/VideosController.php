<?php

namespace App\Http\Controllers\Api\Extension;

use App\Http\Controllers\Controller;
use App\Http\Requests\Extension\Videos\UploadRequest;
use App\Http\Services\VideosService;

class VideosController extends Controller
{
    public function upload(VideosService $videosService, UploadRequest $request)
    {
        $videosService->saveVideos($request->post()['data']);

        return response()->json(["asfdsf" => 12314]);
    }
}
