<?php
class DATABASE {
    private $host;
    private $dbname;
    private $charset;
    private $username;
    private $password;
    private $dbh;
    
    public function __construct()
    {
        try{
            $dsn = "mysql:host=localhost;dbname=xampvoorbereiding;charset=utf8";
            $this->dbh = new PDO($dsn, 'root', '');
        }
        catch (\PDOException $exception) {
            exit ('unable to connect. Error message:' . $exception->getMessage()); 
        }
        
    }

    public function create_admin() {
		$hashed_password = password_hash('admin', PASSWORD_DEFAULT);
		$sql = 'INSERT INTO users VALUES
		(NULL, :type_id, :username, :email, :password, :created_at, NULL)';
		$statement = $this->dbh->prepare($sql);
		$statement->execute([
		'type_id' => 1,
		'username' => 'admin',
		'email' => 'admin@example.org',
		'password' => $hashed_password,
		'created_at' => date('Y-m-d H:i:s')
		]);
	}

    public function login($username, $password){
        $sql = 'SELECT type_id, password FROM users WHERE username = :username';
        $statement = $this->dbh->prepare($sql);
        $statement->execute([
            'username' => $username
        ]);
        $results = $statement->fetch(PDO::FETCH_ASSOC);

        if (!empty($results) && password_verify($password, $results['password']))
        {
            session_start();
            $_SESSION['logged_in_as'] = $username;
            $_SESSION['is_admin'] = $results['type_id'] === '1';
            header('location: ../views/users_overview2.php');
			
			exit;
        }
        else
        header('location: login_incorrect.php');

    }
    

    public function departments_overview(): array 
    {
        $sql = 'SELECT departments.id, departments.name, departments.post_code ,departments.city,  departments.street , departments.number
		FROM departments';
        

        $statement = $this->statement_execute($sql);

		$results = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $results;
    }
	

	public function assign_default_users_to_departments(): void
	{
		$sql = 'INSERT INTO department_user
		VALUES
			(:department1, :user1),
			(:department2, :user1),
			(:department1, :user2),
			(:department2, :user2)';

		// $this->statement_execute vind je in les 7
		$this->statement_execute($sql, [
			'department1' => 1,
			'department2' => 2,
			'user1' => 1,
			'user2' => 2
		]);
	}

	public function department_user_overview(): array
	{
		$sql = 'SELECT departments.name as department_name, users.username  as username
		FROM department_user
		LEFT JOIN departments
			ON department_user.department_id = departments.id
		LEFT JOIN users
			ON department_user.user_id = users.id';

		$statement = $this->statement_execute($sql);

		$results = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	

	


    

    

    public function add_user($type_id, $username, $email, $password) {
        $hashed_password =
        password_hash($password, PASSWORD_DEFAULT);  

        $sql = 'INSERT INTO users (type_id,
        username, email, password)
        VALUES
        (:type_id, :username, :email, :password)';

        $statement = $this->dbh->prepare($sql);
        $statement->execute([
            'type_id' => $type_id,
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password,

        ]);

    }

    public function add_hour($type_id, $username, $email, $password) {
        $hashed_password =
        password_hash($password, PASSWORD_DEFAULT);  

        $sql = 'INSERT INTO users (type_id,
        username, email, password)
        VALUES
        (:type_id, :username, :email, :password)';

        $statement = $this->dbh->prepare($sql);
        $statement->execute([
            'type_id' => $type_id,
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password,

        ]);

    }
    public function users_overview(): array
	{
		// Bij een JOIN, zet altijd de tabelnaam voor de kolomnaam (SELECT tabel.kolom, tabel.kolom)
		// Dit is om verwarring in SQL te voorkomen; zowel users als user_types hebben een kolom created_at, bijvoorbeeld!
		$sql = 'SELECT user_types.id as type_id, user_types.type, users.id, users.username, users.email, users.created_at, users.updated_at
		FROM users
		LEFT JOIN user_types
			ON users.type_id = user_types.id';

		// $this->statement_execute vind je terug in les 7
		$statement = $this->statement_execute($sql);

		$results = $statement->fetchAll(PDO::FETCH_ASSOC);

		// PDOStament->fetchAll() returned altijd een array!
		return $results;
	}

	public function create_default_hours(): void
	{
		$sql  ='INSERT INTO hours (user_id, starts_at, ends_at)
		VALUES
			(:user_id, :start1, :end1),
			(:user_id, :start2, :end2)';

		// We lezen niks (we INSERTen alleen), dus we hoeven de output ook niet op te slaan
		$this->statement_execute($sql, [
			'user_id' => 2,

			'start1' => '2021-06-03 10:30',
			'end1' => '2021-06-03 12:30',
			'start2' => '2021-06-07 11:00',
			'end2' => '2021-06-11 11:00'
		]);
	}

	// Dit lijkt een beetje copy-paste van users_overview()... En dat is het ook; efficiënt code hergebruiken ;)
	public function hours_overview(): array
	{
		$sql = 'SELECT users.username, hours.id, hours.starts_at, hours.ends_at
		FROM hours
		LEFT JOIN users
			ON hours.user_id = users.id';

		$statement = $this->statement_execute($sql);

		$results = $statement->fetchAll(PDO::FETCH_ASSOC);

		// UNIX timestamp erbij zetten, zodat we die later kunnen formatten zoals we zelf willen
		foreach ($results as $index => $value)
		{
			$results[$index]['starts_at_unix'] = strtotime($value['starts_at']);
			$results[$index]['ends_at_unix'] = strtotime($value['ends_at']);
		}

		return $results;
	}

	
	public function insert_user(int $type_id, string $username, string $email, string $password): void
	{
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$sql = 'INSERT INTO users (type_id, username, email, password) VALUES (:type_id, :username, :email, :password)';

		$this->statement_execute($sql, [
			'type_id' => $type_id,
			'username' => $username,
			'email' => $email,
			'password' => $hashed_password
		]);
	}
	

	public function delete_user(int $id): void
	{
		$sql = 'DELETE FROM users WHERE id = :id';

		$this->statement_execute($sql, [
			'id' => $id
		]);
	}


	private function statement_execute($sql, $params = []): PDOStatement
	{
		$statement = $this->dbh->prepare($sql);
		$statement->execute($params);

		return $statement;
	}

	public function insert_hour(int $user_id, string $starts_at, string $ends_at): void
	{
		$sql = 'INSERT INTO hours (user_id, starts_at, ends_at) VALUES (:user_id, :starts_at, :ends_at)';

		$this->statement_execute($sql, [
			'user_id' => $user_id,
			'starts_at' => $starts_at,
			'ends_at' => $ends_at,
		]);
	} 

    public function add_department($name, $post_code, $city, $street, $number) {

        $sql = 'INSERT INTO departments (
        name, post_code, city, street, number)
        VALUES
        (:name, :post_code, :city, :street, :number  )';

        $statement = $this->dbh->prepare($sql);
        $statement->execute([
            'name' => $name,
			'post_code' => $post_code,
			'city' => $city,
            'street' => $street,
            'number' => $number,
            
            

        ]);

    }     

	public function get_user_types(): array
	{
		$sql = 'SELECT id, type FROM user_types ORDER BY id asc';

		$statement = $this->dbh->prepare($sql);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function get_user(int $id): array
	{
		// Alleen de data die je wilt pre-fillen (password kun je als het goed is niet pre-fillen; je gebrukt hier een hash voor!)
		$sql = 'SELECT type_id, username, email FROM users WHERE id = :id';

		$statement = $this->dbh->prepare($sql);
		$statement->execute([
			'id' => $id

		]);
		// Denk erom: Als fetch() niks vindt, dan returned het false!
		$user_data = $statement->fetch(PDO::FETCH_ASSOC);

		// Je mag ook de if statement, en de return [] weg-laten
		// Dan laat je ook : array weg bij de functie
		// En return je gewoon $user_data
		// Let erop dat dit false ipv een array kan returnen
		if (is_array($user_data))
			return $user_data;

		// Als in die if nog niet gereturned bent, dan was $user_data geen array
		return [];
	}

	// : void betekent: "Deze functie returned niet"
	public function update_user(  int $type_id, string $username, string $email, string $password): void
	{
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$sql = 'UPDATE users SET type_id = :type_id, username = :username, email = :email, password = :password WHERE id = :id';

		$statement = $this->dbh->prepare($sql);
		$statement->execute([
			'type_id' => $type_id,
			'username' => $username,
			'email' => $email,
			'password' => $hashed_password    // <-- een hashed password, niet het password zelf! (hetzelfde bij create_user!)
			
		]);
	}

    

    

    

        


}

