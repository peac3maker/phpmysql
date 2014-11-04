<?php  
  
class Post {  
	
	private $id;
	private $created;
	private $title;
	private $content;
	private $current_version;	
	public function findByID($id) {
		$sql = "SELECT * FROM tbl_person WHERE id = :id";
		$fieldValueMapping = array(':id'=>$id);
		 
		$pquery = prepareSql($sql);
		$pquery->setFetchMode(PDO::FETCH_CLASS, 'Post');
		$pquery = executeSql($pquery, $fieldValueMapping);
		 
		$post = $pquery->fetch();
		$this->setId($post->getId());
		$this->setCreated($post->getCreated());
		$this->setTitle($post->getTitle());
		$this->setContent($post->getContent());
		$this->setContent($post->getContent());
		$this->current_version = $post->getCurrentVersion();
	}
	
	public function create() {
		$sql = "INSERT INTO tbl_person (created, title, content) VALUES (:created, :title, :content)";
		$fieldValueMapping = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent());
	
		$pquery = prepareSql($sql);
		$pquery = executeSql($pquery, $fieldValueMapping);
		$this->setId(getDb()->lastInsertId());
		$this->findByID($this->getId());
	}
	
	public function update() {		
		$sql = "UPDATE tbl_person SET created = :created, title = :title, content = :content, current_version = :newVersion WHERE id = :id and current_version = :current_version";
		$fieldValueMapping = array(
				':created'=>$this->getCreated(),
				':title'=>$this->getTitle(), 
				':content'=>$this->getContent(),
				':newVersion'=>$this->getCurrentVersion() + 1,
				':id'=>$this->getId(),
				':current_version'=>$this->getCurrentVersion()
		);
		
		$pquery = prepareSql($sql);
		$pquery = executeSql($pquery, $fieldValueMapping);
		if ($pquery->rowCount() == 0) {
			throw new Exception('OPTIMISTIC LOCKING: Version already changed!'); 
		}
	}
	
	public function delete() {
		$sql = "DELETE FROM tbl_person  WHERE id=:id";
		$fieldValueMapping = array(':id'=>$this->getId());
		 
		$pquery = prepareSql($sql);
		$pquery = executeSql($pquery, $fieldValueMapping);
	}
	
	// getters and setters
	
	public function setId($id) 	{
		$this->id = $id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setCreated($created) 	{
		$this->created = $created;
	}
	
	public function getCreated() {
		return $this->created;
	}
	
	public function setTitle($title) 	{
		$this->title = $title;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setContent($content) 	{
		$this->content = $content;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	public function getCurrentVersion() {
		return $this->current_version;
	}
	
}
?>