<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Img;
use Image;
use Session;
use App\Post;
use File;
class ImageController extends Controller
{
    //
    public function add(Request $request,$post_id)
    {
    	 $this->validate($request, array(
                
                'featured_img'          => 'required'
            ));

    	  $imge = new Img;
    	  $imge->post_id = $post_id;
        if ($request->hasFile('featured_img')) {
          $image = $request->file('featured_img');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);

          $imge->image = $filename;
        }
        $imge->save();
        
        Session::flash('success','Image Added Successfully');
        return redirect()->route('posts.index');
    }
    public function seeAllForOnePost($post_id)
    {
        $post = Post::find($post_id);
        $imgs = $post->imgs;
        // return the view and pass in the post object
        return view('posts.image_index')->withPost($post)->withImgs($imgs);
      }
      public function destroy($id)
    {
        $img = Img::find($id);
         $pathToImage = public_path('images/').$img->image;
          File::delete($pathToImage);
        $img->delete();
        Session::flash('success', 'Deleted Image');
         
        return redirect()->route('posts.index');
            }
}
