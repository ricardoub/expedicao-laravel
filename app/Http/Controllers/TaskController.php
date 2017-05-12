<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Task;
use App\Combo;
use App\Http\Requests\TaskFormRequest;

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
    $buttons['back']['name']  = 'Voltar';
    $buttons['back']['link']  = "$this->route.index";
    $buttons['back']['icon']  = 'arrow-left';
    $buttons['back']['class'] = 'default';
    $buttons['cancelindex']['name']  = 'Cancelar';
    $buttons['cancelindex']['link']  = "$this->route.index";
    $buttons['cancelindex']['icon']  = 'reply';
    $buttons['cancelindex']['class'] = 'default';
    $buttons['create']['name']  = 'Incluir';
    $buttons['create']['link']  = "$this->route.create";
    $buttons['create']['icon']  = 'plus';
    $buttons['create']['class'] = 'default';
    $buttons['delete']['name']  = 'Excluir';
    $buttons['delete']['link']  = "$this->route.delete";
    $buttons['delete']['icon']  = 'trash';
    $buttons['delete']['class'] = 'default';
    $buttons['destroy']['name']  = 'Excluir';
    $buttons['destroy']['link']  = "$this->route.destroy";
    $buttons['destroy']['icon']  = 'trash';
    $buttons['destroy']['class'] = 'danger';
    $buttons['edit']['name']  = 'Editar';
    $buttons['edit']['link']  = "$this->route.edit";
    $buttons['edit']['icon']  = 'edit';
    $buttons['edit']['class'] = 'default';
    $buttons['home']['name']  = 'Inicio';
    $buttons['home']['link']  = 'home';
    $buttons['home']['icon']  = 'home';
    $buttons['home']['class'] = 'default';
    $buttons['show']['name']  = 'Exibir';
    $buttons['show']['link']  = "$this->route.show";
    $buttons['show']['icon']  = 'folder-open-o';
    $buttons['show']['class'] = 'default';
    $buttons['store']['name']  = 'Salvar';
    $buttons['store']['link']  = "$this->route.store";
    $buttons['store']['icon']  = 'save';
    $buttons['store']['class'] = 'primary';

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
   * Display a listing of the options.
   *
   * @return \array
   */
  private function getOptions()
  {
    $options['form']['disabled']  = 'disabled';

    return $options;
  }
  private function findTask($id)
  {
    return Task::find($id);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $actions = $this->getActions();
    $options = $this->getOptions();
    $buttons = $this->getButtons();
    $combos  = $this->getCombos();

    $tasks = Task::where('user_id', Auth::user()->id)->orderby('priority')->paginate(10);

    return view('tasks.index')
      ->with([
        'models'  => $tasks,
        'actions' => $actions,
        'options' => $options,
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
      $actions = $this->getActions();
      $options = $this->getOptions();
      $options['form']['disabled'] = null;
      $buttons = $this->getButtons();
      $combos  = $this->getCombos();

      $task = new \App\Task();

      return view('tasks.create')
        ->with([
          'model'   => $task,
          'actions' => $actions,
          'options' => $options,
          'buttons' => $buttons,
          'combos'  => $combos,
        ]);
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(TaskFormRequest $request)
  {
    $actions  = $this->getActions();
    $messages = $this->getMessages();

    $input = \Request::except('_token');
    extract($input);

    $task = new \App\Task();
    $task->name       = $name;
    $task->priority   = $priority;
    $task->percentage = $percentage;
    $task->status     = $status;
    $task->user_id    = $user_id;
    $task->save();

  return redirect()->route($actions['form']['index'])
    ->with('msgSuccess', $messages['success']['store']);

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $actions = $this->getActions();
      $options = $this->getOptions();
      $buttons = $this->getButtons();
      $combos  = $this->getCombos();

      $task = $this->findTask($id);
      if (is_null($task)) {
        return redirect()->route($actions['form']['index'])
          ->withErros([$messages['error']['find']]);
      }

      return view('tasks.show')
        ->with([
          'model'   => $task,
          'actions' => $actions,
          'options' => $options,
          'buttons' => $buttons,
          'combos'  => $combos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $actions = $this->getActions();
      $options = $this->getOptions();
      $options['form']['disabled'] = null;
      $buttons = $this->getButtons();
      $combos  = $this->getCombos();

      $task = $this->findTask($id);
      if (is_null($task)) {
        return redirect()->route($actions['form']['index'])
          ->withErros([$messages['error']['find']]);
      }

      return view('tasks.edit')
        ->with([
          'model'   => $task,
          'actions' => $actions,
          'options' => $options,
          'buttons' => $buttons,
          'combos'  => $combos,
        ]);
    }
    /**
     * Show the form for destroy the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $actions = $this->getActions();
      $options = $this->getOptions();
      $buttons = $this->getButtons();
      $combos  = $this->getCombos();

      $task = $this->findTask($id);
      if (is_null($task)) {
        return redirect()->route($actions['form']['index'])
          ->withErros([$messages['error']['find']]);
      }

      return view('tasks.delete')
        ->with([
          'model'   => $task,
          'actions' => $actions,
          'options' => $options,
          'buttons' => $buttons,
          'combos'  => $combos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskFormRequest $request, $id)
    {
      $actions = $this->getActions();
      $messages = $this->getMessages();

      $input = \Request::all();
      extract($input);

      $task = $this->findTask($id);
      if (is_null($task)) {
        return redirect()->route($actions['form']['index'])
          ->withErrors([$messages['error']['find']]);
      }

      $task->name       = $name;
      $task->priority   = $priority;
      $task->percentage = $percentage;
      $task->status     = $status;
      $task->user_id    = $user_id;
      $task->save();

      return redirect()->route($actions['form']['index'])
        ->with('msgSuccess', $messages['success']['update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $actions  = $this->getActions();
      $messages = $this->getMessages();

      $task = $this->findTask($id);

      if (is_null($task)) {
        return redirect()->route($actions['form']['index'])
          ->withErrors([$messages['error']['find']]);
      }

      $result = $task->delete();
      if (!$result) {
        return redirect()->route($actions['form']['index'])
          ->withErrors([$messages['error']['delete']]);
      }

      return redirect()->route($actions['form']['index'])
        ->with('msgSuccess', $messages['success']['delete']);
    }

}
