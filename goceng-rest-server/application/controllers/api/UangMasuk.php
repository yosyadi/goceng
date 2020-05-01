<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class UangMasuk extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UangMasuk_model', 'uangmasuk');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id === null){
            $uangmasuk = $this->uangmasuk->getUangMasuk();
        }else{
            $uangmasuk =  $this->uangmasuk->getUangMasuk($id);
        }


        if($uangmasuk){
            $this->response([
                'status' => true,
                'data' => $uangmasuk
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if( $this->uangmasuk->deleteUangMasuk($id) > 0){
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'tanggal' => $this->post('tanggal'),
            'jumlah' => $this->post('jumlah'),
            'kategori' => $this->post('kategori'),
            'keterangan' => $this->post('keterangan')
        ];
        if($this->uangmasuk->createUangMasuk($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new data has been created'
            ], REST_Controller::HTTP_CREATED);
        }else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'tanggal' => $this->put('tanggal'),
            'jumlah' => $this->put('jumlah'),
            'kategori' => $this->put('kategori'),
            'keterangan' => $this->put('keterangan')
        ];
        if($this->uangmasuk->updateUangMasuk($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'data has been updated'
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}