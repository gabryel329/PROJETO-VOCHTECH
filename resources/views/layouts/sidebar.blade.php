<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <ul class="app-menu">
    <li><a class="app-menu__item" href="{{ route('funcionario.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Lista Funcionarios</span></a></li>
    <li><a class="app-menu__item" href="{{ route('unidade.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Lista Unidades</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Cadastro</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ route('funcionario.create') }}"><i class="icon fa fa-circle-o"></i>Funcionario</a></li>
        <li><a class="treeview-item" href="{{ route('unidade.create') }}"><i class="icon fa fa-circle-o"></i>Unidade</a></li>
      </ul>
    </li>
  </ul>
</aside>
