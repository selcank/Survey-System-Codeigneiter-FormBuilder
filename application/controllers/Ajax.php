<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {


    public function create_survey()
    {

       date_default_timezone_set('Turkey');
        $today = date("Y-m-d H:i:s");
        $data_alldata_json='';
        $title=$this->input->post('title');
        $all_data=$this->input->post('data');

        if($title==''){
            echo json_encode(array(
                'result' => 'error',
                'message' => 'Lütfen bir başlık giriniz!',
            ));
        }else{
            $data_alldata_json='{';
            for ($i=0;$i<count($all_data);$i++){
                $stid='page'.($i+1);
                $data_alldata_json.='"'.$stid.'"'.':'.json_encode($all_data[$i]).',';
            }
            $json_data=substr($data_alldata_json, 0, -1);
            $json_data=$json_data.'}';
            $data=array('survey_name'=>$title,
                'created_by'=>$today,
                'survey_form_json'=>$json_data);

           if($this->db->insert('survey',$data)) {
               $insert_id = $this->db->insert_id();
               echo json_encode(array(
                   'result' => 'success',
                   'message' => 'OK',
                   'survey_id' => $insert_id,
               ));
           }else{
               echo json_encode(array(
                   'result' => 'error',
                   'message' => 'Kaydedilirken hata oluştu!',
               ));
           }
        }
    }

    public function update_survey()
    {
        date_default_timezone_set('Turkey');
        $today = date("Y-m-d H:i:s");
        $data_alldata_json='';
        $title=$this->input->post('title');
        $all_data=$this->input->post('data');
        $form_id=$this->input->post('formid');

        if($title==''){
            echo json_encode(array(
                'result' => 'error',
                'message' => 'Lütfen bir başlık giriniz!',
            ));
        }else{
            $data_alldata_json='{';
            for ($i=0;$i<count($all_data);$i++){
                $stid='page'.($i+1);
                $data_alldata_json.='"'.$stid.'"'.':'.json_encode($all_data[$i]).',';
            }
            $json_data=substr($data_alldata_json, 0, -1);
            $json_data=$json_data.'}';
            $data=array('survey_name'=>$title,
                'created_by'=>$today,
                'survey_form_json'=>$json_data);
            $this->db->where('id', $form_id);

            if($this->db->update('survey', $data)) {
                echo json_encode(array(
                    'result' => 'success',
                    'message' => 'OK'
                ));
            }else{
                echo json_encode(array(
                    'result' => 'error',
                    'message' => 'Kaydedilirken hata oluştu!',
                ));
            }
        }
    }


public function save_result(){
    date_default_timezone_set('Turkey');
    $today = date("Y-m-d H:i:s");
    $all_data=$this->input->post('data');
    $survey_id=$this->input->post('id');
    $data=array('survey_id'=>$survey_id,
        'created_at'=>$today,
        'survey_result_json'=>$all_data);

    if($this->db->insert('survey_result',$data)) {
        echo json_encode(array(
            'result' => 'success',
            'message' => 'OK'
        ));
    }else{
        echo json_encode(array(
            'result' => 'error',
            'message' => 'Kaydedilirken hata oluştu!',
        ));
    }

}

}
