@extends('layouts.admin-master',['produtosAtivo'=>true])

@section('content')
	<div class="flex-grow-1 w-auto mb-5">
	<a href="/produtos/create" class="btn btn-warning m-3 float-right" value="/produtos/create">Novo Produto</a>
		<table class="table">
			<thead>
				<td>ID</td>
				<td>Nome</td>
				<td>Preço</td>
				<td>Qtde</td>
				<td>Categoria</td>
				<td>Ações</td>
			</thead>
			<tbody>
				@foreach($produtos as $p)
				<tr>
					<td class="align-middle">{{ $p->id }}</td>
					<td class="align-middle">{{ $p->nome }}</td>
					<td class="align-middle">{{ $p->preco }}</td>
					<td class="align-middle">{{ $p->qualidade }}</td>
					<td class="align-middle">{{ $p->Categoria->nome }}</td>
					<td class="align-middle">
					<a class="badge badge-warning" href="/produtos/>{{ $p->id }}">Visualizar</a>
						<a class="badge badge-primary" href="/produtos/{{ $p->id }}/edit">Editar</a>
						<form action="/produtos/{{ $p->id }}" method="post">
							@csrf
							@method('delete')
							<button type="submit" class="btn badge badge-danger">Remover</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	<div class="d-flex justify-content-center">{{ $produtos->links() }}</div>
	</div>
	
@endsection