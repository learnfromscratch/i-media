@extends('template')

@section('content')

	@php $highlighting = $resultset->getHighlighting(); @endphp

        @foreach ($resultset as $document)
            @php
                $highlightedDoc = $highlighting->getResult($document->id);
                $pdf = rawurldecode($folderPdfs.$document->document);
                $datesolr = substr($document->SourceDate,0,10);
                $timess = strtotime($datesolr);

                $date = date("d-m-Y", $timess);
            @endphp

            <section class="col-md-7 col-md-offset-1">
				<div class="media well">
				    <div class="media-body">
				      <h3 class="media-heading">
				        <a href="{{ route('articles.show', ['id' => $document->id]) }}">
				        	{!! (count($highlightedDoc->getField('Title'))) ? implode(' ... ', $highlightedDoc->getField('Title')) : $document->Title !!}
				        </a>
				      </h3>
				      <small>Publié le : <i>{{ $date }}</i></small><br>
				      <small>Source : <a href=""><i>{{ $document->Source }}</i></a></small>
				      <form action="{{ route('download.pdf') }}" method="post">
				      	{{ csrf_field() }}
				      	<input type="hidden" name="file" value="{{ $pdf }}">
				      	<button class="btn btn-primary pull-right">Télécharger</button>
				      </form>
				      <div class="row">
				        <hr class="col-xs-12">
				      </div>
				      <p>
				      	{!! (count($highlightedDoc->getField('Fulltext'))) ? implode(' ... ', $highlightedDoc->getField('Fulltext')) : $document->Fulltext !!}
				      </p>
				      <div class="row">
				        <hr class="col-xs-12">
				      </div>
				    </div>
				</div>
			</section>
		@endforeach

@endsection