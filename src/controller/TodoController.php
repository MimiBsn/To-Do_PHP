<?php

require_once './src/model/Todo.php';

class TodoController
{
    public function createTodo(array $data)
    {
        Todo::createTodo($data);
        header('Location: /');
    }

    public function showTodos()
    {
        if(function_exists("Todo::getAllTodos") && is_array("Todo::getAllTodos")) {
            $todos = Todo::getAllTodos();
        }
        require './src/view/todos.php';
    }

    public function updateTodo()
    {
        $todoId = $_POST['id'];
        $updatedName = $_POST['name'];
        $todos = Todo::getAllTodos();

        foreach($todos as $current) {
            if($current['id'] == $todoId) {
                $current['name'] == $updatedName;
                $current['modification_date'] = date("m.d.y g:i a");
                return $current = $todos;
                break;
            }
        }

        Todo::saveTodo($todos);
        //? Todo::updateTodo($data);
        header('Location: /');
        exit;
    }

    public function deleteTodo(int $id)
    {
        Todo::deleteTodoById($id);
        header('Location: /');
    }

    public function showCreateForm()
    {
        require './src/view/create.php';
    }

    public function showUpdateForm(int $id)
    {
        Todo::showUpdateForm($id);
        /**Todo::getTodoById($id);*/
        require './src/view/update.php';
    }


}
