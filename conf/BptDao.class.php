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
		$this->bdd = bdd;
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
}
