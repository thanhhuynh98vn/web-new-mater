<?php
class LibraryFile{
    public function upfile($hinhanh){
        $tmp_name=$_FILES['hinhanh']['tmp_name'];
        //doi tên hình
        $tmp=explode('.',$hinhanh);
        $duoiFile=end($tmp);
        $newPic='VNE-'.time().'.'.$duoiFile;
        $pathUpload=$_SERVER['DOCUMENT_ROOT'].'/files/'.$newPic;
        $result_Pic=move_uploaded_file($tmp_name, $pathUpload);
        return $newPic;
    }
    public function deleteFile(){
        unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$picture);
    }
}
?>