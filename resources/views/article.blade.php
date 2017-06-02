@extends ('layouts.template')

@section ('content')

	<!-- SECTION -->
	@php $highlighting = $resultset->getHighlighting(); @endphp

	<section class="well col-md-6">

	    @foreach ($resultset as $document)
	        @php
	            $highlightedDoc = $highlighting->getResult($document->id);
	            $datesolr = substr($document->SourceDate,0,10);
	            $timess = strtotime($datesolr);
	            $date = date("d-m-Y", $timess);
	        @endphp

			<div class="article">
				<div class="img">
					<img class="img-rounded img-responsive" src="assets/img/article.png">
				</div>
				<h3>
					<a href="#">
						{!! (count($highlightedDoc->getField('Title'))) ? implode(' ... ', $highlightedDoc->getField('Title')) : $document->Title !!}
					</a>
				</h3>
				<small>Date de publication: {{ $date }}</small><br>
				<small>Source: <a href="#">{{ $document->Source }}</a> / Auteur: <a href="#">{{ $document->Author }}</a></small><br><br>
				<div class="article-content">
					<p>{!! (count($highlightedDoc->getField('Fulltext'))) ? implode(' ... ', $highlightedDoc->getField('Fulltext')) : $document->Fulltext !!}
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