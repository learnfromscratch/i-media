@extends ('admin.template')

@section('leftSidebar')
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<li><a href="{{ route('admin.dashboard') }}"><i class="lnr lnr-home"></i> <span>Tableau de bord</span></a></li>
					<li>
						<a href="{{ route('users.all') }}" class="active"><i class="lnr lnr-pencil"></i> <span>Gestion des clients</span></a>
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
							<th>CIN</th>
							<th>Nom</th>
							<th>E-Mail</th>
							<th>Status abonnement</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->cin }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								@if ($user->role === 'admin')
									<td><span class="label label-success">TOUJOURS VALIDE</span></td>
								@elseif ($user->abonnement->end_date >= Carbon\Carbon::now()->toDateString())
									<td><span class="label label-success">VALIDE</span></td>
								@else
									<td><span class="label label-warning">NON VALIDE</span></td>
								@endif
								<td>
									<a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-info btn-xs">Afficher</a>
									<a href="{{ route('users.destroy', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Supprimer</a>
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