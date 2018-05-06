@extends('welcome')

@section('title')
  Quotes
@endsection

@section('styles')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css\main.css">
@endsection

@section('content')
  <section class="quotes">
    <h1>Latest Quotes</h1>
    <article class="quote">
      <div class="delete"> <a href="#"></a> </div>
      Quote text
      <div class="info">Created by <a href="#">Timon</a> on ... </div>
    </article>
    Pagination
  </section>

  <section class="edit-quote">
    <h1>Add a Quote</h1>
    <form>
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
