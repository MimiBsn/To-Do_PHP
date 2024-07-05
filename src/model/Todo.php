<?php

//Define the path to JSON file
define('DATA_FILE', dirname(__FILE__, 3) . '/data/todo.json');
var_dump(DATA_FILE);
class Todo
{
    /**
     * Return an array of data or null
     *
     *  @return array
     */
    public static function getAllTodos()
    {
        $json = file_get_contents(DATA_FILE);
        return json_decode($json, true) ?? [];
    }

    /**
     * Return a single todo or null
     *
     * @param integer $id
     * @return object
     */
    public static function getTodoById(int $id)
    {
        $todos = self::getAllTodos();
        foreach($todos as $todo) {
            if($todo['id'] == $id) {
                return $todo;
            }
        }
        return null;
    }

    /**
     * Create new data in JSON file
     *
     * @param array $data
     * @return void
     */
    public static function createTodo(array $data)
    {
        $todos = self::getAllTodos();
        $newId = end($todos);
        $data['id'] = $newId['id'] + 1;
        $data['creation_date'] = date("m.d.y g:i a");
        $data['completed'] = false;
        $todos[] = $data;
        self::saveTodo($todos);
    }


    /**
     * Update data in JSON file
     *
     * @param array $data
     * @return void
     */
    public static function updateTodo(array $data)
    {
        $todos = self::getAllTodos();
        foreach($todos as &$todo) {               //The & allows to modify todo in [todos].
            if($todo['id'] == $data['id']) {
                $todo = $data;
                $data['modification_date'] = date("m.d.y g:i a");
                break;
            }
        }
        self::saveTodo($todos);
    }


    /**
     * Delete one data in JSON file
     *
     * @param integer $id
     * @return void
     */
    public static function deleteTodoById(int $id)
    {
        $todos = self::getAllTodos();
        foreach($todos as $index => $todo) {
            if($todo['id'] == $id) {
                unset($todos[$index]);
                break;
            }
        }
        return self::saveTodo($todos);
    }


    /**
     * Write data into JSON file in JSON format
     *
     * @param array $todos
     * @return void
     */
    private static function saveTodo(array $todos)
    {
        file_put_contents(DATA_FILE, json_encode($todos, JSON_PRETTY_PRINT));
    }

}
