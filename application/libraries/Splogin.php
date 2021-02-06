<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Splogin
{
    var $CI = NULL;
    /**
     * Class constructor
     * @return void
     */
    public function __construct()
    {
        $this->CI = &get_instance();
    }
    /**
     * cek username dan password pada table users, jika ada set session berdasar data user daritable users.
     * @param string username dari input form
     * @param string password dari input form
     */

    public function login($username, $password)
    {
        $state = 'last_mod IS NOT NULL';
        $query =    $this->CI->db->get_where('user', array('username' => $username, $state));

        if ($query->num_rows() == 1) {
            $rw = $query->row();
            $pass = $rw->password;
            if (password_verify($password, $pass)) {
                $uname = $rw->user_nama;
                $regid = $rw->region_id;
                $level = $rw->role;
                //set session user 
                $this->CI->session->set_userdata('username', $username);
                $this->CI->session->set_userdata('uname', $uname);
                $this->CI->session->set_userdata('role', $level);
                $this->CI->session->set_userdata('region', $regid);
                //redirect ke halaman dashboard
                    redirect(base_url('dashboard'));
            } else {
                $this->CI->session->set_flashdata('catch', 'Password anda salah.. ');
                //redirect ke halaman login
                redirect(base_url('login'));
            }
        } else {
            $this->CI->session->set_flashdata('catch', 'Akun tidak terdaftar.. ');
            //redirect ke halaman login
            redirect(base_url('login'));
        }
        return false;
    }
    public function check()
    {
        if ($this->CI->session->userdata('username') == (null || '')) {
            $this->CI->session->set_flashdata('catch', 'Anda belum login');
            redirect(base_url('login'));
        }
    }
    //Clearing SESSION
    public function logout()
    {
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('uname');
        $this->CI->session->unset_userdata('role');
        $this->CI->session->unset_userdata('region');

        //REDIRECTING to login page
        $this->CI->session->set_flashdata('flash', 'Anda berhasil Log Out');
        redirect(base_url('login'));
    }
}
