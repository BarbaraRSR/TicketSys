<?php
class crud
{
    // private database object
    private $db;
    protected $numPaginas;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // function to insert a new record into the attendee database
    public function insertClients($nombre, $apellido, $telefono, $correo, $comentarios)
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

    public function insertTickets($clienteid, $tipo, $marca, $modelo, $serie, $servicio, $estimado, $descripcion)
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO tickets(clienteid,tipo,marca,modelo,serie,servicio,estimado,descripcion) VALUES (:clienteid,:tipo,:marca,:modelo,:serie,:servicio,:estimado,:descripcion)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':clienteid', $clienteid);
            $stmt->bindparam(':tipo', $correo);
            $stmt->bindparam(':marca', $telefono);
            $stmt->bindparam(':modelo', $equipo);
            $stmt->bindparam(':serie', $serie);
            $stmt->bindparam(':servicio', $servicio);
            $stmt->bindparam(':estimado', $estimado);
            $stmt->bindparam(':descripcion', $descripcion);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getClients($total, $pagina, $registros = 10)
    {
        try {
            $this->numPaginas = ceil($total/$registros); 
            $inicio = ($registros*$pagina)-$registros; 

            $sql = "SELECT * FROM clients limit $inicio,$registros";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getClientsAll()
    {
        try {
            $sql = "SELECT count(*) AS total FROM clients";
            $result = $this->db->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTickets($total, $pagina, $registros = 10)
    {
        try {
            $this->numPaginas = ceil($total/$registros); 
            $inicio = ($registros*$pagina)-$registros; 

            $sql = "SELECT folio, fecha, tipo, marca, modelo, servicio, clients.clienteid, clients.nombre, clients.apellido
                    FROM tickets
                    INNER JOIN clients ON tickets.clienteid=clients.clienteid
                    WHERE estatus = 'abierto' limit $inicio,$registros";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTicketsAll()
    {
        try {
            $sql = "SELECT count(*) AS total 
                    FROM tickets
                    INNER JOIN clients ON tickets.clienteid=clients.clienteid
                    WHERE estatus = 'abierto'";
            $result = $this->db->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getHistory($total, $pagina, $registros = 10)
    {
        try {
            $this->numPaginas = ceil($total/$registros); 
            $inicio = ($registros*$pagina)-$registros; 

            $sql = "SELECT folio, fecha, tipo, marca, modelo, servicio, estimado, estatus, clients.clienteid, clients.nombre, clients.apellido
                        FROM tickets
                        INNER JOIN clients ON tickets.clienteid=clients.clienteid  limit $inicio, $registros";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function getHistoryAll()
    {
        try {
            $sql = "SELECT count(*) AS total FROM tickets
                        INNER JOIN clients ON tickets.clienteid=clients.clienteid;";
            $result = $this->db->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function getPaginator($pagina)
    {
        $paginator = '';
        if ($this->numPaginas > 1) {
            $paginator .= '<nav aria-label="Page navigation example">
        <ul class="pagination">';
            for($i = 1; $i < $this->numPaginas + 1; $i++) { 
                $paginator .= "<li class='page-item'><a class='page-link' href='".$pagina."?pagina=$i'>".$i."</a></li>"; 
            } 
            $paginator .= '</ul>
            </nav>';
        }
        return $paginator;
    }

    public function getClientDetails($clienteid)
    {
        try {
            $sql = "SELECT * FROM clients WHERE clienteid = :clienteid";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':clienteid', $clienteid);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTicketDetails($folio)
    {
        try {
            $sql = "SELECT folio, fecha, tipo, marca, modelo, serie, descripcion, servicio, estimado, estatus, clients.clienteid, clients.nombre, clients.apellido, clients.telefono, clients.correo, clients.comentarios
            FROM tickets
            INNER JOIN clients ON tickets.clienteid=clients.clienteid;";
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


    public function deleteAttendee($id)
    {
        try {
            $sql = "DELETE FROM attendee WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /* ESTO NO PARECE SER PARTE DE NUESTRO SISTEMA
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
    } */
}

?>