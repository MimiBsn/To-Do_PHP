<?php

require_once './src/model/Todo.php';

class TodoController
{
    public function createTodo(array $data)
    {
        Todo::createTodo($data);
        //redirect to the todos list
    }

    public function showTodos()
    {
        $todos = Todo::getAllTodos();
        //Require associated views
    }

    public function updateTodo(array $data)
    {
        Todo::updateTodo($data);
        //Redirect to todos list
    }

    public function deleteTodo(int $id)
    {
        Todo::deleteTodoById($id);
        //Redirect to todos list
    }

    public function showCreateForm()
    {
        //Require associated view
    }

    public function showUpdateForm(int $id)
    {
        Todo::getTodoById($id);
        //Require associated view
    }


}
