<?php
// Database functions

// global connect to db
$_db_ = mysqli_connect("database", "admin", "heslo") or die;

// database query
function dbQuery(string $query): bool|mysqli_result
{
    global $_db_;
    return @$_db_->query($query);
}



function dbEscape(string $s): string
{
    global $_db_;
    return "'" . mysqli_real_escape_string($_db_, $s) . "'";
}



function authUser(string $name, string $password): bool
{
    global $_db_;

    $name = dbEscape($name);

    $query = $_db_->prepare("SELECT password FROM users WHERE name = ?");
    $query->bind_param("s", $name);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $password = $row['password'];

        if (password_verify($password)) {
            return true;
        }
    }

    return false;
}



function registerUser($name, $password) {
    global $_db_;

    $query = $_db_->prepare("SELECT id FROM users WHERE name = ?");
    $query->bind_param("s", $name);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        die("User with this name already exist. Consider different name.");
    }

    $query = $_db_->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
    $query->bind_param("ss", $name, $password);
    $query->execute();
}



function precteno(string $drink): int
{
    $drink = dbEscape($drink);

    dbQuery("insert into drinky (nazev, precteno) value($drink, 1) on duplicate key update precteno = precteno+1");
    $result = dbQuery("select precteno from drinky where nazev=$drink");
    [[$precteno]] = $result->fetch_all();
    return $precteno;
}