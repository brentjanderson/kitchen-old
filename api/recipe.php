<?PHP
require_once('../includes/dbcon.inc');

header('Content-type: text/json');

// Grab inputs
$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : '');
$recipeID = (isset($_REQUEST['id']) ? $_REQUEST['id'] : '');
$recipeName = (isset($_REQUEST['name']) ? $_REQUEST['name'] : '');
$recipeDesc = (isset($_REQUEST['desc']) ? $_REQUEST['desc'] : '');
$recipeText = (isset($_REQUEST['recipe']) ? $_REQUEST['recipe'] : '');
$category_id = (isset($_REQUEST['catid']) ? $_REQUEST['catid'] : '');

$recipeID = (isset($_REQUEST['id']) ? $_REQUEST['id'] : '');

// Security check for certain patterns
if (!is_int($recipeID) && !isset($recipeID)) errorTerminate('2', 'Bad input. Sound the alarm!!!');


switch ($action) {
    case 'add':
        if (!isset($_REQUEST['name'])) {
            errorTerminate('3', 'Missing input');
        }
        // Delete the associated category id
        $sql = 'INSERT INTO `recipe` (`name`, `description`, `recipe`, `category_id`) VALUES (\''.$recipeName.'\', \''.$recipeDesc.'\', \''.$recipeText.'\', \''.$category_id.'\')';
        $result = mysql_query($sql);

        if (!$result) errorTerminate('4', 'Error adding recipe.');
        
        $added_rows = mysql_affected_rows();
        $added_id = mysql_insert_id();
        if ($added_rows > 0) {
            $response['response'] = 0;
            $response['id'] = $added_id;
        } elseif ($added_rows == 0) {
            $response['responses'] = 1;
        }
        break;
    
    case 'edit':
        if (!isset($_REQUEST['id'])) {
            errorTerminate('3', 'Missing input');
        }
        // Update the associated category id
        $sql = 'UPDATE `recipe` SET';
        $baseSQL = $sql;
        if (isset($_REQUEST['name'])) 
        {
            $sql .= ' `name` = \''.$recipeName.'\'';
            if ($sql != $baseSQL) $sql .= ',';
        }
        if (isset($_REQUEST['desc']))
        { 
            $sql .= ' `description` = \''.$recipeDesc.'\'';
            if ($sql != $baseSQL) $sql .= ',';
        }
        if (isset($_REQUEST['recipe']))
        {
            $sql .= ' `recipe` = \''.$recipeText.'\'';
            if ($sql != $baseSQL) $sql .= ',';
        }
        if (isset($_REQUEST['catid']))
        {
            $sql .= ' `category_id` = \''.$category_id.'\'';
        }
        if (substr($sql, -1) == ',') { $sql = substr_replace($sql, '', -1); }
        $sql .= ' WHERE `id` = '.$recipeID;
        $result = mysql_query($sql);
        
        if (!$result) errorTerminate('4', 'Error editing recipe.');
        
        $updated_rows = mysql_affected_rows();
        if ($updated_rows > 0) {
            $response['response'] = 0;
        } elseif ($updated_rows == 0) {
            $response['response'] = 1;
        }

        break;
        
    case 'delete':
        if (!isset($_REQUEST['id'])) {
            errorTerminate('3', 'Missing input');
        }
        // Delete the associated category id
        $sql = 'DELETE FROM `recipe` WHERE `id` = '.$recipeID;
        $result = mysql_query($sql);
        
        if (!$result) errorTerminate('4', 'Error deleting recipe.');
        
        $deleted_rows = mysql_affected_rows();
        if ($deleted_rows > 0) {
            $response['response'] = 0;
        } elseif ($deleted_rows == 0) {
            $response['response'] = 1;
        }

        break;
    
    case 'list':
        if (isset($_REQUEST['id'])) {
            $sql = 'SELECT * FROM recipe WHERE id='.$recipeID;
        } else {
            // List all categories in the database
            $sql = 'SELECT * FROM recipe';
        }
        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)) {
            $response['result'][] = $row;
        }
        
        mysql_free_result($result);
        
        $response['response'] = 0;
        break;
    default:
        errorTerminate('1', 'Unknown error occurred');
        break;
    
}

print json_encode($response);
?>