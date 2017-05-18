@extends ('admin.template')

@section('leftSidebar')
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<li><a href="{{ route('admin.dashboard') }}"><i class="lnr lnr-home"></i> <span>Tableau de bord</span></a></li>
					<li><a href="{{ route('groupes.index') }}" class="active"><i class="lnr lnr-user"></i><span> Gestion des clients</span></a></li>
					<li><a href="{{ route('users.all') }}"><i class="lnr lnr-users"></i><span> Comptes utilisateurs</span></a></li>
				</ul>
			</nav>
		</div>
	</div>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-tagsinput.css">
@endsection

@section('content')
	<div class="panel panel-profile">
		<div class="clearfix">
			<!-- LEFT COLUMN -->
			<div class="profile-left">
				<!-- PROFILE HEADER -->
				<div class="profile-header">
					<div class="overlay"></div>
					<div class="profile-main">
						<h3 class="name">{{ strtoupper($user->name) }}</h3>
					</div>
					<div class="profile-stat">
						<div class="row">
							<div class="col-md-4 stat-item">
								0 <span>Mot clés</span>
							</div>
							<div class="col-md-4 stat-item">
								0 <span>Visites</span>
							</div>
							<div class="col-md-4 stat-item">
								0 <span>PDF téléchagés</span>
							</div>
						</div>
					</div>
				</div>
				<!-- END PROFILE HEADER -->
				<!-- PROFILE DETAIL -->
				<div class="profile-detail">
					<div class="profile-info">
						<h4 class="heading">Infos personnels</h4>
						<ul class="list-unstyled list-justify">
							<li>E-mail <span>{{ $user->email }}</span></li>
							<li>Groupe <span>{{ $user->groupe->name }}</span></li>
						</ul>
					</div>
					<div class="profile-info">
						<h4 class="heading">Abonnement</h4>
						<ul class="list-unstyled list-justify">
							@if ($user->groupe()->get()[0]->abonnement->end_date >= Carbon\Carbon::now()->toDateString())
								<li>Status<span class="label label-success">VALIDE</span></li>
							@else
								<li>Status<span class="label label-warning">NON VALIDE</span></li>
							@endif
						</ul>
					</div>
				</div>
				<!-- END PROFILE DETAIL -->
			</div>
			<!-- LEFT COLUMN -->
			<!-- RIGHT COLUMN -->
			<div class="profile-right">
				<h4 class="heading"></h4>
				<!-- TABBED CONTENT -->
				<div class="custom-tabs-line tabs-line-bottom left-aligned">
					<ul class="nav" role="tablist">
						<li  class="active"><a href="#keyword" role="tab" data-toggle="tab">Mots clés <span class="badge">{{ count($keywords) }}</span></a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="keyword">
						<div class="table-responsive">
							<table class="table project-table">
								<thead>
									<tr>
										<th>Nom</th>
										<th>Nombre d'articles</th>
									</tr>
								</thead>
								<tbody>
									@foreach($keywords as $keyword)
										<tr>
											<td><a href="#">{{ $keyword->name }}</a></td>
											<td><span class="label label-success">{{ $keyword->nbr_article }}</span></td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- END TABBED CONTENT -->
			</div>
			<!-- END RIGHT COLUMN -->
		</div>
	</div>
@endsection

@section('javascript')
	<script type="text/javascript" src="/js/bootstrap-tagsinput.min.js"></script>
@endsection