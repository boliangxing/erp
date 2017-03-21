<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidian extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Cidian_model');

      //  $this->load->library('php-excel/reader');



    }
    public function index(){
      $this->load->helper('url');


        $this->load->model('Cidian_model');
          $data['list']=$this->Cidian_model->select();



        $this->load->view('Cidian/index',$data);

    }
          public function cidian_zong(){
  $this->load->helper('url');
	if (IS_POST) {
$data=$this->input->post();
          $this->load->model('Cidian_model');

				//	$name=$this->input->post('ptypeid');
						$tname=$this->input->post('tname');
            $ptid=$this->input->post('ptid');
					// $newt=INT($test)+1;
					// PRINT($newt);
                 //$name=substr($ptid,0,1)+1;
								 //$typeid=$name.$ptid;
					 $test=$this->Cidian_model->cidian_zong($ptid);

					 if(!$test){

						 $typeid=1000;
					 }else{

						 		$typeid=$test[0]['typeid']+1;
					 }

          $row=$this->Cidian_model->cidian_add($typeid,$tname);
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
   $data['typeid']=$this->uri->segment(3);
			//	$data['list']=$this->Cidian_model->cidian_id($typeid);


	 			//$test=$this->Cidian_model->cidian_typeid($ntid,$name);
          $this->load->view('Cidian/cidian_zong',$data);
      }


					}
     public function cidian_add(){
  $this->load->helper('url');
  if (IS_POST) {
$data=$this->input->post();
          $this->load->model('Cidian_model');

				//	$name=$this->input->post('ptypeid');
						$tname=$this->input->post('tname');
            $ptid=$this->input->post('ptid');
					// $newt=INT($test)+1;
					// PRINT($newt);
                 $name=substr($ptid,0,1)+1;
								 $typeid=$name.$ptid;
					 $test=$this->Cidian_model->cidian_typeid($name);
					 if(!$test){

						 $typeid=$typeid.'1';
					 }else{

						 		$typeid=$test[0]['typeid']+1;
					 }

          $row=$this->Cidian_model->cidian_add($typeid,$tname);
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
   $typeid=$this->uri->segment(3);
				$data['list']=$this->Cidian_model->cidian_id($typeid);


	 			//$test=$this->Cidian_model->cidian_typeid($ntid,$name);
          $this->load->view('Cidian/cidian_add',$data);
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
