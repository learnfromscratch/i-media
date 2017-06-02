@extends ('layouts.template')

<!--@section('sidebar')
	<aside class="sidebar col-md-2 col-md-offset-1">
      <div class="collapse navbar-collapse">
      	<ul class="list-unstyled">
	      <li class="title">SOURCES</li>
	      @foreach ($facet3 as $value => $count)
	        <a href="#"><li>{{ strtoupper($value) }} <span class="badge pull-right">{{ $count }}</span></li></a>
	      @endforeach
	    </ul>
	    <ul class="list-unstyled">
	      <li class="title">AUTEURS</li>
	      @foreach ($facet2 as $value => $count)
	        <a href="#"><li>{{ strtoupper($value) }} <i class="badge pull-right">{{ $count }}</i></li></a>
	      @endforeach
	    </ul>
	    <ul class="list-unstyled">
	      <li class="title">LANGUE</li>
	      @foreach ($facet1 as $value => $count)
	        <a href="#"><li>{{ strtolower($value) }} <i class="badge pull-right">{{ $count }}</i></li></a>
	      @endforeach
	    </ul>
      </div>
    </aside>
@endsection-->

@section ('content')

	<!-- SECTION -->
	@php $highlighting = $resultset->getHighlighting(); @endphp

	<section class="well col-md-6">
		<h6>{{ $resultset->getNumFound() }} résultats de la recherche de {{ $search }}</h6>
		<hr>

	    @foreach ($resultset as $document)
	        @php
	            $highlightedDoc = $highlighting->getResult($document->id);
	            $datesolr = substr($document->SourceDate,0,10);
	            $timess = strtotime($datesolr);
	            $date = date("d-m-Y", $timess);
	        @endphp

			<div class="article">
				<div class="row">
					<div class="img col-md-4">
						<img class="img-rounded img-responsive" src="assets/img/article.png">
					</div>
					<div class="col-md-8">
						<h3>
							<a href="{{ route('articles.show', ['id' => $document->id]) }}" data-toggle="tooltip" data-placement="top" title="lire l'article">
								{!! (count($highlightedDoc->getField('Title'))) ? implode(' ... ', $highlightedDoc->getField('Title')) : $document->Title !!}
							</a>
						</h3>
						<i class="fa fa-calendar fa-fw" aria-hidden="true"></i><small> {{ $date }}</small><br>
						<small>Source: <a href="#">{{ $document->Source }}</a> / Auteur: <a href="#">{{ $document->Author }}</a></small><br><br>
					</div>
				</div>
				<div class="article-content">
					<p>{!! (count($highlightedDoc->getField('Fulltext'))) ? implode(' ... ', $highlightedDoc->getField('Fulltext')) : substr($document->Fulltext,0,400) !!}...
					<a href="{{ route('articles.show', ['id' => $document->id]) }}">Lire la suite</a></p>
				</div>
				<div class="tags">
					<a href="#"><span>FED</span></a>
					<a href="#"><span>Obama</span></a>
					<a href="#"><span>Banque</span></a>
					<a href="#"><span>Afrique</span></a>
					<a href="#"><span>Informatique</span></a>
				</div>
			</div>
			<hr>
		@endforeach
	</section>
	<!-- END SECTION -->

@endsection