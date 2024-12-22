<?php
class Cart
{
    public $db = null;
    public function __construct(DBControl $db)
    {
        if (!isset($db->con))
            return;
        $this->db = $db;
    }
    // insert into cart
    public function insertintocart($para = null, $table = "cart")
    {
        if ($this->db->con != null) {
            if ($para != null) {
                $columns = implode(',', array_keys($para));
                $values = implode(',', array_values($para));
                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);
                // execu]te value
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
    // get user_id,item_id in cart table
    public function addtocart($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $para = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );
            $result = $this->insertintocart($para);
            // reload page
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }
    }
    // delete cart using cart_id
    public function deletecart($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {
            $result = $this->db->con->query(query: "DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    
    public function getsum($arr)
    {
        if (isset($arr)) {
            $Sum = 0;
            foreach ($arr as $item) {
                $Sum += floatval($item[0]);
            }
            return sprintf('%.2f', $Sum);
        }
    }
    //  get item id fron cart for duplication problem
    public function getcartid($cartarray = null, $key = "item_id")
    {
        if ($cartarray != null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartarray);
            return $cart_id;
        }
    }
    public function saveforlater($item_id = null, $savetable = "wishlist", $fromtable = "cart")
    {
        if ($item_id != null) {
            // Check if the item already exists in the destination table
            $checkQuery = "SELECT * FROM {$savetable} WHERE item_id = {$item_id}";
            $checkResult = $this->db->con->query($checkQuery);
    
            if ($checkResult->num_rows > 0) {
                // Item already exists in the destination table
                echo "Item already exists in {$savetable}.";
                return false;
            }
    
            // Proceed with the move if no duplicates
            $query = "INSERT INTO {$savetable} SELECT * FROM {$fromtable} WHERE item_id = {$item_id}";
    
            // Execute the insert query
            if ($this->db->con->query($query)) {
                // Call deletecart function to remove the item from the cart
                $this->deletecart($item_id, $fromtable);
    
                // Redirect after successful operation
                header("Location:" . $_SERVER['PHP_SELF']);
                return true;
            } else {
                echo "Error: " . $this->db->con->error;
                return false;
            }
        }
        return false;
    }
    

}