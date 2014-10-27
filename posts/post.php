<?php


class Post {
        
        private $id;
        private $created;
        private $title;
        private $content;
        
        // row table gateway functionality
        public function findByID($id) {
                $sql = "SELECT * FROM tbl_person WHERE id = :id";
                $fieldValueMap = array(':id'=>$id);
                
                $query = prepareSql($sql);
                $query->setFetchMode(PDO::FETCH_CLASS, 'Post');
                $query = executeSql($query, $fieldValueMap);
                
                $post = $query->fetch();
                $this->setId($post->getId());
                $this->setCreated($post->getCreated());
                $this->setTitle($post->getTitle());
                $this->setContent($post->getContent());
        }
        
        public function create() {
                $sql = "INSERT INTO tbl_person (created, title, content) VALUES (:created, :title, :content)";
                $fieldValueMap = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent());
        
                $query = prepareSql($sql);
                $query = executeSql($query, $fieldValueMap);
                $this->setId(getDb()->lastInsertId());
        }
        
        public function update() {
                $sql = "UPDATE tbl_person SET created = :created, title = :title, content = :content WHERE id = :id";
                $fieldValueMap = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent(), ':id'=>$this->getId());
                
                $query = prepareSql($sql);
                $query = executeSql($query, $fieldValueMap);
        }
        
        public function delete() {
                $sql = "DELETE FROM tbl_person WHERE id=:id";
                $fieldValueMap = array(':id'=>$this->getId());
                
                $query = prepareSql($sql);
                $query = executeSql($query, $fieldValueMap);
        }
        
        // getters and setters
        
        public function setId($id)         {
                $this->id = $id;
        }
        
        public function getId() {
                return $this->id;
        }
        
        public function setCreated($created)         {
                $this->created = $created;
        }
        
        public function getCreated() {
                return $this->created;
        }
        
        public function setTitle($title)         {
                $this->title = $title;
        }
        
        public function getTitle() {
                return $this->title;
        }
        
        public function setContent($content)         {
                $this->content = $content;
        }
        
        public function getContent() {
                return $this->content;
        }
        
}


  


class PostTableGateway {
        
    public function findByID($id) {
            $sql = "SELECT * FROM tbl_person WHERE id = :id";
            $fieldValueMap = array(':id'=>$id);
            
            $query = prepareSql($sql);
            $query->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $query = executeSql($query, $fieldValueMap);
            
            return $query->fetch();
    }
    
    public function findByAttribute($attribute, $value) {
            $sql = "SELECT * FROM tbl_person WHERE $attribute = :$attribute";
            $fieldValueMap = array(":$attribute"=>$value);
            
            $query = prepareSql($sql);
            $query->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $query = executeSql($query, $fieldValueMap);
            
            return $query->fetchAll();
    }
    
    public function findAll() {
            $sql = "SELECT * FROM tbl_person";
            
            $query = prepareSql($sql);
            $query->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $query = executeSql($query, array());
    
            return $query->fetchAll();
    }
    
    public function create($post) {
            $sql = "INSERT INTO tbl_person (created, title, content) VALUES (:created, :title, :content)";
            $fieldValueMap = array(':created'=>$post->getCreated(),':title'=>$post->getTitle(), ':content'=>$post->getContent());
    
            $query = prepareSql($sql);
            $query = executeSql($query, $fieldValueMap);
            $post->setId(getDb()->lastInsertId());
            return $post;
    }
    
    public function update($post) {
            $sql = "UPDATE tbl_person SET created = :created, title = :title, content = :content WHERE id = :id";
            $fieldValueMap = array(':created'=>$post->getCreated(),':title'=>$post->getTitle(), ':content'=>$post->getContent(), ':id'=>$post->getId());

            $query = prepareSql($sql);
            $query = executeSql($query, $fieldValueMap);
            return $post;
    }
    
    public function delete($post) {
            $sql = "DELETE FROM tbl_person WHERE id=:id";
            $fieldValueMap = array(':id'=>$post->getId());
            
            $query = prepareSql($sql);
            $query = executeSql($query, $fieldValueMap);
    }
}




?>