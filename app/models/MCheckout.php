<?php
class MCheckout
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /* Test (database and table needs to exist before this works)*/
    public function add($data)
    {
        $this->db->query('INSERT INTO orders (id_prod,qte,total,id_user,payment_mode) VALUES(:id_product, :qte, :total, :id_user , :payment_mode)');
        //Bind value
        $this->db->bind(':id_product', $data['id_product']);
        $this->db->bind(':qte', $data['qte']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':id_user', $data['id_user']);
        $this->db->bind(':payment_mode', $data['payment_mode']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
