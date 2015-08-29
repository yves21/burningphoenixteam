<?php

/*
* BptAuth database DAO class.
*/

class BptAuthDao
{
	private $bdd;


	/*
	* Initiates database connection
	*/

	public function __construct(\PDO $bdd) {
		$this->bdd = $bdd;
	}

    public function hasRole($userid, $role) {
        $stmt = $this->bdd->prepare('select role from roles where user_id=?');
        if ($stmt->execute(array($userid))) {
            while ($row = $stmt->fetch()) {
                if ($row['role'] == $role) {
                    return true;
                }
            }
        }

        return false;
    }

    public function getValidatedUsers($config) {
        $results = array();
        $stmt = $this->bdd->prepare("SELECT email FROM {$config->table_users} WHERE isactive = 1");
        $stmt->execute();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $results[] = $row;
            }
        }
        return $results;
    }

}
