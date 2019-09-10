<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{
    public function uploadImg(Request $request)
    {
        $file = $request->file("my_image");
        if (!empty($file)) {
            foreach ($file as $key => $value) {
                $len = $key;
            }
            if ($len > 25) {
                return response()->json(['ResultData' => 6, 'info' => '最多可以上传25张图片']);
            }
            $m = 0;
            $k = 0;
            for ($i = 0; $i <= $len; $i++) {
                // $n 表示第几张图片
                $n = $i + 1;
                if ($file[$i]->isValid()) {
                    if (in_array(strtolower($file[$i]->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                        $disk = Storage::disk('qiniu');
                        $time = 'images/'.date('Ymd');
                        $filename = $disk->put($time,$file[$i]);
                        if ($filename) {
                            $img_url = $disk->getDriver()->downloadUrl($filename);
                            $m = $m + 1;
                        } else {
                            $k = $k + 1;
                        }
                        $msg = $m . "张图片上传成功 " . $k . "张图片上传失败<br>";
                        $return[] = ['ResultData' => 0, 'info' => $msg, 'newFileName' => $img_url];
                    } else {
                        return response()->json(['ResultData' => 3, 'info' => '第' . $n . '张图片后缀名不合法!<br/>' . '只支持jpeg/jpg/png/gif格式']);
                    }
                } else {
                    return response()->json(['ResultData' => 1, 'info' => '第' . $n . '张图片超过最大限制!<br/>' . '图片最大支持2M']);
                }
            }

        } else {
            return response()->json(['ResultData' => 5, 'info' => '请选择文件']);
        }
        return $return;
    }

    public function uploadCkImg(Request $request)
    {
        $file[] = $request->file("upload");
        $ck = $request->get('CKEditorFuncNum');
        dd('asdasdasd');
        if (!empty($file)) {
            foreach ($file as $key => $value) {
                $len = $key;
            }
            if ($len > 25) {
                return response()->json(['ResultData' => 6, 'info' => '最多可以上传25张图片']);
            }
            $m = 0;
            $k = 0;
            for ($i = 0; $i <= $len; $i++) {
                // $n 表示第几张图片
                $n = $i + 1;
                if ($file[$i]->isValid()) {
                    if (in_array(strtolower($file[$i]->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                        $disk = Storage::disk('qiniu');
                        $time = 'images/'.date('Ymd');
                        $filename = $disk->put($time,$file[$i]);
                        if ($filename) {
                            $img_url = $disk->getDriver()->downloadUrl($filename);
                            $m = $m + 1;
                        } else {
                            $k = $k + 1;
                        }
                        $msg = $m . "张图片上传成功 " . $k . "张图片上传失败<br>";
                        //{
                        //    "uploaded": 1,
                        //    "fileName": "foo.jpg",
                        //    "url": "/files/foo.jpg"
                        //}
//                        echo "<script>window.parent.CKEDITOR.tools.callFunction($ck, '$img_url', '');</script>";
                        return json_encode(['uploaded'=>1,'fileName'=>$filename,'url'=>$img_url]);
                        echo "<script>window.parent.CKEDITOR.tools.callFunction($ck, '$img_url', '');</script>";
//                        $return = json_encode(['uploaded' => 0, 'fileName' => $filename, 'url' => $img_url]);
                    } else {
                        return response()->json(['ResultData' => 3, 'info' => '第' . $n . '张图片后缀名不合法!<br/>' . '只支持jpeg/jpg/png/gif格式']);
                    }
                } else {
                    return response()->json(['ResultData' => 1, 'info' => '第' . $n . '张图片超过最大限制!<br/>' . '图片最大支持2M']);
                }
            }

        } else {
            return response()->json(['ResultData' => 5, 'info' => '请选择文件']);
        }
//        return $return;
    }
}
