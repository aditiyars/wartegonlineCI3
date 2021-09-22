<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function index (){
        
        $this->load->model('Menu');
        $menu = $this->Menu->get_menu();
        $data['menu'] = $menu;
        $this->load->view('templates/head',$data);
        $this->load->view('templates/navbar');
        $this->load->view('user/menu');
        $this->load->view('templates/footer');
      
    }

    public function keranjang(){
        
        if($this->session->userdata['username'] != null){
            $username = $this->session->userdata['username'];
            $this->load->model('Menu');
            $pesanan = $this->Menu->get_pesanan($username);
            $data['pesanan'] = $pesanan;
            $this->load->view('templates/head', $data);
            $this->load->view('templates/navbar');
            $this->load->view('user/cart');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-primary" 
                role="alert">Login terlebih dahulu !</div>');
            redirect('Auth/login');
        }
    }

    public function pesan(){
        if($this->session->userdata['username'] != null){
            $username = $this->session->userdata('username');
            $i = 1;
            $this->load->model('Menu');
            $menu = $this->Menu->get_menu();
            
            for($i;$i<=count($menu);$i++){
                $jmlh[$i] = $this->input->post('jmlh'.$i);

                if($jmlh[$i]>0 && $jmlh[$i] <= $menu[$i-1]['stock']){
                    $this->Menu->insert_menu($username, $jmlh,$i);
                    $this->session->set_flashdata('message','<div class="alert alert-primary" 
                    role="alert">Pesanan berhasil dibuat!</div>');
                }
                else if($jmlh[$i] > $menu[$i-1]['stock'])
                {
                    $this->session->set_flashdata('message','<div class="alert alert-primary" 
                    role="alert">Stock kosong Pesanan gagal dibuat!</div>');
                }
            }
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-primary" 
                role="alert">Login terlebih dahulu !</div>');
            redirect('Auth/login');
        }
        $this->index();

    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message','<div class="alert alert-primary" 
        role="alert">You have been logout!</div>');
        redirect('Auth/login');
    }
    
    public function hapus()
    {   
        if($this->session->userdata['username'] != null){
            if($this->input->post('id') != null){
                $username = $this->session->userdata('username');
                $this->load->model('Menu');
                $pesanan = $this->Menu->get_pesanan($username);
                $i = $this->input->post('id');
                $this->input->post('hapus');    
                $name = $pesanan[$i-1]['name'];
                $this->Menu->del_pesanan($name, $username);
                $this->keranjang();
            }
            else{
                echo "<script type='text/javascript'>alert('Tekan tombol hapus terlebih dahulu');</script>";
                $this->keranjang();
            }
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-primary" 
                role="alert">Login terlebih dahulu !</div>');
            redirect('Auth/login');
        }
    }

}