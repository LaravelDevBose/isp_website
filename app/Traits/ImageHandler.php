<?php
/**
 * Created by PhpStorm.
 * User: Brain Child Soft
 * Date: 2/25/2019
 * Time: 12:50 AM
 */

namespace App\Traits;

use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use File;

trait ImageHandler
{
    private function _multipleImageUpload($imagesInfo, $w=400, $h=400, $folder = '')
    {
        $imageUrl = array();
        $i=0;
        foreach ($imagesInfo as $imageInfo) {
            $imageUrl[$i] = $this->_singleImageUpload($imageInfo, $w=400, $h=400, $folder = '');
            $i++;
        }
        return $imageUrl;
//        dd($imageUrl);
    }


    //Resize and Uplode Shop Banner Image
    private function _singleImageUpload($imageInfo, $w=400, $h=400, $folder)
    {
        $path = $this->_destinationPath($folder);
        $imageName = $this->_createImageName($imageInfo);
        $imagePath = $path.$imageName;
        $image = Image::make($imageInfo->getRealPath())->resize($w, $h);
        $image->save($imagePath);
        return $imagePath;
    }


    //make a Custom Banner Image Name
    private function _createImageName($imageInfo)
    {
        //get Current Date time String
        $date = $this->_currentTime();

        $newName = $date.'_'.$imageInfo->getClientOriginalName();
        //return logo name
        return $newName;
    }


    //Image Destination url
    private function _destinationPath($folder)
    {
        //Create image Store Path
        $path = 'images/'.$folder.'/';

        //cheak Folder all ready Exits or not
        if(!File::exists($path)){
            //if no Folder Exits then Create new One
            File::makeDirectory($path);
        }

        //Return the folder path
        return $path;
    }


    // get Current Time Function
    private function _currentTime()
    {
        return Carbon::now()->format('Ymdhis');
    }

}
