<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sim extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Sim_model');

      //  $this->load->library('php-excel/reader');



    }
    public function index(){
      $this->load->helper('url');


        $this->load->model('Sim_model');
          $data['list']=$this->Sim_model->select();
					$str = "1,2,3,4,5,6,";
					$data['newstr'] = substr($str,4);

        $this->load->view('Sim/index',$data);

    }

    public function sim_add(){
  $this->load->helper('url');
  if (IS_AJAX) {
$data=$this->input->post();
          $this->load->model('Sim_model');
          $row=$this->Sim_model->sim_add($data);
          if ($row) {
              //$json = array('status' => 1,'info' => '添加成功');
            //  $data['list']=$this->Permission_model->selectAll();

            //$this->load->view('admin/permission/index',$data);
     echo '添加成功';

          }else{
              $json = array('status' => 0,'info' => '添加失败');
            //  echo json_encode($json);
              //$this->load->view('admin/Permission/permission_add');

  echo '添加失败';
          }
      }else {
        # code...
          $this->load->view('Sim/sim_add');
      }


    }


    public function excel_put(){
        //先做一个文件上传，保存文件
        $path=$_FILES['file'];
        $filePath = "uploads/".$path["name"];
        move_uploaded_file($path["tmp_name"],$filePath);
        //$data=array('B'=>'name','C'=>'pwd','D'=>'money1','E'=>'salt');
        $data=array('B'=>'phone','C'=>'txid','D'=>'shiyong','E'=>'yue','F'=>'zongxf','G'=>'cztime','H'=>'kttime','I'=>'dqxufei'
      ,'J'=>'zuihoutx','K'=>'laiyuan','L'=>'state');
        $tablename='sim';//表名字
        $this->excel_fileput($filePath,$data,$tablename);
    }


    private function excel_fileput($filePath,$data,$tablename){
    $this->load->library("phpexcel");//ci框架中引入excel类
    $PHPExcel = new PHPExcel();
    $PHPReader = new PHPExcel_Reader_Excel2007();
    if(!$PHPReader->canRead($filePath)){
        $PHPReader = new PHPExcel_Reader_Excel5();
        if(!$PHPReader->canRead($filePath)){
            echo 'no Excel';
            return ;
        }
    }
    // 加载excel文件
    $PHPExcel = $PHPReader->load($filePath);

    // 读取excel文件中的第一个工作表
    $currentSheet = $PHPExcel->getSheet(0);
    // 取得最大的列号
    $allColumn = $currentSheet->getHighestColumn();
    // 取得一共有多少行
    $allRow = $currentSheet->getHighestRow();

    // 从第二行开始输出，因为excel表中第一行为列名
    for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
        /**从第A列开始输出*/
        //echo $allColumn;

        for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
            $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();
            //print_r($val);
            //die;

            if($currentColumn == 'A')
            {
                //echo $val."\t";
            }else if($currentColumn <= $allColumn){
                $data1[$currentColumn]=$val;
            }
        }
        foreach($data as $key=>$val){
            $data2[$val]=$data1[$key];
        }
        $this->db->insert($tablename,$data2);
        //print_r($data2);
        //echo "</br>";
    }
    //echo "\n";
    echo "导入成功";
}

}
