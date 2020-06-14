<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {
    	parent::__construct();
    	$this->load->database();
        //echo $this->router->fetch_class();
        //echo $this->router->fetch_method();
    	
    }    
    
     public function index()
	 {
        $data['nav'] ='home';    
        $this->load->view('header',$data);
		$this->load->view('Image_upload');
		
	  } 

	  public function ajax_upload()
	 {  
        $msg="";
        try{         

         $count= count($_FILES["image_file"]["name"]);      
         
         for($i=0; $i<$count; $i++ )
         {
	 	
            if(isset($_FILES["image_file"]["name"][$i]))  
              {  

         	    $_FILES['file']['name']     = $_FILES['image_file']['name'][$i];
				$_FILES['file']['type']     = $_FILES['image_file']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['image_file']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['image_file']['error'][$i];
				$_FILES['file']['size']     = $_FILES['image_file']['size'][$i];

                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                //$config['max_width']            =  1024;
                //$config['max_height']           =  768;              
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('file'))  
                {  
                    $error = array('error'=>$this->upload->display_errors());
                        $this->load->view('Image_uplod',$error); 
                }  
                else  
                {  
                     $uploadData = $this->upload->data();
                     $file_name = $uploadData['file_name'];
                     $file_name = base_url()."upload/".$uploadData['file_name'];
                     $sql ="insert into images(image)values('".$file_name."')";
                     $query = $this->db->query($sql);
                     $insert_id = $this->db->insert_id();

                   }   
                        }

                 
           }
           $msg = "Image Successfully Insert";
       }catch(Exception $e) {
           $msg = "Error,Please try again".$e->getMessage();
       }
         echo $msg;
                          
		
	  }

	  public function display()
	 {
        $this->load->model('Taskmodel');
        $data['Images']=$this->Taskmodel->getimages();
        $this->load->view('header');
		$this->load->view('Image_display',$data);
		
	 } 

     public function display_view()
     {
       $this->load->model('Taskmodel');
       $data['Images']=$this->Taskmodel->getimages();
   
    }




	  public function import()
	 {   
        $this->load->view('header');
		$this->load->view('import');
		
	 }


	  public function export()
	 {
        $this->load->model('Taskmodel');
        $data['user_details']=$this->Taskmodel->userdetails();
        $this->load->view('header');
		$this->load->view('view_data',$data);
		
	  }

        public function user_download()
        {

        $this->load->model('Taskmodel');        
        $this->load->library('excel');

        $data = $this->Taskmodel->userdetails();
        //print_r($data);

        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $tablecolumn = array('Id','First Name','Last Name','Email');

        $column =0;

        foreach ($tablecolumn as $field) 
        {
        $object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$field);
        $column++;
        }

        $rowCount = 2;
        foreach ($data as $val) 
        {
        $object->getActiveSheet()->SetCellValue('A' . $rowCount, $val->Id);
        $object->getActiveSheet()->SetCellValue('B' . $rowCount, $val->first_name);
        $object->getActiveSheet()->SetCellValue('C' . $rowCount, $val->last_name);
        $object->getActiveSheet()->SetCellValue('D' . $rowCount, $val->Email);

        $rowCount++;
        }


        $filename='User_Data_Report.XLSX'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); 
        //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel2007');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output'); 



        }

      ////excel file upload

   function import_excel()
   {
    $this->load->model('Taskmodel');
  $this->load->library('excel');
  $object = new PHPExcel();
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     //$Id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $first_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $last_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $mobile = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $Email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     
     $data[] = array(      
      'first_name'   => $first_name,
      'last_name'    => $last_name,
      'mobile'    => $mobile,
      'Email'        => $Email
     );
    }
   }
   $this->Taskmodel->insert($data);
   echo 'Data Imported successfully';
  } 
 }





    }
