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
				$fileName = $_FILES['file']['name'];
				$targetPath = getcwd() . 'models/uploads/';
				$targetFile = $targetPath . $fileName;
				move_uploaded_file($tempFile, $targetFile);
			}
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
			$this->load->view('templates/header');
			$this->load->view('lecturer_hall/zhg004', $data);
		}
		public function view008() {
			$value = exec('python C:\xampp\htdocs\platzvergabe\application\libraries\code.py', $output); //print_r($output) to check whats in $output
			$data['value'] = $output;
			$this->load->view('templates/header');
			$this->load->view('lecturer_hall/zhg008', $data);
		}
	}	
?>