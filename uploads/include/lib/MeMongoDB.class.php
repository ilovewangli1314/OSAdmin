<?php
if(!defined('ACCESS')) {exit('Access denied.');}

class MeMongoDB {
    protected $server = '';
    protected $port = '';
    protected $username = '';
    protected $password = '';
    protected $database_name = '';
    protected $client = null;

    public function __construct($database)
    {
        try {
            global $DATABASE_LIST;
            $this->server=$DATABASE_LIST[$database]['server'];
            $this->port=$DATABASE_LIST[$database ]['port'];
            $this->username=$DATABASE_LIST[$database]['username'];
            $this->password=$DATABASE_LIST[$database]['password'];
            $this->database_name=$DATABASE_LIST[$database]['db_name'];

            $this->client = new MongoDB\Driver\Manager("mongodb://" . $this->server . ":" . $this->port);

//            $host_port = $this->MONGO_SERVER['host'] . ":" . $this->MONGO_SERVER['port'];
//            $client = new MongoClient($host_port);
//            $db = $client->selectDB($this->MONGO_SERVER['dbname']);
//            $coll = new MongoCollection($db, 'users');
//            $count = $coll->count();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function count($table, $condition)
    {
        $filter = $condition;
        $options = [];
        $query = new MongoDB\Driver\Query($filter, $options);
        $cursor = $this->client->executeQuery($this->database_name . '.' . $table, $query);

        return count($cursor->toArray());
    }

    public function select($table, $columns, $where = null, $start = null, $page_size = null)
    {
        $filter = [];
        if ($where) {
            $filter = $where;
        }
        $options = [
            'projection' => []
        ];
        if ($start != null) {
            $options['skip'] = $start;
        }
        if ($page_size != null) {
            $options['limit'] = $page_size;
        }

        foreach ($columns as $key => $value) {
            $options->projection.$value = "";
        }
        $query = new MongoDB\Driver\Query($filter, $options);
        $cursor = $this->client->executeQuery($this->database_name . '.' . $table, $query); // $mongo contains the connection object to MongoDB
        $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);

        return $cursor->toArray();
    }

    public function update($table, $data, $condition)
    {
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(
            $condition,
            ['$set' => $data]
        );

        $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
        $result = $this->client->executeBulkWrite($this->database_name . '.' . $table, $bulk, $writeConcern);

        return $result->getModifiedCount();
    }

    public function delete($table, $where)
    {
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->delete($where);
//        $bulk->delete(['x' => 2], ['limit' => 0]);

        $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
        $result = $this->client->executeBulkWrite($this->database_name . '.' . $table, $bulk, $writeConcern);

        return $result->getDeletedCount();
    }

    public function insert($table, $data)
    {
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert($data);

        $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
        $result = $this->client->executeBulkWrite($this->database_name . '.' . $table, $bulk, $writeConcern);

        return $result->getUpsertedIds();
    }

//    function command(array $param) {
//        $cmd = new MongoDB\Driver\Command($param);
//        return $this->_conn->executeCommand($this->_db, $cmd);
//    }

//    function insert($collname,array $param) {
//        $bulk = new MongoDB\Driver\BulkWrite();
//        foreach($param as $v){
//            if(is_array($v)){
//                $bulk->insert($v);
//            }
//        }
//        return $this->write($collname, $bulk);
//    }
//    function write($collname,$bulk) {
//        return $this->_conn->executeBulkWrite("{$this->_db}.{$collname}", $bulk);
//    }

    public function __destruct()
    {
//        print_r('MeMongoDB destruct!');
//        $this->client->close();
    }
}
?>