<?php


abstract class Model extends Db
{
    private $query,
        $error = false,
        $results,
        $count = 0;

    #The name of the table in the database
    # The name of the table must always be plural
    protected $table = false;

    function __construct()
    {
        if($this->table === false){
            $this->table = strtolower(get_class($this)).'s';
        }
    }

    /**
     * @return mixed
     */
    function findAll(){
        return $this->action('SELECT *',$this->table)
            ->results();
    }
    /**
     * @return mixed
     */
    function first(){

        return current($this->results());
    }

    public function findById($id)
    {
        return current($this->action('SELECT *', $this->table, ['id', '=', $id])
            ->results());
    }
    public function find(array $where){
        return $this->action('SELECT *', $this->table, $where)
            ->results()[0];
    }

    function get($where){

        return $this->action('SELECT *', $this->table, $where)
            ->results();
    }

    /**
     * @param $sql
     * @param array $params
     * @return $this
     */
    function query($sql, $params = [])
    {
        $this->error = false;
        if($this->query = $this->getInstance()->prepare($sql))
        {
            $x = 1;
            if(count($params))
            {
                foreach ($params as $param)
                {
                    $this->query->bindValue($x, $param);
                    $x++;
                }
            }
        }
        if($this->query->execute()){
            $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
            $this->count   = $this->query->rowCount();
        }else
        {
            $this->error = true;
        }
        return $this;
    }

    /**
     * @param $action
     * @param $table
     * @param array $where
     * @return $this|bool
     */

    // [ORDER BY id DESC]
    private function action($action, $table, $where = []){

        if(gettype($where) == 'array' && count($where) === 3){

            $operators = ['=', '<', '>', '<=', '>='];

            $field    = $where[0];
            $operator = $where[1];
            $value    = $where[2];

            if(in_array($operator, $operators)){

                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? ORDER BY id DESC";

                if(!$this->query($sql, [$value])->error()){

                    return $this;
                }
            }
        }else{

            $sql = "{$action} FROM {$table} ORDER BY id DESC";
            if(!$this->query($sql, [])->error()){

                return $this;
            }

        }
        return false;
    }


    /**
     * @param $action
     * @param $table
     * @param array $wheres
     * @return $this|bool
     */
    private function builderAction($action, $table, $wheres = []){

        if(count($wheres) === 7){
            $operators = ['=', '!=', '<', '>', '<=', '>=', 'AND', 'OR'];

            $field_first    = $wheres[0];
            $field_second    = $wheres[4];
            $operator_first = $wheres[1];
            $operator_second = $wheres[5];
            $value_first    = $wheres[2];
            $value_second    = $wheres[6];
            $logique  = strtoupper($wheres[3]);

            if(in_array($operator_first, $operators) && in_array($operator_second, $operators) && in_array($logique, $operators)){

                $sql = "{$action} FROM {$table} WHERE {$field_first} {$operator_first} ?  {$logique} {$field_second} {$operator_second} ?";


                if(!$this->query($sql, [$value_first, $value_second])->error()){


                    return $this;
                }
            }
        }
        return false;
    }


    /**
     * @param array $array
     * @return mixed
     */
    public function builderGet(array $array)
    {
        return $this->builderAction('SELECT *', $this->table, $array)->results();
    }

    /**
     * @param array $fields
     * @return bool
     */
    function insert($fields = []){

        $keys   = array_keys($fields);
        $values = '';
        $x      = 1;

        foreach ($fields as $field){

            $values .=  '?';

            if($x < count($fields)){

                $values .= ', ';
            }
            $x++;
        }

        $sql  = "INSERT INTO {$this->table}(`".implode('`,`', $keys)."`) VALUES({$values})";
        //return $fields; die(1);
        if(!$this->query($sql, $fields)->error()){

            return true;
        }

        return false;
    }


    /**
     * @param $where
     * @param array $fields
     * @return bool
     */
    function update($where, $fields = []){

        $column  = $where[0];
        $val     = (is_numeric($where[1])) ? $where[1] : "'$where[1]'";

        $set = '';
        $x   =  1;

        foreach ($fields as $name => $value){

            $set .= "{$name} = ?";

            if($x < count($fields)){

                $set .= ', ';
            }
            $x++;
        }



        $sql = "UPDATE {$this->table} SET {$set} WHERE {$column} = $val";


        if(!$this->query($sql, $fields)->error()){

            return true;
        }

        return false;
    }


    /**
     * @return mixed
     */
    function results(){

        return $this->results;
    }

    /**
     * @return int
     */
    function count(){

        return $this->count;
    }

    /**
     * @return bool
     */
    function error()
    {
        return $this->error;
    }

    /**
     * @param $name
     * @param $args
     */
    public function __call($name, $args){

        echo $name," doesn't exist in this class";
    }

}