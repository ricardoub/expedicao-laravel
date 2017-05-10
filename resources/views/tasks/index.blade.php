@extends('layouts.bootstrap.panel')

@section('panel-head-middle')
  <button type="button" class="btn btn-default btn-title form-control" disabled>
    <i class="fa fa-tasks"></i>
    Listar
    <span class="hidden-xs hidden-sm">Tarefas</span>
  </button>
@endsection

@section('panel-head-left')
  @include('partials.buttons.panelButton-home')
@endsection

@section('panel-head-right')
@endsection

@section('panel-body')
  @include('partials.messages')
  @include('tasks.table')
@endsection


@section('page-scripts')
  <!--<script src="/js/todos.js"></script>-->
@stop
