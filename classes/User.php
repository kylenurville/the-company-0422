<?php
include "Database.php";

class User extends Database {

    # CREATE
    public function create($first_name, $last_name, $username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        # SQL
        $sql = "INSERT INTO users (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";

        # Execution
        if ($this->conn->query($sql)){
            header("location: ../views");   // go to index.php inside the views folder
            exit;                           // same as die
        } else {
            die("Error creating user: " . $this->conn->error);
            // die - terminate the current script + show a message
        }
    }

    # LOGIN
    public function login($username, $password){
        $sql = "SELECT `id`, `username`, `password` FROM users WHERE username = '$username'";

        if($result = $this->conn->query($sql)){
           // Check if the username is existing
            if($result->num_rows == 1){
                // Check if the password is correct
                $user_details = $result->fetch_assoc();
                // $user_details is an associative array
                // print_r($user_details);
                if(password_verify($password, $user_details['password'])){
                    session_start();
                    $_SESSION['user_id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];
                    $_SESSION['full_name'] = $user_details['first_name'] . " " . $user_details['last_name'];


                    header("location: ../views/dashboard.php");
                    exit;
                } else {
                    // Password is incorrect
                    die("Password is incorrect.");
                }
            } else {
                // Username is not existing
                die("Username not found.");
            }
        } else {
            die("Error: " . $this->conn->error);
        }
    }

    # READ ALL
    public function getAllUsers(){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT `id`, first_name, last_name, username FROM users WHERE id != $user_id";

        if($result = $this->conn->query($sql)){
            return $result;
        } else {
            die("Error retrieving all users: " . $this->conn->error);
        }
    }

    # READ 1
    public function getUser($user_id){
        $sql = "SELECT * FROM users WHERE `id` = $user_id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        } else {
            die("Error retrieving the user: " . $this->conn->error);
        }
    }

    # UPDATE
    public function update($user_id, $first_name, $last_name, $username)
    {
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $user_id";

        if ($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        } else {
            die("Error updating user: " . $this->conn->error);
        }
    }

    # DELETE
    public function delete($user_id)
    {
        $sql = "DELETE FROM users WHERE id = $user_id";

        if ($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        } else {
            die("Error deleting the user: " . $this->conn->error);
        }
    }
}