@extends ('layouts.template')

@section ('content')

	<!-- SECTION -->
	@php $highlighting = $resultset->getHighlighting(); @endphp

	<section class="well col-md-6">
		<h6>Nombre d'articles: {{ $resultset->getNumFound() }} résultats</h6>
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