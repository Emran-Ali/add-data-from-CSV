<?phpclass Connection{    protected $servername = "localhost";    protected $dbname = "skills";    protected $uname = "root";    protected $password = "";    public $conn;    public function __construct()    {        $this->conn = new mysqli($this->servername, $this->uname, $this->password, $this->dbname);        if ($this->conn->connect_error) {            die("Connection failed: " . $this->conn->connect_error);        }        echo "<script> console.log('Connected successfully')</script>";    }}