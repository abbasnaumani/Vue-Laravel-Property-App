<?php

namespace App\Http\Controllers;

use App\Models\MyMedia;
use App\Services\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Create a new service instance.
     *
     * @param MediaService $mediaService
     */
    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    /**
     * Delete media from Db and from storage
     * @param int $id
     *
     */
    public function destroy(int $id){
        $media = MyMedia::find($id);
        try {
            $media->delete();
//            $this->mediaService->deleteImageFromCloud($media->getDiskPath());
            $this->setApiSuccessMessage(trans('media.media_deleted'));
        }catch(\Exception $e){
            $this->setApiErrorMessage(trans());
        }
    }
}
