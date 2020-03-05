<?php
  class AskMeDB {
    public $pdo;
    public static $instance;

    public function __construct() {
      $pdo = new PDO(AskMeConfig::$database);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $pdo->exec('CREATE TABLE IF NOT EXISTS questions(id INTEGER PRIMARY KEY ASC, question, answer, asked_at, answered_at)');
      $pdo->exec('CREATE TABLE IF NOT EXISTS inbox(id INTEGER PRIMARY KEY ASC, question, asked_at)');
      $this->pdo = $pdo;
    }

    public function ask($question) {
      $stmt = $this->pdo->prepare('INSERT INTO inbox (question, asked_at) VALUES (:question, :asked_at)');
      $stmt->execute(array($question, time()));
    }

    public function answer($inbox_id) {
      $stmt = $this->pdo->prepare('DELETE inbox WHERE id = ?');
      $stmt->execute(array($answer));
    }

    public function insert($question, $answer, $asked_at, $answered_at) {
      $stmt = $this->pdo->prepare('INSERT INTO questions (question, answer, asked_at, answered_at) VALUES (?, ?, ?, ?)');
      $stmt->execute(array($question, $answer, $asked_at, $answered_at));
    }

    public function random($num) {
      $stmt = $this->pdo->prepare('SELECT * FROM questions ORDER BY random() LIMIT ?');
      $stmt->execute(array($num));
      return $stmt->fetchAll();
    }

    public function recent($num, $id = 2147483646) {
      $stmt = $this->pdo->prepare('SELECT * FROM questions WHERE id < ? ORDER BY answered_at DESC LIMIT ?');
      $stmt->execute(array($id, $num));
      return $stmt->fetchAll();
    }
    
    public function get($id) {
      $stmt = $this->pdo->prepare('SELECT * FROM questions WHERE id = ?');
      $stmt->execute(array($id));
      return $stmt->fetchAll()[0];
    }

    public function get_inbox($id) {
      $stmt = $this->pdo->prepare('SELECT * FROM inbox WHERE id = ?');
      $stmt->execute(array($id));
      return $stmt->fetchAll()[0];
    }
  }
