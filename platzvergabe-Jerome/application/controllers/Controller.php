<?php
	class Controller extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper(array('url', 'html', 'form'));
		}

		public function index() {
			$this->load->view('templates/header');
			$this->load->view('first');
		}

		public function upload() {
			if (!empty($_FILES)) {
				$tempFile = $_FILES['file']['tmp_name'];
				$fileName = 'test.csv';
				$targetPath = getcwd() . '/application/models/uploads/';
				$targetFile = $targetPath . $fileName;
				move_uploaded_file($tempFile, $targetFile);
			}
		}

		public function do_upload() {
            $config['upload_path']          = '/application/models/uploads/';
            $config['allowed_types']        = 'csv';
            $config['max_size']             = '10000'; /*erlaubte Größe: 10MB*/

            $this->load->library('upload', $config);

            //if ( ! $this->upload->do_upload('userfile')) {
            //  $error = array('error' => $this->upload->display_errors());

                //$this->load->view('hochladen', $error);
            //}
            //else {
                $data = array('upload_data' => $this->upload->data());

                //$this->load->view('hochladen/upload_success', $data);
            //}
        }

		//erstmal drinlassen
		public function pyscript() {
			$uploaded_file = $_FILES['file']['tmp_name'];

			$pyscript = 'C:\xampp\htdocs\my_project\secondtry\py_in_php\code4.py';
			$python = 'C:\Users\Jerome Kallisch\AppData\Local\Programs\Python\Python36-32\python.exe';
			$cmd = "$python $pyscript";

			$exe = exec("$cmd" . $uploaded_file);
			return $exe;
		}

		public function view004() {
			$value = exec('python C:\xampp\htdocs\platzvergabe\application\libraries\code.py', $output); //print_r($output) to check whats in $output
			$data['value'] = $output;
			//if (sizeof($output) > 18){
			//	$this->load->view('err');
			//}
			//else {
				$this->load->view('templates/header');
				$this->load->view('lecture_hall/zhg004', $data);
			//}
		}
		public function view008() {
			$value = exec('python C:\xampp\htdocs\platzvergabe\application\libraries\code.py', $output); //print_r($output) to check whats in $output
			$data['value'] = $output;
			$this->load->view('templates/header');
			$this->load->view('lecturer_hall/zhg008', $data);
		}

		public function viewFAQ(){
			$this->load->view('templates/header');
			$this->load->view('faq');

		}
		public function viewHoersaele(){
			$this->load->view('templates/header');
			$this->load->view('hoersaele');
	}
}
?>
