<?php
// Database functions

// global connect to db
$_db_ = mysqli_connect("database", "admin", "heslo", "mydb") or die;

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
    $name = dbEscape($name);
    $password = dbEscape($password);

    if ($result = dbQuery("select id from users where name=$name and password=$password")) {
        if ($result->num_rows) {
            // fetch_all() vrací pole polí (řádky, a každá má políčka)
            // [[$id]] je dekonstrukce: vezme první hodnotu z první řádky
            [[$id]] = $result->fetch_all();
            if ($id)
                return true;
        }
    }

    return false;
}



function registerUser($name, $password) {
    global $_db_;

    // Escape input values to prevent SQL injection
    $escapedName = dbEscape($name);
    $escapedPassword = dbEscape($password);

    // Check if the user already exists
    $query = $_db_->prepare("SELECT id FROM users WHERE name = ?");
    $query->bind_param("s", $escapedName);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        die("User with this name already exists. Consider a different name.");
    }

    // Insert the user into the database
    $insertQuery = "INSERT INTO users (name, password) VALUES ($escapedName, $escapedPassword)";
    dbQuery($insertQuery);
}




function precteno(string $drink): int
{
    $drink = dbEscape($drink);

    dbQuery("insert into drinky (nazev, precteno) value($drink, 1) on duplicate key update precteno = precteno+1");
    $result = dbQuery("select precteno from drinky where nazev=$drink");
    [[$precteno]] = $result->fetch_all();
    return $precteno;
}