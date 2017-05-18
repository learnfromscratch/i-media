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
						<h3 class="name">{{ strtoupper($groupe->name) }}</h3>
					</div>
					<div class="profile-stat">
						<div class="row">
							<div class="col-md-4 stat-item">
								{{ count($keywords) }} <span>Mot clés</span>
							</div>
							<div class="col-md-4 stat-item">
								{{ count($users) }} <span>Utilisateurs</span>
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
						<h4 class="heading">Infos du client</h4>
						<ul class="list-unstyled list-justify">
							<li>Nombre d'utilisateurs<span>{{ $groupe->nbrUser }}</span></li>
							<li>Numéro de téléphone <span>{{ $groupe->tel }}</span></li>
							<li>Adresse <span>{{ $groupe->address }}</span></li>
						</ul>
					</div>
					<div class="profile-info">
						<h4 class="heading">Abonnement</h4>
						<ul class="list-unstyled list-justify">
							@if ($groupe->abonnement->end_date >= Carbon\Carbon::now()->toDateString())
								<li>Status<span class="label label-success">VALIDE</span></li>
							@else
								<li>Status<span class="label label-warning">NON VALIDE</span></li>
							@endif
						</ul>
					</div>
					<div class="text-center"><a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary">Editer le profile</a></div>
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
						<li class="active"><a href="#users" role="tab" data-toggle="tab">Comptes utilisateurs</a></li>
						<li><a href="#keyword" role="tab" data-toggle="tab">Mots clés</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="users">
						<div class="table-responsive">
							<table class="table project-table">
								<thead>
									<tr>
										<th>Nom</th>
										<th>E-mail</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="keyword">
						<div class="table-responsive">
							<table class="table project-table">
								<thead>
									<tr>
										<th>Liste des mots clés du client</th>
									</tr>
								</thead>
								<tbody>
									@foreach($keywords as $keyword)
										<tr>
											<td>{{ $keyword->name }}</td>
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

			<!-- Modal -->
			<div id="edit" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Editer le profile</h4>
			      </div>
			      <form class="form-horizontal role="form" method="POST" action="{{route('groupes.update', ['id' => $groupe->id])}}">
			      	{{ csrf_field() }}

			      	<div class="modal-body">
			      		<!-- TABBED CONTENT -->
						<div class="custom-tabs-line tabs-line-bottom left-aligned">
							<ul class="nav" role="tablist">
								<li class="active"><a href="#editBasic" role="tab" data-toggle="tab">Infos du client</a></li>
								<li><a href="#editKeyword" role="tab" data-toggle="tab">Mots clés</a></li>
								<li><a href="#abonnement" role="tab" data-toggle="tab">Abonnement</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="editBasic">
									<div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
					                  <label for="tel" class="col-sm-2 control-label">Comptes</label>

					                  <div class="col-sm-10">
					                    <input type="number" class="form-control" name="nbrUser" placeholder="Saisissez le nombre de compte" value="{{ $groupe->nbrUser }}">

					                    @if ($errors->has('nbrUser'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('nbrUser') }}</strong>
				                            </span>
				                        @endif

					                  </div>
					                </div>

					                <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
					                  <label for="tel" class="col-sm-2 control-label">Téléphone</label>

					                  <div class="col-sm-10">
					                    <input type="number" class="form-control" name="tel" placeholder="Saisissez le numéro de téléphone" value="{{ $groupe->tel }}">

					                    @if ($errors->has('tel'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('tel') }}</strong>
				                            </span>
				                        @endif

					                  </div>
					                </div>

					                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
					                  <label for="address" class="col-sm-2 control-label">Adresse</label>

					                  <div class="col-sm-10">
					                    <input type="text" class="form-control" name="address" placeholder="Saisissez l'adresse" value="{{ $groupe->address }}">

					                    @if ($errors->has('address'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('address') }}</strong>
				                            </span>
				                        @endif

					                  </div>
					                </div>
							</div>

							<div class="tab-pane fade" id="editKeyword">
								<div class="form-group">
				                  <label for="tel" class="col-sm-2 control-label">Mots clés</label>

				                  <div class="col-sm-10">
				                    <input type="text" value="
				                    <?php 
				                    foreach ($keywords as $keyword) {
				                    	echo $keyword->name.',';
				                    } ?>" 
				                    data-role="tagsinput" name="tags">
				                  </div>
				                </div>
							</div>

							<div class="tab-pane fade" id="abonnement">
								<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
				                  <label for="end_date" class="col-sm-2 control-label">Date d'expiration</label>

				                  <div class="col-sm-4">
				                    <input type="date" class="form-control" name="end_date" value="{{ $groupe->abonnement->end_date }}">
				                  </div>
				                </div>
							</div>
						</div>
						<!-- END TABBED CONTENT -->
				        <p>
				        	
				        </p>
				    </div>
				    <div class="modal-footer">
				    	<button type="submit" class="btn btn-success">Valider les modifications</button>
				        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			        </div>
			      </form>
			    </div>

			  </div>
			</div>
		</div>
	</div>
@endsection

@section('javascript')
	<script type="text/javascript" src="/js/bootstrap-tagsinput.min.js"></script>
@endsection