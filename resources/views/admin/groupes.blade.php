@extends ('admin.template')

@section('leftSidebar')
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<li><a href="{{ route('admin.dashboard') }}"><i class="lnr lnr-home"></i> <span>Tableau de bord</span></a></li>
					<li>
						<a href="#subPages" data-toggle="collapse" class="collapsed active"><i class="lnr lnr-pencil"></i> <span>Gestion des clients</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subPages" class="collapse ">
							<ul class="nav">
								<li><a href="{{ route('groupes.index') }}">Liste des clients</a></li>
								<li><a href="{{ route('users.all') }}">Comptes utilisateurs</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</nav>
		</div>
	</div>
@endsection

@section('content')
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des clients</h3><br>
				<div class="row">
					<a href="{{ route('users.create') }}" class="btn btn-success btn-toastr"><i class="fa fa-plus fa-fw"></i> Ajouter un client</a>
					
					<form class="pull-right">
						<div class="input-group">
							<input type="text" value="" class="form-control" id="myInput" onkeyup="filtrer()" placeholder="Rechercher par nom">
						</div>
					</form>
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-hover" id="myTable">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Nombre d'utilisateur</th>
							<th>Téléphone</th>
							<th>Adresse</th>
							<th>Status abonnement</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($groupes as $groupe)
							<tr>
								<td>{{ $groupe->name }}</td>
								<td>{{ count($groupe->users) }} / {{ $groupe->nbrUser }}</td>
								<td>{{ $groupe->tel }}</td>
								<td>{{ $groupe->address }}</td>
								@if ($groupe->abonnement->end_date >= Carbon\Carbon::now()->toDateString())
									<td><span class="label label-success">VALIDE</span></td>
								@else
									<td><span class="label label-warning">NON VALIDE</span></td>
								@endif
								<td>
									<a href="{{ route('groupes.show', ['id' => $groupe->id]) }}" class="btn btn-info btn-xs">Afficher</a>
									<a href="{{ route('groupes.destroy', ['id' => $groupe->id]) }}" class="btn btn-danger btn-xs">Supprimer</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
	function filtrer() {
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[1];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }       
	  }
	}
	</script>
@endsection