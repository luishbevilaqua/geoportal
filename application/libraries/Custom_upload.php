<?php
class Custom_upload {

	private $config;
	private $CI;
	private $uploadPath;
	private $formTagName;

	public function __construct() {
		$this->CI = & get_instance();
	}

	public function upload($uploadPath = "", $formTagName = "") {
		$this->uploadPath = $uploadPath;
		$this->formTagName = $formTagName;

		$this->config = $this->imageConfig();

		$this->CI->load->library('upload', $this->config);
		$this->CI->upload->initialize($this->config);
		if(!$this->CI->upload->do_upload($formTagName)) {
			throw new Exception($this->CI->upload->display_errors());
		}
	}


	public function newMultipleUpload($uploadPath = "") {

		$files = array();
				
		if(!empty($_FILES['file']['name'][0])) {

			for($i=0; $i < count($_FILES['file']['name']); $i++) {
				
				$_FILES['file']['name'][$i] = $this->CI->string_util->generateImageName($_FILES['file']['name'][$i]);
				
				list($width, $height, $type, $attr) = getimagesize($_FILES['file']['tmp_name'][$i]);
				
				$files[$i] = array('name'=>$_FILES['file']['name'][$i], 'width'=>$width, 'height'=>$height, 'size'=>$_FILES['file']['size'][$i]);
				
				move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadPath.$_FILES['file']['name'][$i]);
				
			}
		}

		return $files;

	}

	public function multipleUpload($uploadPath = "", $formTagName = "") {

		$this->CI->load->library('string_util');

		/* $config['upload_path']   = realpath($upload_dir);
		 $config['allowed_types'] = 'gif|jpg|jpeg|jpe|png';
		 $config['max_size']      = '2048';*/

		//$CI->load->library('upload', $config);
		$files = array();
			
		$this->uploadPath = $uploadPath;
		//$this->formTagName = $formTagName;

		$this->config = $this->imageConfig();
		$this->CI->load->library('upload', $this->config);

		$errors = FALSE;

		foreach($_FILES as $key => $value)
		{
			if( ! empty($value['name']))
			{
				$_FILES[$key]['name'] = $this->CI->string_util->generateImageName($_FILES[$key]['name']);
				if( ! $this->CI->upload->do_upload($key))
				{
					$data['upload_message'] = $this->CI->upload->display_errors(); // ERR_OPEN and ERR_CLOSE are error delimiters defined in a config file
					$this->CI->load->vars($data);

					$errors = TRUE;
				}
				else
				{
					// Build a file array from all uploaded files
					$files[] = $this->CI->upload->data();
				}
			}
		}

		// There was errors, we have to delete the uploaded files
		if($errors)
		{
			foreach($files as $key => $file)
			{
				@unlink($file['full_path']);
			}
		}
		/*elseif(empty($files) AND empty($data['upload_message']))
		 {
			echo '>>>>>>>>>>>';
			$this->CI->lang->load('upload');
			$data['upload_message'] = $this->CI->lang->line('upload_no_file_selected');
			$this->CI->load->vars($data);
			}*/
		else
		{
			return $files;
		}

	}

	public function delete($fileName="", $filePath="") {
		if((!empty($fileName)) && (!empty($filePath))) {
			if(file_exists($filePath.$fileName))
			unlink($filePath.$fileName);
		}
	}

	private function imageConfig() {
		$config['upload_path'] = $this->uploadPath;
		$config['allowed_types'] = 'gif|jpg|jpeg|jpe|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1500';
		$config['max_height'] = '1500';

		return $config;
	}

	public function gerarThumb($uploadPath = "", $fileName = "", $targetFolder = "", $width=61, $height=62) {

		$conf['image_library'] = 'gd2';
		$conf['source_image'] = $uploadPath.$fileName;
		$conf['new_image'] = $uploadPath.$targetFolder.'/'.$fileName;
		$conf['create_thumb'] = TRUE;
		$conf['maintain_ratio'] = FALSE;
		$conf['width'] = $width;
		$conf['height'] = $height;
		$conf['thumb_marker'] = '';


		$this->CI->load->library('image_lib');
		$this->CI->image_lib->initialize($conf);
		$this->CI->image_lib->resize();
		$this->CI->image_lib->clear();
	}


}