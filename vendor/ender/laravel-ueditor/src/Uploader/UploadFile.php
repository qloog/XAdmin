<?php namespace Ender\UEditor\Uploader;

use App\Events\UEditorUploadStart;
use App\Events\UEditorUploadSuccess;
use App\Models\UEditorMedia;
use Ender\UEditor\Uploader\Upload;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 *
 *
 * Class UploadFile
 *
 * 文件/图像普通上传
 *
 * @package Ender\UEditor\Uploader
 */
class UploadFile  extends Upload{
    use UploadQiniu;
    public function doUpload()
    {

        $file = $this->request->file($this->fileField);
        if (empty($file)) {
            $this->stateInfo = $this->getStateInfo("ERROR_FILE_NOT_FOUND");
            return false;
        }
        if (!$file->isValid()) {
            $this->stateInfo = $this->getStateInfo($file->getError());
            return false;

        }

        //event(new UEditorUploadStart($file));

        $this->file = $file;

        $this->oriName = $this->file->getClientOriginalName();

        $this->fileSize = $this->file->getSize();
        $this->fileType = $this->getFileExt();

        $this->fullName = $this->getFullName();


        $this->filePath = $this->getFilePath();

        $this->fileName = basename($this->filePath);


        //检查文件大小是否超出限制
        if (!$this->checkSize()) {
            $this->stateInfo = $this->getStateInfo("ERROR_SIZE_EXCEED");
            return false;
        }
        //检查是否不允许的文件格式
        if (!$this->checkType()) {
            $this->stateInfo = $this->getStateInfo("ERROR_TYPE_NOT_ALLOWED");
            return false;
        }

        if(config('ueditor.core.mode')=='local'){
            try {
                $this->file->move(dirname($this->filePath), $this->fileName);

                $this->stateInfo = $this->stateMap[0];

                //dd($this->file);
                //event(new UEditorUploadSuccess($this->file));
                $config=$this->config;
                //var_export($config);die;
                if($config['storage']==true){
                    $data=[];
                    $data['route']=\Request::path();
                    $data['user_id']=\Auth::id();
                    $data['media_type']=$config['media_type'];
                    $data['media_name']=$this->fileName;
                    //$data['media_path']=$this->filePath; //most time it's not necessary
                    //UEditorMedia::create($data);
                }


            } catch (FileException $exception) {
                $this->stateInfo = $this->getStateInfo("ERROR_WRITE_CONTENT");
                return false;
            }

        }else if(config('ueditor.core.mode')=='qiniu'){

            $content=file_get_contents($this->file->getPathname());
            return $this->uploadQiniu($this->filePath,$content);

        }else{
            $this->stateInfo = $this->getStateInfo("ERROR_UNKNOWN_MODE");
            return false;
        }




        return true;

    }
}
