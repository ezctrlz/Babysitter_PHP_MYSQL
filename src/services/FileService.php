<?php
require_once ERRORS_DIR . "UploadFileError.php";
class FileService {
    static public function saveFile($file, $path = "")
    {
        if ($path !== "" && !file_exists(UPLOADS_DIR . str_replace("/", "", $path))) {
            if (!mkdir(UPLOADS_DIR . str_replace("/", "", $path), 0777, true)) {
                throw new UploadFileError("Error Creating Folder", 501);
            }
        }
        if ($file['error'] == UPLOAD_ERR_OK) {
            $fileName = uniqid() . '-' . self::clearFileName($file['name']);
            $filePath = UPLOADS_DIR . $path . $fileName;
            $fileRoute = "/uploads/" . $path . $fileName;
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                return $fileRoute;
            } else {
                throw new UploadFileError("Internal error", 500);
            }
        }else {
            $error = "";
            switch ($file["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                    $error = "Too long";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $error = "Too long";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $error = "Incomplete file data";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $error = "File not uploaded";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $error = "Internal error";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $error = "Internal error";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $error = "Internal error";
                    break;
            }
            throw new UploadFileError($error, $file["error"]);
        }
    }
    static private function clearFileName($fileName)
    {
        $fileName = strtolower($fileName);
        return preg_replace('/[^0-9a-z-.]/', '-', $fileName);
    }
}