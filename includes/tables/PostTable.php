<?php

class PostTable
{
    protected $table = 'posts';
    protected $user = 'utilisateur';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get(int $id): Post
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $sth->bindParam(':id', $id);
        
        $result = $sth->execute();

        $data = $sth->fetch();

        $post = new Post();
        $post->setTitle($data['title']);
        $post->setContent($data['content']);
        $post->setId($data['id']);

        return $post;
    }
    
    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    public function create(Post $post): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (title, content) VALUES (:title, :content)");
        $sth->bindParam(':title', $post->getTitle());
        $sth->bindParam(':content', $post->getContent());
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during creation with the table {$this->table}");
        }
    }

    public function update(Post $post): void
    {
        $sth = $this->db->prepare("UPDATE {$this->table} SET title = :title , content = :content WHERE id = :id");
        $sth->bindParam(':title', $post->getTitle());
        $sth->bindParam(':content', $post->getContent());
        $sth->bindParam(':id', $post->getId());
        $result = $sth->execute();
    }

    public function delete(int $id): void
    {
        $sth = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $sth->bindParam(':id', $id);
        $result = $sth->execute();
    }

    public function create_account(Post $post) : void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->user} (pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)");
        $sth->bindParam(':pseudo', $post->getPseudo());
        $sth->bindParam(':mail', $post->getMail());
        $sth->bindParam(':mdp', $post->getMdp());
        $result = $sth->execute();
    }

    public function connexion(Post $post) : void
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->user} WHERE mail = :mail && mdp = :mdp");
        $sth->bindParam(':mail', $post->getMail());
        $sth->bindParam(':mdp', $post->getMdp());
        $result = $sth->execute();
        $nb_con = $conn->rowcount();
    }

}
