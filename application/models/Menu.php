<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu extends CI_Model {
        
        public function get_menu()
        {
            $this->db->select('*');
            $this->db->from('menu');

            $result = $this->db->get();

            return $result->result_array();
        }

        public function insert_menu($username,$jmlh,$i)
        {   
            date_default_timezone_set("Asia/Jakarta");
            $t = time();
            $this->db->set('username',$username);
            $this->db->set('jumlah',$jmlh[$i]);
            $this->db->set('id_makanan',$i);
            $this->db->set('date',date('m/d/Y H:i:s',$t));
            $this->db->insert('pesanan');
            
            $menu = $this->get_menu();
            
            $this->db->set('stock', $menu[$i-1]['stock'] - $jmlh[$i]);
            $this->db->where('id', $i);
            $this->db->update('menu');
        }

        public function get_pesanan($username)
        {
            return $this->db->query("select menu.name, SUM(pesanan.jumlah) as jumlah, menu.price
            from pesanan, menu
            where pesanan.username = '$username' AND pesanan.id_makanan = menu.id
            GROUP BY menu.name;")->result_array();
        }

        public function del_pesanan($menu_name, $username)
        {  $id = $this->db->query("SELECT id 
                FROM menu 
                WHERE name = '$menu_name';")->row_array();
            $id2 = $id['id'];
            return $this->db->query("DELETE 
                FROM pesanan 
                WHERE username = '$username' AND id_makanan = $id2 ;");
        }

    }
?>