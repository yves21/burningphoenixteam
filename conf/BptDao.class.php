<?php

/*
* Bpt database DAO class.
*/

class BptDao
{
	private $bdd;


	/*
	* Initiates database connection
	*/

	public function __construct(\PDO $bdd) {
		$this->bdd = $bdd;
	}

    public function insertNews($subject, $summary, $content, $imageName, $created) {
        $stmt = $this->bdd->prepare('INSERT INTO news(subject, summary, content, image, created) VALUES (:subject, :summary, :content, :image, :created)');
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':summary', $summary);
        $stmt->bindParam(':content', htmlspecialchars($content));
        $stmt->bindParam(':image',  $imageName);
        $stmt->bindParam(':created', $created);
        $stmt->execute();
    }

    public function createGame($name, $content, $userid) {
        $stmt = $this->bdd->prepare('INSERT INTO games(name, content, author) VALUES (:name, :content, :authorid)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':content', htmlspecialchars($content));
        $stmt->bindParam(':authorid',  $userid);
        $stmt->execute();
    }

    public function updateGame($gameid, $content, $userid) {
        $stmt = $this->bdd->prepare('UPDATE games set content=:content, author=:authorid WHERE id=:gameid');
        $stmt->bindParam(':content', htmlspecialchars($content));
        $stmt->bindParam(':authorid',  $userid);
        $stmt->bindParam(':gameid',  $gameid);
        $stmt->execute();
    }

    public function hasRole($userid, $role) {
        $stmt = $this->bdd->prepare('select user_id, role_id from userroles, roles where user_id=? and roles.role = ? and role_id = roles.id');
        if ($stmt->execute(array($userid, $role))) {
            $count = $stmt->rowCount();
            if ($count > 0) {
                return true;
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

    public function getGames() {
        $results = array();
        $stmt = $this->bdd->prepare("SELECT id, name FROM games");
        $stmt->execute();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $results[] = $row;
            }
        }
        return $results;
    }

    public function getGame($gameid) {
        $stmt = $this->bdd->prepare("SELECT id, name, content, author FROM games where id = ?");
        $stmt->execute(array($gameid));
        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    public function getRoles() {
        $results = array();
        $stmt = $this->bdd->prepare("SELECT id, role FROM roles");
        $stmt->execute();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $results[] = $row;
            }
        }
        return $results;
    }

    public function addRole($userid, $role) {
        if (!$this->hasRole($userid, $role)) {
            $stmtrole = $this->bdd->prepare("SELECT id FROM roles where role=?");
            if ($stmtrole->execute(array($role))) {
                $row = $stmtrole->fetch();
                $stmt = $this->bdd->prepare('INSERT INTO userroles(user_id, role_id) VALUES (:user_id, :role_id)');
                $stmt->bindParam(':user_id', $userid);
                $stmt->bindParam(':role_id', $row['id']);
                $stmt->execute();
            }
        }
    }

    public function removeRole($userid, $role) {
        if ($this->hasRole($userid, $role)) {
            $stmt = $this->bdd->prepare('DELETE FROM userroles WHERE user_id = :user_id and role_id = (select id from roles where role = :role)');
            $stmt->bindParam(':user_id', $userid);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
        }
    }
}
