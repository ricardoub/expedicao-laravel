<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Task;
use App\Combo;

class TaskController extends Controller
{
  private $route = 'tasks';

  /**
   * Display a listing of the actions.
   *
   * @return \array
   */
  public function getActions()
  {
    $actions['form']['index']   = "$this->route.index";
    $actions['form']['store']   = "$this->route.store";
    $actions['form']['update']  = "$this->route.update";
    $actions['form']['destroy'] = "$this->route.destroy";

    return $actions;
  }

  /**
   * Display a listing of the buttons.
   *
   * @return \array
   */
  public function getButtons()
  {
    $buttons['home']['name']  = 'Inicio';
    $buttons['home']['link']  = 'home';
    $buttons['home']['icon']  = 'home';
    $buttons['home']['class'] = 'default';
    $buttons['create']['name']  = 'Incluir';
    $buttons['create']['link']  = "$this->route.create";
    $buttons['create']['icon']  = 'plus';
    $buttons['create']['class'] = 'default';
    $buttons['show']['name']  = 'Exibir';
    $buttons['show']['link']  = "$this->route.show";
    $buttons['show']['icon']  = 'folder-open-o';
    $buttons['show']['class'] = 'default';
    $buttons['delete']['name']  = 'Excluir';
    $buttons['delete']['link']  = "$this->route.delete";
    $buttons['delete']['icon']  = 'trash';
    $buttons['delete']['class'] = 'danger';

    return $buttons;
  }

  /**
   * Display a listing of the combos.
   *
   * @return \App\Combo
   */
  public function getCombos()
  {
    $combo = new Combo();
    $combos['users']     = $combo->usersForSelect();
    $combos['simnao']    = $combo->optionsForSelect('simnao');
    $combos['status']    = $combo->optionsForSelect('status');
    $combos['percent10'] = $combo->optionsForSelect('percent10');

    return $combos;
  }
  /**
   * Display a listing of the messages.
   *
   * @return \array
   */
  private function getMessages()
  {
    $messages['success']['store']  = 'Registro incluído com sucesso!';
    $messages['success']['update'] = 'Registro atualizado com sucesso!';
    $messages['success']['delete'] = 'Registro excluído com sucesso!';
    $messages['error']['find']     = 'Registro não localizado!';
    $messages['error']['delete']   = 'Falha ao excluir o registro!';

    return $messages;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $actions = $this->getActions();
    $buttons = $this->getButtons();
    $combos  = $this->getCombos();

    $tasks = Task::where('user_id', Auth::user()->id)->orderby('priority')->paginate(10);

    return view('tasks.index')
      ->with([
        'models'  => $tasks,
        'actions' => $actions,
        'buttons' => $buttons,
        'combos'  => $combos,
      ]);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
