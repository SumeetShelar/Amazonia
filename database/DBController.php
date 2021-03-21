<?PHP

class DBController {
    // Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'shopee';

    // Connection property
    public $con = null;

    // call Contructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if($this->con->connect_error) {
            echo "Fail".$this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();    
    }

    // for mysqli Closing Connection
    protected function closeConnection() {
        if($this->con != null) {
            $this->con->close();
            $this->con = null;
        }
    }
}

?>

