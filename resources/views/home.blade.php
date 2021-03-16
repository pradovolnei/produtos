

@extends('layouts.app')

@section('content')
 <!-- Font Awesome -->
  <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <style>
   .no-arrow {
	  -moz-appearance: textfield;
	}
	.no-arrow::-webkit-inner-spin-button {
	  display: none;
	}
	.no-arrow::-webkit-outer-spin-button,
	.no-arrow::-webkit-inner-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}
   </style>
<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-2">
			<div class="card">
				<a href="#" data-toggle='modal' data-target="#new_product" class="btn btn-block btn-outline-success btn-sm" > <font size="3px"> <b>+</b> </font> Novo Produto</a>
			</div>
		</div>
	</div>
			
    <div class="row justify-content-left">
	
		<div class="col-12">
			<form action="{{ url( 'home' ) }}" method="get">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Contatos</h3>
				
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 190px;">
					
                     <input type="text" class="form-control float-right" placeholder="Pesquisar" style="height:30px;" name="nome" value="<?php if(isset($_GET["nome"])) echo $_GET["nome"]; ?>" >

						<div class="input-group-append">
						  <button type="submit" class="btn btn-default" style="height:30px;">&#128269;</button>
						</div>
					
                  </div>
                </div>
              </div>
			  </form>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th> Produto </th>
                      <th>Preço</th>
                      <th>Marca</th>
					  <th>Categoria</th>
					  <th colspan="2" style="text-align:center;">Inserir Cupom</th>
                    </tr>
                  </thead>
                  <tbody>
					@foreach($lista_produtos as $col_prod)
						<tr>
							<td> {{ $col_prod->nome }} </td>
							<td> R$ {{ $col_prod->preco }} </td>
							<td> {{ $col_prod->marca }} </td>
							<td> {{ $col_prod->categoria }} </td>
							<form action="{{ url( 'savecupom' ) }}"  method="post">
							<input type="hidden" name="id_produto" value="{{ $col_prod->id }}">
							<input type="hidden" name="marca" value="{{ $col_prod->marca }}">
							<input type="hidden" name="categoria" value="{{ $col_prod->categoria }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<td> <input type="text" name="cupom" /> </td>
							<td> <input type="submit" class="btn btn-success" name="savecupom" value="Inserir"> </td>
							</form>
						</tr>
					@endforeach
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
	
    </div>
</div>

<form action="{{ url( 'novoproduto' ) }}"  method="post" enctype="multipart/form-data"  >
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="modal fade" id="new_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Novo Produto </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" style="margin-bottom: 10px;">
							<input type="text" class="form-control" name="nome" required placeholder="Nome do Produto "  />
						</div>
						<div class="col-md-12" style="margin-bottom: 10px;">
							<input type="number" class="form-control" name="preco" required placeholder="Preço do Produto "  />
						</div>
						<div class="col-md-12" style="margin-bottom: 10px;">
							<select class="form-control" name="marca" required>
								<option value=""> Marca do Produto </option>
								<option value="Sony"> Sony </option>
								<option value="Microsoft"> Microsoft </option>
								<option value="Nintendo"> Nintendo </option>
								<option value="Capcom"> Capcom </option>
								<option value="Ubisoft"> Ubisoft </option>
								<option value="Konamy"> Konamy </option>
							</select>
						</div>
						<div class="col-md-12" style="margin-bottom: 10px;">
							<select class="form-control" name="categoria" required>
								<option value=""> Categoria do Produto </option>
								<option value="Console"> Console </option>
								<option value="Jogo"> Jogo </option>
								<option value="Acessório"> Acessório </option>
							</select>
						</div>

						<div class="col-md-12" style="margin-bottom: 10px;">
							<textarea class="form-control" name="descricao" placeholder="Descrição do Produto "  ></textarea>
						</div>
					</div>
					
				</div>


				<div class="modal-footer">
					<button type="submit" class="btn btn-success" name="atualizar" > Salvar </button>
				</div>

			</div>
		</div>
	</div>
</form>


@endsection
