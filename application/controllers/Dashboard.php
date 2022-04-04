<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('DW-login') == false) {
			redirect(base_url('login'));
		} else {
			$this->load->library('encryption');
			$this->load->model("Login_model", 'mLogin');
			$this->load->library('form_validation');
			$this->load->model("User_model", 'mUser');
			$this->userId = $this->session->userdata("DW-userId");
			$this->profileData = $this->mUser->myProfile($this->userId);
			$this->role = $this->session->userdata("USF-hakAkses");
			$this->data = array(
				'header' => 'back/layout/header',
				'navbar' => 'back/layout/navbar',
				'sidebar' => 'back/layout/sidebar',
				// 'sidebarActive' => '',
				'myProfile' => $this->profileData,
				'content' => '',
				'footer' => 'back/layout/footer',
				'js' => 'back/layout/js',
				'alert' => 'back/layout/alert'
			);
		}
	}

	public function index()
	{
		$data = $this->data;
		$data['title'] = 'Dashboard';
		$data['tabTitle'] = 'DW | Dashboard';
		$data['sidebarActive'] = 'dashboard';
		$data['content'] = 'back/dashboard';
		// $data['script'] = '';
		$data['role'] = $this->role;
		$this->load->view('back/index', $data);
	}

	public function tes()
	{
		$rawArr = [
			[
				"corak" => "23063", "lbr" => "58", "grd" => "B", "dc" => "LCDO-01/-/1/-/10", "charname" => "@6 B:@7 58:@8 B/-/10:@9 1;@12 AM;@13 JET BLACK;@14 PD;@15 LADIES SUITING;@16-;@17 LCDO-01;", "pieceLength" => ["25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25"]
			],
			[
				"corak" => "23063", "lbr" =>  "58", "grd" => "B", "dc" => "LCDO-01/-/1/1/10", "charname" => "@6 B:@7 58:@8 B/1/10;@9 1:@12 AG;@13 JET BLACK;@14 PD;@15 LADIES SUITING;@16-;@17 LCDO-01;", "pieceLength" => ["25", "25"]
			],
			[
				"corak" => "23063", "lbr" => "58", "grd" => "B", "dc" => "LCDO-01/-/1/-/10", "charname" => "@6 B:@7 58:@8 B/-/10;@9 1;@12 AG;@13 JET BLACK;@14 PD;@15 LADIES SUITING;@16-;@17 LCDO-01;", "pieceLength" => ["25", "25"]
			],
			[
				"corak" => "23063", "Ibr" => "58", "grd" => "B", "dc" => "LCDO-01/-/1/1/10", "charname" => "@6 B:@7 58:@8 B/1/10;@9 1:@12 AM;@13 JET BLACK:@14 PD;@15 LADIES SUITING;@16 -;@17 LCDO-01;", "pieceLength" => ["25", "25", "25"]
			],
			[
				"corak" => "23063", "lbr" => "58", "grd" => "A2", "dc" => "LCDO-01/-/1/-/10", "charname" => "@6 A2:@7 58:@8 A2/-/10;@9 1:;@12 AM:@13 JET BLACK:@14 PD:@15 LADIES SUITING: @16-;@17 LCDO-01;", "pieceLength" => ["25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25"]
			],
			[
				"corak" => "23063", "Ibr" =>  "58", "grd" => "A2", "dc" => "LCDO-01/-/1/-/10", "charname" => "@6 A2:@7 58:@8 A2/-/10:@9 1;@12 AG;@13 JET BLACK:@14 PD;@15 LADIES SUITING;@16 -;@17 LCDO-01;", "pieceLength" => ["25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25",  "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25", "25"]
			]
		];

		$temp1 = []; //ini array penampung grd
		$temp2 = []; //ini array penampung dc
		$arrFilter = []; //array hasil filter berdasarklan grouping grade dan design-color

		// filter berdasarkan grade dan design-color
		foreach ($rawArr as $key => $ra) {
			if (!in_array($ra['grd'], $temp1) || !in_array($ra['dc'], $temp2)) {
				array_push($temp1, $ra['grd']);
				array_push($temp2, $ra['dc']);
				array_push($arrFilter, $ra);
			}
		}


		$arrStk = []; // array penampung untuk data stk final
		// menggabungkan qty piece length untuk yang duplikat row
		foreach ($arrFilter as $key => $af1) {
			unset($af1["pieceLength"]);
			$arrPl = [];
			foreach ($rawArr as $key => $ra) {
				if ($af1['grd'] == $ra['grd'] && $af1['dc'] == $ra['dc']) {
					array_push($arrPl, $ra['pieceLength']);
				}
			}
			$mergePl = array_merge(...$arrPl); // merge seluruh array qty piece length
			$af1['pl'] = $mergePl; //insert new elemen (array banyaknya piecelength)
			$af1['qtyPl'] = count($mergePl); //insert new elemen (banyaknya qty piecelength)
			$af1['sumPl'] = array_sum($mergePl); //insert new elemen (total qty piecelength)
			array_push($arrStk, $af1);
		}



		// penambahan elemen baru, yaitu total qty dan jml qty berdasarkan piece length yang ada
		$totalQty = 0;
		$totalSum = 0;
		foreach ($arrStk as $key => $as) {
			$totalQty += $as['qtyPl'];
			$totalSum += $as['sumPl'];
		}


		$data['arrFilter'] = $arrFilter;
		$data['dataStk'] = $arrStk;
		$data['totalQty'] = $totalQty;
		$data['totalSum'] = $totalSum;

		$this->load->view('back/tes', $data);
		// foreach ($arrStk as $key => $as) {
		// 	var_dump($as['pl']);
		// 	echo "<br>";
		// 	echo "<br>";
		// }

		// echo "<br>";
		// echo "<br>";
		// echo "<br>";
		// foreach ($arrStk as $nas => $vas) {
		// 	echo "<table border='1'>";
		// 	echo "<tr>";
		// 	foreach ($vas['pl'] as $vpl) {
		// 		echo "<td>" . $vpl . "</td>";
		// 	}
		// 	echo "<tr>";
		// }
		// echo "</table>";
	}
}
