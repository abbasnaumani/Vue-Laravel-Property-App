<?php

namespace App\Services;

use App\Models\MyMedia;
use App\Services\BaseService\BaseService;
use Storage;

class MediaService extends BaseService
{
    /**
     * Prepare Media Data by MyMedia Object
     *
     * @param MyMedia $media
     *
     * @return array $preparedMedia
     */
    public function prepareMedia(MyMedia $media)
    {
        if (isset($media) && !empty($media)) {
            $preparedMedia = $media->toArray();
            if ($preparedMedia) {
                $tag = $media->pivot->tag ?? null;
                if ($tag) {
                    $preparedMedia['tags'][] = $tag;
                }
                $diskPath = $media->getDiskPath();

                if(!empty($preparedMedia['media'])){  //check if the media has a media attached to itself
                    $preparedMediaLength = count($preparedMedia['media']);  // get length of all the medias attached to the media itself
                    for ($index = 0; $index < $preparedMediaLength; $index++){
                        $preparedMedia['media'][$index]['path'] = $media['media'][$index]->getDiskPath();   //add path to the media attached to itself
                        $preparedMedia['media'][$index]['basename'] = $media['media'][$index]->basename ?? ''; //add basename to the media attached to itself
                    }
                }

                //$preparedMedia['thumbnail'] = config('filesystems.disks.s3.aws_url') . '/fit-in/500x500/filters:no_upscale()/' . $diskPath;
                //$preparedMedia['source'] = config('filesystems.disks.s3.aws_url') . '/' . $diskPath;
                $preparedMedia['path'] = $diskPath;
                $preparedMedia['basename'] = $media->basename ?? '';
                //$preparedMedia['size'] = round($media->size/1000,2).' KB' ;
            }
        }
        return $preparedMedia ?? null;
    }
    /**
     * Method to Delete Image from Cloud
     * @param string $filePath
     */
    public function deleteImageFromCloud(string $filePath)
    {
        Storage::cloud()->delete($filePath);
    }
}
