@extends('template')

@section('sidebar')
	<aside class="sidebar col-md-2 col-md-offset-1">
      <div class="collapse navbar-collapse">
      	<ul class="list-unstyled">
	      <li class="title">SOURCES</li>
	      <a href="{{ route('home') }}"><li>Tous <i class="badge pull-right">{{ $resultset->getNumFound() }}</i></li></a>
	      @foreach ($facet3 as $value => $count)
	        <a href="#"><li>{{ strtoupper($value) }} <small class="badge pull-right">{{ $count }}</small></li></a>
	      @endforeach
	    </ul>
	    <ul class="list-unstyled">
	      <li class="title">AUTEURS</li>
	      @foreach ($facet2 as $value => $count)
	        <a href="#"><li>{{ strtoupper($value) }} <small class="badge pull-right">{{ $count }}</small></li></a>
	      @endforeach
	    </ul>
	    <ul class="list-unstyled">
	      <li class="title">LANGUE</li>
	      @foreach ($facet1 as $value => $count)
	        <a href="#"><li>{{ strtolower($value) }} <small class="badge pull-right">{{ $count }}</small></li></a>
	      @endforeach
	    </ul>
	    <ul class="list-unstyled">
	      @if (count(Auth::user()->keywords))
	      <li class="title">ABONNEMENTS</li>
	        @foreach (Auth::user()->keywords as $keyword)
	          <a href="#"><li>{{ strtolower($keyword->name) }}<small class="badge pull-right"></small></li></a>
	        @endforeach
	       @endif
	    </ul>
      </div>
    </aside>
	
@endsection

@section('content')
	<section class="col-md-5 col-md-offset-3">
		<ul class="filter list-unstyled list-inline">
          <li>Trier par : </li>
          <li><a href="">Pertinence<i class="fa fa-caret-down fa-fw"></i></a></li>
          <li><hr></li>
          <li><a href="">Récent</a></li>
        </ul>
	</section>
	
	@php $highlighting = $resultset->getHighlighting(); @endphp

        @foreach ($resultset as $document)
            @php
                $highlightedDoc = $highlighting->getResult($document->id);
                $datesolr = substr($document->SourceDate,0,10);
                $timess = strtotime($datesolr);

                $date = date("d-m-Y", $timess);
            @endphp

            <section class="col-md-5 col-md-offset-3">
				<div class="media well">
				    <div class="media-body">
				      <h5 class="media-heading">
				        <a href="{{ route('articles.show', ['id' => $document->id]) }}">
				        	{!! (count($highlightedDoc->getField('Title'))) ? implode(' ... ', $highlightedDoc->getField('Title')) : $document->Title !!}
				        </a>
				      </h5>
				      <small>Publié le : <i>{{ $date }}</i></small>
				      <div class="row">
				        <hr class="col-xs-12">
				      </div>
				      <p>
				      	{!! (count($highlightedDoc->getField('Fulltext'))) ? implode(' ... ', $highlightedDoc->getField('Fulltext')) : substr($document->Fulltext,0,200) !!} ...
				      	<a href="{{ route('articles.show', ['id' => $document->id]) }}"><small><i>Lire la suite</i></small></a>
				      </p>
				      <div class="row">
				        <hr class="col-xs-12">
				      </div>
				      <small>Source : <a href=""><i>{{ $document->Source }}</i></a></small>
				    </div>
				</div>
			</section>
		@endforeach

@endsection