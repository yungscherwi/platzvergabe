<?php  
	class Zhg extends CI_Controller{

	public function index() {
		$this->load->view('templates/header');
        $this->load->view('hoersaele/first');
        $this->load->view('templates/footer');
		}

	public function zhg001(){
		//$this->load->;
	}

	public function view($page){
      //Wenn Seite nicht existiert->404
      /*if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }*/
      //ucfirst-> UpperCasefirst, also erster Buchstabe groß
      	$output = $this->first_column();
      	$output = $this->fillarray(160, $output);
        $data['title'] = ucfirst($page);
        $data['value'] = $output;
        $this->load->view('templates/platzvergabeheader');
        $this->load->view('lecture_hall/zhg'.$page, $data);
        $this->load->view('templates/footer');

    }

    public function first_column(){
      $x = [];
      $start_row = 2;
      $i = 1;
      $handle = fopen('uploads/liste.csv', 'r');
      while(($row = fgetcsv($handle, 1000, ';')) !== FALSE) {
        if($i >= $start_row) {
          array_push($x, $row[0]);
        }
        $i++;
      }
      fclose($handle);
      return $x;	//print_r ($x);

    }

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
}
?>