<?php

namespace App\Http\Controllers;

use App\Task;
// obs: cuidado com letrar maiusculas e minusculas, se n ele n acha.
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
    
        return Task::all();
        // perceba que eu não tenho esse metodo no meu Model "Task" isso é pq
        // o laravel ja tem metodos pre estabelecidos que são herdados de "MODEL"

    }
    public function store(Request $request){
        // para pegar a informação que foi enviada de qualquer forma (post, get e etc) (neste caso pelo postman), é dessa forma.
        // dentro da variavel $request eu vou ter todas as informações que vieram em forma de array
        //return $request->input('name');

        $request->validate([
            'name'=>'required|max:255',
            'complete'=>'required'
        ]);

        $task = Task::create([
            'name'=>$request->input('name'),
            'complete'=>$request->input('complete'),
        ]);

        // neste trecho acima, eu estou usando outro metodo nativo do laravel model
        // eu faço um insert na minha tabela passando apenas as informações que podem ser preenchidas, ja q o resto la é default
        // obs: o laravel trava qualquer tipo de insert não previamente autorizado, isso quer dizer que, no meu model eu tenho que informar que esses campos podem SIM ser alterados.
        // como faço isso? adicionando uma variavel protegida chamada $fillable com uma array com as propriedades que eu quero permitir

        return $task;

    }
    public function show(Task $task){

        return $task;

    }
    public function update(Request $request, Task $task){

        // tanto a variavel request e a task tem a mesma informação, só que com o $task eu posso fazer o meu select com where da forma que foi feita no metodo show

        $request->validate([
            'name'=>'required|max:255'
        ]);

        $task->name = $request->input('name');

        // aqui eu pego o valor que veio no request e jogo para a variavel name, usando o objeto da classe "task" que é o meu model

        $task->save();

        // aqui eu salvo ele

        return $task;

    }

    public function destroy(Task $task){

        $task->delete();

        return response()->json(['sucess'=>true]);

    }
}
