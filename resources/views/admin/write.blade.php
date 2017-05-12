@extends ('admin.template')

@section('leftSidebar')
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<li><a href="{{ route('admin.dashboard') }}"><i class="lnr lnr-home"></i> <span>Tableau de bord</span></a></li>
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
			<h3 class="panel-title">Message</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<form action="{{ route('messages.create') }}" method="post">
					{{ csrf_field() }}
					<textarea name="editor" id="editor"></textarea>
					<button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
				</form>
			</div>
		</div>
	</div>
	<!-- FIN VUE D'ENSEMBLE -->
@endsection

@section('javascript')
	<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

	<script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection