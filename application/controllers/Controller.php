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

		public function viewFAQ() {
			$this->load->view('templates/header');
			$this->load->view('faq');
		}

		public function viewHoersaele() {
			$this->load->view('templates/header');
			$this->load->view('hoersaele');
		}

		//dateiupload; speicherung in models/uploads
		public function upload() {
			if (!empty($_FILES)) {
				$tempFile = $_FILES['file']['tmp_name'];
				$fileName = 'test.csv';
				$targetPath = getcwd() . '/application/models/uploads/';
				$targetFile = $targetPath . $fileName;
				move_uploaded_file($tempFile, $targetFile);
			}
		}

		//matrnr werden als array erzeugt
		public function first_column(){ 
			$x = [];
			$start_row = 2;
			$i = 1;
			$handle = fopen("application\\models\\uploads\\test.csv", "r");
			while(($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
				if($i >= $start_row) {
					array_push($x, $row[0]);
				}
				$i++;
			}
			fclose($handle);
			return $x;	//print_r ($x);
		}

		//die liste zum abhacken wird angelegt
		public function kontrollliste($x) { 
			$open = fopen("application\\models\\file.csv", "w");
			foreach($x as $fields) {
				fputcsv($open, $fields);
			}
			fclose($open);
		}

		//falls das array zu kurz für den hoersaal ist, wird es aufgefuellt mit leerem Inhalt, damit ein error verhindert wird
		public function fillarray($x, $o) {//$x = anzahl sitzplaetze; $o = array
			$f = sizeof($o);
			if ($f < $x) {
				$k = $x - $f;
				for($i = 0; $i < $k; $i++) {
					$o[$f+$i] = "";
				}
			}
			return $o;
		}


		//Prototyp Hoersaele fuer die test praesie
		public function view004() {
			$output = $this->first_column();
			$this->fillarray(18, $output);
			$this->kontrollliste(array_chunk($output, 1));
			$data['value'] = $output;
			$this->load->view('templates/lecture_hall_header');
			$this->load->view('lecture_hall/zhg004', $data);
		}

		public function view008() {
			$output = $this->first_column();
			$this->kontrollliste(array_chunk($output, 1));
			$output = $this->fillarray(65, $output);
			$data['value'] = $output;
			$this->load->view('templates/lecture_hall_header');
			$this->load->view('lecture_hall/zhg008', $data);
		}

		public function view011() {
			$output = $this->first_column(); 
			$this->kontrollliste(array_chunk($output, 1));
			$output = $this->fillarray(153, $output);
			$data['value'] = $output;
			$this->load->view('templates/lecture_hall_header');
			$this->load->view('lecture_hall/zhg011', $data);
		}
	}	
?>