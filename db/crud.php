<?php
class crud
{
    // private database object
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }


    // function to insert a new record into the tickets database
    public function insertTickets($cliente, $correo, $telefono, $equipo, $serie, $servicio, $estimado, $descripcion/*, $creacion*/, $estatus = "Abierto")
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO tickets2(cliente,correo,telefono,equipo,serie,servicio,estimado,descripcion/*,creacion*/,estatus) VALUES (:cliente,:correo,:telefono,:equipo,:serie,:servicio,:estimado,:descripcion/*,:creacion*/,:estatus)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':cliente', $cliente);
            $stmt->bindparam(':correo', $correo);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':equipo', $equipo);
            $stmt->bindparam(':serie', $serie);
            $stmt->bindparam(':servicio', $servicio);
            $stmt->bindparam(':estimado', $estimado);
            $stmt->bindparam(':descripcion', $descripcion);
            //$stmt->bindparam(':creacion', $creacion);
            $stmt->bindparam(':estatus', $estatus);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editTicket($folio, $cliente, $correo, $telefono, $equipo, $serie, $servicio, $estimado, $descripcion, $creacion, $estatus)
    {
        try {
            $sql = "UPDATE `tickets2` SET `cliente`=:cliente,`correo`=:correo,`telefono`=:telefono,`equipo`=:equipo,`serie`=:serie,`servicio`=:servicio,`estimado`=:estimado,`descripcion`=:descripcion,`creacion`=:creacion,`estatus`=:estatus WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':folio', $folio);
            $stmt->bindparam(':cliente', $cliente);
            $stmt->bindparam(':correo', $correo);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':equipo', $equipo);
            $stmt->bindparam(':serie', $serie);
            $stmt->bindparam(':servicio', $servicio);
            $stmt->bindparam(':estimado', $estimado);
            $stmt->bindparam(':descripcion', $descripcion);
            $stmt->bindparam(':creacion', $creacion);
            $stmt->bindparam(':estatus', $estatus);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // NEW
    public function getTickets()
    {
        try {
            $sql = "SELECT * FROM tickets t inner join clients c on t.cliente_id = c.cliente_id WHERE estatus = 'abierto'";
            $resultado = $this->db->query($sql);
            return $resultado;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

     // OLD
    public function getTicketsDashboard()
    {
        try {
            $sql = "SELECT * FROM tickets2 WHERE estatus = 'abierto'";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // NEW
    public function getTicketsHistory()
    {
        try {
            $sql = "SELECT * FROM tickets t inner join clients c on t.cliente_id = c.cliente_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // NEW
    public function getTicketDetails($folio)
    {
        try {
            $sql = "SELECT * FROM tickets t inner join clients c on t.cliente_id = c.cliente_id WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':folio', $folio);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // OLD
    /*
    public function getTicketDetails($folio)
    {
        try {
            $sql = "SELECT * FROM tickets2 WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':folio', $folio);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    */

    public function deleteTicket($folio)
    {
        try {
            $sql = "DELETE FROM tickets2 WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':folio', $folio);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // NEW
    public function insertClient($nombre, $apellido, $telefono, $correo, $comentarios)
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO clients(nombre,apellido,telefono,correo,comentarios)
                    VALUES (:nombre,:apellido,:telefono,:correo,:comentarios)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':nombre', $nombre);
            $stmt->bindparam(':apellido', $apellido);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':correo', $correo);
            $stmt->bindparam(':comentarios', $comentarios);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editClient($cliente_id, $nombre, $apellido, $telefono, $correo, $comentarios)
    {
        try {
            $sql = "UPDATE `clients` SET `nombre`=:nombre,`apellido`=:apellido,`telefono`=:telefono,`correo`=:correo,`comentarios`=:comentarios WHERE cliente_id = :cliente_id";
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':cliente_id', $cliente_id);
            $stmt->bindparam(':nombre', $nombre);
            $stmt->bindparam(':apellido', $apellido);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':correo', $correo);
            $stmt->bindparam(':comentarios', $comentarios);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

        // NEW
    public function getClients()
    {
        try {
            $sql = "SELECT * FROM clients";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // NEW
    public function getClientDetails($cliente_id)
    {
        try {
            $sql = "SELECT * FROM clients WHERE cliente_id = :cliente_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':cliente_id', $cliente_id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteClient($cliente_id)
    {
        try {
            $sql = "DELETE FROM clients WHERE cliente_id = :cliente_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':cliente_id', $cliente_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getDevices()
    {
        try {
            $sql = "SELECT * FROM `devices`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getDevicesById($id)
    {
        try {
            $sql = "SELECT * FROM `devices` where equipo_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /*

    public function getSpecialties()
    {
        try {
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public function getSpecialtyById($id)
    {
        try {
            $sql = "SELECT * FROM `specialties` where specialty_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    */
}

?>
