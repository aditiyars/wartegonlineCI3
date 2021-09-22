<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        if($this->session->userdata('username') == null){
            $this->load->view('Auth/login');
        }
        else{
            $this->session->set_flashdata('message','<div class="alert alert-success" 
            role="alert">Anda telah melakukan login</div>');
            redirect('User');
        }
    }
    
	public function login()
    {
        if($this->session->userdata('username') == null){
            $this->form_validation->set_rules('username','Username', 'required|trim');
            $this->form_validation->set_rules('password','Password', 'required|trim');

            if($this->form_validation->run() == false)
            {
                $this->load->view('Auth/login');
            }
            else
            { 
                $this->_login();
            }
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-success" 
            role="alert">Anda telah melakukan login</div>');
            redirect('User');
        }
        
    }

    private function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->load->model('User');
            
        $result = $this->User->get_user_info($username);
        
        if(count($result) > 0)
        {
            if(password_verify($password, $result[0]['password']))
            {   $data['username'] = $result[0]['username'];
                $this->session->set_userdata('username',$data['username']);
                $this->session->set_flashdata('message','<div class="alert alert-success" 
            role="alert">Selamat datang '. $data['username'].'</div>');
                $this->load->view('user/menu');
                redirect('User');
            }
            else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" 
                role="alert">Wrong Password. Try again!</div>');
                redirect('Auth/login'); 
            }
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger" 
            role="alert">Username is not registered</div>');
            redirect('Auth/login');  
        }

    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username',
        'required|trim|is_unique[user.username]',[
            'is_unique' => 'This Username has already registered!'
    ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if( $this->form_validation->run() == false)
        {
            $this->load->view('auth/register');
        }
        else
        {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)) ,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'name' => htmlspecialchars($this->input->post('name', true)) , 
                'role' => 'member'
            ];

            $this->db->insert('User',$data);
            $this->session->set_flashdata('message','<div class="alert alert-primary" 
            role="alert">Congratulation! your account has been created. Please Login</div>');            
            redirect('Auth/login');
        }
        
    }

}