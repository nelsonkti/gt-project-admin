<?php
/**
 * Created by PhpStorm.
 * User: 傅增耀
 * Date: 19/9/4
 * Time: 11:26
 * PHP version 7
 * @category Private
 * @package  App\Admin\Controllers
 * @author   fzy <571157865@qq.com>
 * @license  FZY https://571157865@qq.com
 * @link     https://571157865@qq.com
 */

namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Admin\SysDic;
use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{
    /**
     * 获取视频分页信息
     * @param Request $request
     * @return mixed
     */
    public function getSysDic(Request $request)
    {

        $q = $request->get('q');

        return SysDic::query()->when($q,function ($query) use ($q) {
            $query->where('name', 'like', "%$q%");
        })
            ->paginate(null, ['id', 'name as text']);
    }

    /**
     * 上传功能
     * @param Request $request
     * @return string
     */
    public function upload(Request $request)
    {
        $file = $request->file('courseware_url');

        $size = round($file->getSize() / 1048576 * 100) / 100;

        Log::info('$size'.$size);
        $disk = QiniuStorage::disk('qiniu');
        $path = $file->getRealPath();
        //获取文件的扩展名
        $extend_name = $file->getClientOriginalExtension();

        $filename = md5(uniqid(microtime(true),true)).'.'.$extend_name;
        $upload_path = 'file/'.$filename;
        //上传文件
        if ($size>10) {
            $bool = $disk->put($upload_path,fopen($path,'r+'));               //上传文件
        } else {
            $bool = $disk->put($upload_path,file_get_contents($path));
        }
        $url_name = '';
        $url = $disk->downloadUrl($upload_path);
        $bool && $url_name = $filename;

        $data['data'] = $url_name;
        $data['url'] = $url;
        return json_encode($data);
    }

    /**
     * ck 上传图片
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadCkImg(Request $request)
    {
        $file[] = $request->file("upload");
        $ck = $request->get('CKEditorFuncNum');
        dd($ck);
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