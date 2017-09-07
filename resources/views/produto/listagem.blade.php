@extends('/layout/template')

@section('conteudo')
<div class="container-fluid">
<h1>Listagem de produtos</h1>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#adicionarModal">Adicionar</button>
<table class="table table-striped table-bordered table-hover">
<tr>
<td><b>Nome</b></td>
<td><b>Descricao</b></td>
<td><b>Valor</b></td>
<td><b>Quantidade</b></td>
<td><b>Ações</b></td>
</tr>
@if(empty($produtos))
<div style="text-align:center;">
<h3 class="text-danger"><b>Você não possui produtos cadastrados</b></h3>
</div>
@else
@foreach ($produtos as $produto)
<tr>
<td>{{ $produto->nome }} </td>
<td>{{ $produto->descricao }} </td>
<td>{{ $produto->valor }} </td>
<td>{{ $produto->quantidade }} </td>
<td>
<a href="{{action('ProdutoController@detalhes', $produto->id)}}">
<span class="fa fa-eye"/></a>
<a href="/produtos/editar"><span class="fa fa-edit"/></a>
<a href="{{action('ProdutoController@deletar', $produto->id)}}">
<span class="fa fa-trash"/></a>
</td>
</tr>
@endforeach
</table> 
</div> 
@endif
<div class="pull-right">
{!! $produtos->links() !!}
</div>
<!-- Modal -->
<div id="adicionarModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cadastrar produtos</h4>
      </div>
       <form action="/produtos/cadastrar" method="post" class="form-horizontal">
      <div class="modal-body">
      <input type="hidden"name="_token" value="{{{ csrf_token() }}}" />
       <div class="form-group">
          <label class="control-label col-sm-2" for="nome">Nome</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto">
            </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="descricao">Descrição</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
            </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="valor">Valor</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
            </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="quantidade">Quantidade</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>
        </div>
      </div>
        
      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-left" id="cadastrar">Cadastrar</button>
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
      </div>
       </form>
    </div>
  </div>
</div>
@if(old('nome'))
<div class="alert alert-success alert-dismissable fade in" id="success-alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Sucesso!</strong>
O produto {{ old('$nome') }} foi adicionado.
</div>
@endif
@stop

