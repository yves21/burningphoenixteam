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
        $stmt = $this->bdd->prepare("SELECT id, email FROM {$config->table_users} WHERE isactive = 1");
        $stmt->execute();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $results[] = $row;
            }
        }
        return $results;
    }

    public function getRoles() {
        $results = array();
        $stmt = $this->bdd->prepare("SELECT distinct role FROM roles");
        $stmt->execute();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $results[] = $row['role'];
            }
        }
        return $results;
    }

    public function addRole($userid, $role) {
        if (!$this->hasRole($userid, $role)) {
            $stmt = $this->bdd->prepare('INSERT INTO roles(user_id, role) VALUES (:user_id, :role)');
            $stmt->bindParam(':user_id', userid);
            $stmt->bindParam(':role', role);
            $stmt->execute();
        }
    }

    public function removeRole($userid, $role) {
        if ($this->hasRole($userid, $role)) {
            $stmt = $this->bdd->prepare('DELETE FROM roles WHERE user_id = :user_id and role = :role');
            $stmt->bindParam(':user_id', $userid);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
        }
    }
}
