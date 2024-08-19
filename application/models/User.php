<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Asegúrate de cargar la base de datos
    }

    public function hasPermission($user_id, $permiso)
    {
        $this->db->select('permisos.permiso');
        $this->db->from('permisos');
        $this->db->join('permiso_rol', 'permisos.id = permiso_rol.permiso_id');
        $this->db->join('roles', 'roles.id = permiso_rol.rol_id');
        $this->db->join('rol_usuario', 'roles.id = rol_usuario.rol_id');
        $this->db->where('rol_usuario.user_id', $user_id);
        $this->db->where('permisos.permiso', $permiso);
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }

    public function getUserByEmailAndPassword($email, $contraceña)
    {
        $this->db->where('email', $email);
        $this->db->where('estado', 'activo');

        $query = $this->db->get('usuarios');
        $user = $query->row();

        if ($user && password_verify($contraceña, $user->contraceña)) {
            return $user;
        }

        return false;
    }
}
