<?PHP
require_once('../includes/dbcon.inc');

header('Content-type: text/json');

// Grab inputs
$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : '');
$categoryName = (isset($_REQUEST['name']) ? $_REQUEST['name'] : '');
$categoryID = (isset($_REQUEST['id']) ? $_REQUEST['id'] : '');

// Check for certain patterns
if (!is_int($categoryID) && !isset($categoryID)) errorTerminate('2', 'Bad input. Sound the alarm!!!');

switch ($action) {
    case 'add':
        if (!isset($_REQUEST['name'])) {
            errorTerminate('3', 'Missing input');
        }
        // Delete the associated category id
        $sql = 'INSERT INTO `category` (`name`) VALUES (\''.$categoryName.'\')';
        $result = mysql_query($sql);
        
        if (!$result) errorTerminate('4', 'Error adding category.');
        
        $added_rows = mysql_affected_rows();
        $added_id = mysql_insert_id();
        if ($added_rows > 0) {
            $response['response'] = 0;
            $response['id'] = $added_id;
        } elseif ($added_rows == 0) {
            $response['response'] = 1;
        }
        break;
    
    case 'edit':
        if (!isset($_REQUEST['id']) || !isset($_REQUEST['name'])) {
            errorTerminate('3', 'Missing input');
        }
        // Delete the associated category id
        $sql = 'UPDATE `category` SET `name` = \''.$categoryName.'\' WHERE `id` = '.$categoryID;
        $result = mysql_query($sql);
        
        if (!$result) errorTerminate('4', 'Error adding category.');
        
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
        $sql = 'DELETE FROM `category` WHERE `id` = '.$categoryID;
        $result = mysql_query($sql);
        
        if (!$result) errorTerminate('4', 'Error deleting category.');
        
        $deleted_rows = mysql_affected_rows();
        if ($deleted_rows > 0) {
            $response['response'] = 0;
        } elseif ($deleted_rows == 0) {
            $response['response'] = 1;
        }

        break;
    
    case 'list':
        if (isset($_REQUEST['id'])) {
            $sql = 'SELECT * FROM category WHERE id='.$categoryID;
        } else {
            // List all categories in the database
            $sql = 'SELECT * FROM category';
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