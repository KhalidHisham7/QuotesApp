@extends('welcome')

@section('title')
  Quotes
@endsection

@section('styles')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css\main.css">
@endsection

@section('content')
  @if(count($errors) > 0)
    <section class="info-box fail">
        @foreach($errors->all() as $error)
          {{ $error }}
        @endforeach
    </section>
  @endif

  @if(Session::has('success'))
  <section class="info-box success">
    {{ Session::get('success') }}
  </section>
  @endif
  <section class="quotes">
    <h1>Latest Quotes</h1>
    @for($i = 0; $i < count($quotes); $i++)
      <article class="quote">
        <div class="delete"> <a href="{{ route('delete', ['quote_id' => $quotes[$i]->id]) }}">x</a> </div>
        {{ $quotes[$i]->quote }}
        <div class="info">Created by <a href="#">{{ $quotes[$i]->author->name }}</a>
           on {{ $quotes[$i]->created_at }} </div>
      </article>
    @endfor
    <br>
    <div class="pagination">
      Pagination
    </div>
  </section>
  <section class="edit-quote">
    <h1>Add a Quote</h1>
    <form method="post" action="{{ route('create') }}">
      <div class="input-group">
        <label for="author">Your Name</label>
        <input type="text" name="author" id="author" placeholder="Your Name"/>
      </div>
      <div class="input-group">
        <label for="quote">Your Quote</label>
        <textarea name="quote" id="quote" rows="5" cols="80" placeholder="Quote"></textarea>
      </div>
      <button type="submit" class="btn">Submit Quote</button>
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </section>
@endsection
