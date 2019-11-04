<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class News extends Model
{
  protected $guarded = ['id'];


  public function getImage()
  {
    return Storage::url($this->image, 'public');
  }

  public function getResizeImage()
  {
    $thumbnailpath = Storage::url($this->image, 'public');

    $img = Image::make($thumbnailpath)->resize(50, 50);

    return $img->response();
  }

  public function setImage($inputName)
  {

    if(request()->hasFile($inputName)) {
      if($this->avatar !== 'news/noavatar.png') {
        Storage::disk('public')->delete($this->avatar);
      }

      $path = request()->file($inputName)->store('news/'.$this->id, 'public');
      $this->image = $path;
      $this->save();
    }

  }


}
