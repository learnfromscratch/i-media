@extends ('admin.template')

@section('leftSidebar')
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<li><a href="{{ route('admin.dashboard') }}" class="active"><i class="lnr lnr-home"></i> <span>Tableau de bord</span></a></li>
					<li>
						<a href="{{ route('users.all') }}"><i class="lnr lnr-pencil"></i> <span>Gestion des clients</span></a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
@endsection

@section('content')

	<!-- VUE D'ENSEMBLE -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Tableau de bord</h3>
			<!--
			@php
				$monday = new Carbon\Carbon('last monday');
			@endphp
			<p class="panel-subtitle">Période: {{ $monday->toFormattedDateString() }} - {{ Carbon\Carbon::now()->toFormattedDateString() }}</p>-->
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-user"></i></span>
						<p>
							<span class="number">{{ $nbrUser }}</span>
							<span class="title">Clients</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-file-text"></i></span>
						<p>
							<span class="number">{{ $indexed }}</span>
							<span class="title">Articles indexés</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-eye"></i></span>
						<p>
							<span class="number">0</span>
							<span class="title">Visits</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-download"></i></span>
						<p>
							<span class="number">@php echo file_get_contents('Articles/pdf_download.txt') @endphp</span>
							<span class="title">PDF téléchargés</span>
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9">
					<canvas id="myChart"></canvas>
				</div>
				<div class="col-md-3">
					<div class="weekly-summary text-right">
						<span class="number"></span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> </span>
						<span class="info-label"></span>
					</div>
					<div class="weekly-summary text-right">
						<span class="number"></span> <span class="percentage"><i class="fa fa-caret-up text-success"></i></span>
						<span class="info-label"></span>
					</div>
					<div class="weekly-summary text-right">
						<span class="number"></span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i></span>
						<span class="info-label"></span>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- FIN VUE D'ENSEMBLE -->

	<div class="row">
		<div class="col-md-7">
			<!-- TODO LIST -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Liste de choses à faire</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<ul class="list-unstyled todo-list">
						<li>
							<label class="control-inline fancy-checkbox">
								<input type="checkbox"><span></span>
							</label>
							<p>
								<span class="title">Indexation</span>
								<span class="short-description">Indexer les articles qui viennent d'être ajouté.</span>
								<span class="date">Oct 9, 2016</span>
							</p>
							<div class="controls">
								<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!-- END TODO LIST -->
		</div>
		<div class="col-md-5">
			<!-- TIMELINE -->
			<div class="panel panel-scrolling">
				<div class="panel-heading">
					<h3 class="panel-title">Actions</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<a href="{{ route('admin.indexing') }}" type="button" class="btn btn-primary btn-right center-block">Indexer les articles</a> <br>
				</div>
			</div>
			<!-- END TIMELINE -->
		</div>
	</div>
@endsection

@section('javascript')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<script type="text/javascript" src="/js/chart.js"></script>
@endsection