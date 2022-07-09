<?php
class ImageService
{

	function uploadImage($file)
	{
		$target_dir    = "../upload/";

		$target_file   = $target_dir . basename($file["name"]);

		$allowUpload   = true;

		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		$maxfilesize   = 800000;

		$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');



		$check = getimagesize($file["tmp_name"]);
		if ($check !== false) {
			echo "Đây là file ảnh - " . $check["mime"] . ".";
			$allowUpload = true;
		} else {
			echo "Không phải file ảnh.";
			$allowUpload = false;
		}

		if (file_exists($target_file)) {
			echo "Tên file đã tồn tại trên server, không được ghi đè";
			$allowUpload = false;
		}

		if ($file["size"] > $maxfilesize) {
			echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
			$allowUpload = false;
		}

		if (!in_array($imageFileType, $allowtypes)) {
			echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
			$allowUpload = false;
		}

		if ($allowUpload) {
			if (move_uploaded_file($file["tmp_name"], $target_file)) {
				echo "File " . basename($file["name"]) .
					" Đã upload thành công.";

				echo "File lưu tại " . $target_file;
			} else {
				echo "Có lỗi xảy ra khi upload file!!!";
			}
		} else {
			echo "Không upload được file, có thể do file lớn, kiểu file không đúng !!!";
		}

		return $target_file;
	}
}