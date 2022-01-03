<?php
namespace App\Controllers;

use App\Models\M_Product;
use CodeIgniter\HTTP\Response;
use PDF;

class Product extends BaseController
{
    public function __construct()
    {
        $this->model = new M_Product;
    }

    public function index()
    {

        $data = [
            'judul' => 'Data Produk',
            'product' =>$this->model-> getAllData()
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Product/index'); 
        echo view('templates/v_footer');

    }
    public function AddProduct()
    {
            $data = [
            'id_komoditi' => '',
            'nama_komoditi' => $this->request->getPost('nama_komoditi'),
            'jumlah'=> $this->request -> getPost('jumlah_komoditi')
            ];

            //insert data 
            $success = $this->model->addDataProduct($data);
            if ($success) {
                session()->setFlashdata('message','Ditambahkan');
                return redirect()->to(base_url('/product'));
            }
    }

    public function DeleteProduct($id){
        $success = $this->model->deleteProductById($id);
            if ($success) {
                session()->setFlashdata('message','Dihapus');
                return redirect()->to(base_url('/product'));
            }
        
    }
    public function editProduct()
    {

            $id_komoditi = $this->request->getPost('id_komoditi');
            $data = [
            'id_komoditi' => $id_komoditi,
            'nama_komoditi' => $this->request->getPost('nama_komoditi'),
            'jumlah'=> $this->request -> getPost('jumlah_komoditi')
            ];

            //update data 
            $success = $this->model->editProductDataById($data, $id_komoditi);
            if ($success) {
                session()->setFlashdata('message','Diubah');
                return redirect()->to(base_url('/product'));
            }
    }

    public function GetProductChart(){

        $data = $this->model->GetProductChart();
        if ($data) {
            $c = array( "caption"=> "Pemasukan Komoditas",
            "subCaption"=>"Komoditas Pangan",
            "xAxisName"=>"Nama Komoditi",
            "yAxisName"=>"Jumlah",
            "theme"=>"fint");

            $gab = array("chart"=>$c, "data"=>$data);   
            $j = json_encode($gab);
            echo $j;
        }
        
    }

    public function DownloadPDF(){
        $data = $this->model->getAllData();

        $pdf = new \FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->Image('../public/assets/img/Logo-IPB.jpg', 10, 6, 20);
        $pdf->SetFont('Arial','B',24);
        $pdf->Cell(0,7,'Laporan Data Komoditas',0,1,'C');
        $pdf->Cell(10,15,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(30,6,'Id',1,0,'C');
        $pdf->Cell(100,6,'Nama Komoditi',1,0,'C');
        $pdf->Cell(50,6,'Jumlah',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $no=0;
        foreach ($data as $row){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(30,6,$row["id_komoditi"],1,0);
            $pdf->Cell(100,6,$row["nama_komoditi"],1,0);
            $pdf->Cell(50,6,$row["jumlah"],1,1,'R');
        }
        $pdf->Output('D', 'Laporan komoditas.pdf');
    }
        
        
    public function DownloadXLS(){
        $data = [
            'judul' => 'Data Produk',
            'product' =>$this->model-> getAllData()
        ];
        header("content-type: application/vnd.ms-excel");
        header("content-Disposition: attachment; filename=Export_Komoditi.xls");
        echo view('Home/export', $data);
    }
        

}