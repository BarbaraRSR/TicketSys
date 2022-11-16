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

/////////////
/* TICKETS */
///////////// 

public function insertTicket($cliente, $equipo, $servicio, $estimado, $descripcion/*, $fecha*/, $estatus = "Abierto")
{
    try {
        $sql = "INSERT INTO tickets(cliente_id, equipo_id, servicio,estimado,descripcion/*,fecha*/,estatus) VALUES (:cliente, :equipo, :servicio,:estimado,:descripcion/*,:fecha*/,:estatus)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':cliente', $cliente);
        $stmt->bindparam(':equipo', $equipo);
        $stmt->bindparam(':servicio', $servicio);
        $stmt->bindparam(':estimado', $estimado);
        $stmt->bindparam(':descripcion', $descripcion);
        //$stmt->bindparam(':fecha', $fecha);
        $stmt->bindparam(':estatus', $estatus);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

    public function editTicket($folio, $cliente, $equipo, $servicio, $estimado, $descripcion, $fecha, $estatus)
    {
        try {
            $sql = "UPDATE `tickets` SET `cliente_id`=:cliente,`equipo_id`=:equipo,`servicio`=:servicio,`estimado`=:estimado,`descripcion`=:descripcion,`fecha`=:fecha,`estatus`=:estatus WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':folio', $folio);
            $stmt->bindparam(':cliente', $cliente);
            $stmt->bindparam(':equipo', $equipo);
            $stmt->bindparam(':servicio', $servicio);
            $stmt->bindparam(':estimado', $estimado);
            $stmt->bindparam(':descripcion', $descripcion);
            $stmt->bindparam(':fecha', $fecha);
            $stmt->bindparam(':estatus', $estatus);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTickets()
    {
        try {
            $sql = "SELECT * FROM tickets t 
                    inner join clients c on t.cliente_id = c.cliente_id
                    inner join devices d on t.equipo_id = d.equipo_id 
                    WHERE estatus = 'abierto'";
            $resultado = $this->db->query($sql);
            return $resultado;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTicketsALL()
    {
        try {
            $sql = "SELECT * FROM tickets t 
                    inner join clients c on t.cliente_id = c.cliente_id
                    inner join devices d on t.equipo_id = d.equipo_id ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTicketDetails($folio)
    {
        try {
            $sql = "SELECT * FROM tickets t 
                    inner join clients c on t.cliente_id = c.cliente_id 
                    inner join devices d on t.equipo_id = d.equipo_id 
                    WHERE folio = :folio";
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

    public function deleteTicket($folio)
    {
        try {
            $sql = "DELETE FROM tickets WHERE folio = :folio";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':folio', $folio);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

/////////////
/* CLIENTS */
///////////// 

    public function insertClient($nombre, $apellido, $telefono, $correo, $comentarios)
    {
        try {
            $sql = "INSERT INTO clients(nombre,apellido,telefono,correo,comentarios)
                    VALUES (:nombre,:apellido,:telefono,:correo,:comentarios)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':nombre', $nombre);
            $stmt->bindparam(':apellido', $apellido);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':correo', $correo);
            $stmt->bindparam(':comentarios', $comentarios);
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
            $stmt->bindparam(':cliente_id', $cliente_id);
            $stmt->bindparam(':nombre', $nombre);
            $stmt->bindparam(':apellido', $apellido);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':correo', $correo);
            $stmt->bindparam(':comentarios', $comentarios);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

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

/////////////
/* DEVICES */
///////////// 

public function insertDevice($tipo, $marca, $modelo, $serie)
{
    try {
        $sql = "INSERT INTO devices(tipo,marca,modelo,serie)
                VALUES (:tipo,:marca,:modelo,:serie)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':tipo', $tipo);
        $stmt->bindparam(':marca', $marca);
        $stmt->bindparam(':modelo', $modelo);
        $stmt->bindparam(':serie', $serie);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function editDevice($equipo_id, $tipo, $marca, $modelo, $serie)
{
    try {
        $sql = "UPDATE `devices` SET `tipo`=:tipo,`marca`=:marca,`modelo`=:modelo,`serie`=:serie WHERE equipo_id = :equipo_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':equipo_id', $equipo_id);
        $stmt->bindparam(':tipo', $tipo);
        $stmt->bindparam(':marca', $marca);
        $stmt->bindparam(':modelo', $modelo);
        $stmt->bindparam(':serie', $serie);
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

    public function getDeviceDetails($equipo_id)
    {
        try {
            $sql = "SELECT * FROM devices WHERE equipo_id = :equipo_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':equipo_id', $equipo_id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteDevice($equipo_id)
    {
        try {
            $sql = "DELETE FROM devices WHERE equipo_id = :equipo_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':equipo_id', $equipo_id);
            $stmt->execute();
            return true;
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


}

?>
