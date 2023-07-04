<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = "pengguna";
    protected $primaryKey = 'id_pengguna';

    public function getUser($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id_pengguna' => $id]);
        }   
    }
}
