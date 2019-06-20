<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {


    public function index()
    {
        $results= $this->db->select('*')
            ->from('survey')->get()->result_array();
        $this->data['survey']=$results;
        $this->load->view('anket/index',$this->data);
    }
    public function create_form_builder()
    {
        $this->load->view('anket/create');
    }
    public function edit_survey($id)
    {

        $results= $this->db->select('*')
            ->from('survey')
            ->where('id',$id)
            ->get()->result();

        $this->data['survey_form_json']=$results[0];

        $this->load->view('anket/edit', $this->data);
    }
    public function render_survey($id)
    {

        $results= $this->db->select('*')
            ->from('survey')
            ->where('id',$id)
            ->get()->result();

        $this->data['survey_form_json']=$results[0];

        $this->load->view('anket/render', $this->data);
    }
    public function delete_survey($id){

        $this->db->where('id', $id);
        $this->db->delete('survey');

        $results_survey= $this->db->select('*')
            ->from('survey_result')->where('survey_id',$id)->get()->result_array();
        if(count($results_survey)>0){
            $this->db->where('survey_id', $id);
            $this->db->delete('survey_result');
        }

        $results= $this->db->select('*')
            ->from('survey')->get()->result_array();
        $this->data['survey']=$results;
        $this->load->view('anket/index',$this->data);

    }
    public function result_survey($id){

        $results= $this->db->select('*')
            ->from('survey_result')
            ->where('survey_id',$id)
            ->get()->result();

        $this->data['survey_form_json']=$results;
        $this->load->view('anket/result', $this->data);
    }
}
